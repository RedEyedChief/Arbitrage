<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Dataloader {

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model("data_model");
        $this->source = array();
        $this->dest = array();
        $this->markets_res = array(); //Market id to array id
        $this->products = array();  //Product id to array id
        $this->visited = array();
        $this->start=0;
        $this->depth=0;
        $this->c_items=array();
        $this->c_dist=0;
        $this->found=false;
        $this->dist = array();
        $this->max_dist = 0;
        $this->inf = 100000;
        $this->min_dist = $this->inf;
        $this->min_item = $this->inf;
        //$this->markets_ids;
        //$this->products_ids;
    }
    
    public function get_distance($lat1,$lng1,$lat2,$lng2)
    {
        $dLat = deg2rad($lat2-$lat1);
        $dLng = deg2rad($lng2-$lng1);
        $a = sin($dLat/2) * sin($dLat/2) +
                   cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
                   sin($dLng/2) * sin($dLng/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));
        return $c;
    }
    
    public function fetch_id_column($products,$ids)
    {
        $ret = array();
        foreach ($ids as $key=>$id)
        {
            if ( isset( $products[$id] ) ) $ret[$key] = $products;
            else $ret[$key] = 0;
        }
        return $ret;
    }
    
    public function find_distances()
    {
        foreach ($this->markets as $id1=>$market)
        {
            foreach ($this->markets as $id2=>$market)
            {
                $this->dist[$id1][$id2] = $this->get_distance( $this->coords[$id1]->lat, $this->coords[$id1]->lng , $this->coords[$id2]->lat, $this->coords[$id2]->lng );
                if ($this->dist[$id1][$id2] == 0) $this->dist[$id1][$id2] = $this->inf;
                if ($this->min_dist > $this->dist[$id1][$id2]) $this->min_dist = $this->dist[$id1][$id2];
                if ($this->max_dist < $this->dist[$id1][$id2] and $this->dist[$id1][$id2]!=$this->inf) $this->max_dist = $this->dist[$id1][$id2];
            }
        }
        $this->c_dist = $this->max_dist - $this->min_dist;
    }
    
    public function step($ver)
    {
        $this->depth++;
        $min = $this->inf;
        $mp = -1;
        $buy = -1;
        $sell = -1;
        $item = -1;
        
        //$this->source[$ver][0] = 1;
        //$this->dest[$ver][0] = 1;   //Варіант "не перевозити нічого"
        $this->visited[$ver] = true;    //Поточна вершина відвідана
        
        
        foreach ($this->source[$ver] as $key=>$product) //Для кожної можливості купити
        {
            if( $this->source[$ver][$key] <= 0) continue;
            foreach ($this->markets_res as $sid=>$id)
            {
                if ($id != $ver && !$this->visited[ $id ])    //Для кожного іншого маркету
                {
                    //print $this->dest[$id][$key].' ===> '. $this->source[$ver][$key].']<br>';
                    $dif_items = ($this->dest[$id][$key] - $this->source[$ver][$key]) / $this->c_items[$key];
                    $dif_items *= $dif_items > 0;
                    $dif_items = 1-$dif_items;
                    //print $dif_items.'<br>';
                    $dif_dist = ($this->dist[$id][$ver] - $this->min_dist) / $this->c_dist;
                    
                    $dif = $dif_dist*$this->coeff_dist + $dif_items*(1-$this->coeff_dist);
                    
                    if ($dif < $min)
                    {
                        //print $dif.'<br>';
                        $min = $dif;
                        $mp = $id;
                        $buy = $this->source[$ver][$key];
                        $sell = $this->dest[$id][$key];
                        //print $buy.' = > '.$sell.'<br>';
                        $item = $key;
                    }
                }
            }
        }
        
        if ($min==$this->inf || $this->depth == $this->max_depth+1)
        {
            $mp = $this->markets_res[$this->start];
            $item = 0;
            $this->found=true;
        }
         
        $this->chain[$ver] = array('start'=>$ver, 'next'=>$mp, 'buy'=>$buy, 'sell'=>$sell, 'item'=>$item!=0 ? $this->products[$item]->name : 0);
        array_push($this->way,$mp);
        //print $ver.'==('.$buy.' '.$sell.')==>'.$mp.'<br>';
        $ret = $min !== $this->inf and !$this->found ? $this->step($mp) + $min : 0;
        
        return $ret;
    }
    
    public function load($ver, $depth, $c_dist, $ignore_products, $ignore_markets)
    {
        //$this->num_markets = $this->CI->data_model->get_num_markets();
        //$this->num_markets = $this->num_markets[0]->num;
        $this->start = $ver;
        $this->max_depth = $depth - 1;
    
        $this->coeff_dist = $c_dist/100;
        
        //print $this->coeff_dist.'<br>';
        
        $this->all_products = $this->CI->data_model->get_products(-1,-1,$ignore_products);  //всі продукти
        $this->all_items = $this->CI->data_model->get_items(-1,-1,$ignore_products);    //всі айтеми
        
        $this->markets = $this->CI->data_model->get_markets($ignore_markets);  //Список міст
        
        //print_r($this->all_products);
        //print '<br><br>';
        //print_r($this->all_items);
        //print '<br><br>';
        //print_r($this->markets);
        //print '<br><br>';
        
        $i=0;
        foreach ($this->markets as $col)
        {
            $this->markets_res[$col->id] = $i;  //Вдіповідність між айді маркету та порядковим номером в алгоритмі
            $this->visited[$i] = false; //Всі вершини невідвідані
            $this->coords[$i] = (object) array (
                                      'lat' => $col->lat,
                                      'lng' => $col->lng
            );  //Координати вершини
            
            $key = $i;  //Ключ поточного маркету
            $this->source[$i][0] = 1;
            $this->dest[$i][0] = 1;
        
            if (!empty($this->all_products))    //є продукти - 
            {
                $j=1;   //Перший айтем резервуємо під нульове перевезення
                foreach ($this->all_products as $product)
                {
                    $this->source[$i][$j] = 0;
                    $this->dest[$i][$j] = 0;
                    $this->products[$j] = $product;
                    $this->products_res[$product->id] = $j; //Вдіповідність між айді продукту та порядковим номером в алгоритмі
                    $j++;
                }
            }
            
            $items = $this->CI->data_model->get_items($col->id, 0, $ignore_products);   //Айтеми, що продаються в поточному маркеті
            
            if (!empty($items))
            {
                $j=0;
                foreach ($items as $item)
                {
                    $this->source[$key][$this->products_res[$item->id]] = $item->price;
                    $j++;
                }
            }
            
            $items = $this->CI->data_model->get_items($col->id, 1, $ignore_products);   //Айтеми, що купують в поточному маркеті
            
            if (!empty($items))
            {
                $j=0;
                foreach ($items as $item)
                {
                    $this->dest[$key][$this->products_res[$item->id]] = $item->price;
                    //print $this->source[$key][$this->products_res[$item->id]].' => '.$this->dest[$key][$this->products_res[$item->id]].'<br>';
                    $j++;
                }
            }
            
            $i++;
        }
        
        $this->c_items[0] = 1;
        foreach ($this->products_res as $product)   //Коефіцієнт нормування до 0...1
        {
            $max = $this->inf; $min = 0; $this->c_items[$product] = 1;
            foreach ($this->markets_res as $market)
            {
                $dest = $this->dest[$market][$product];
                if ($dest > $min) $min = $dest;
                $source =  $this->source[$market][$product];
                if ($source < $max and $source > 0) $max = $source;
                //print $this->source[$market][$product].' => '.$this->dest[$market][$product].'<br>';
            }
            //print $max.'  '.$min.'<br>';
            if ($min - $max > 0) $this->c_items[$product] = $min - $max;
            //print $this->c_items[$product].'<br>';
        }
        
        //print_r($this->source);
        //print '<br>';
        //print_r($this->dest);
        //print '<br>';
        
        $this->way = array();
        $this->chain = array();
        array_push($this->way, $this->markets_res[$ver]);
        
        $this->find_distances();
        //$this->find_diffs();
        
        //print_r($this->source);
        
        $this->step($this->markets_res[$ver]);
        //die(print_r($this->all_products));
        
        for ($i = 0; $i < count($this->way); $i++)
        {
            $this->way[$i] = array_search($this->way[$i], $this->markets_res);
        }
        //die(var_dump($this->chain));
        $this->result['way'] = $this->way;
        $this->result['chain'] = $this->CI->load->view('general/chain_view',array('chains'=>$this->chain, 'markets'=>$this->markets),true);
        
        return $this->result;
    }
    
    public function print_table($table)
    {
        $m = count($table);
        $n = count($this->all_products);
        print "<table>";
        foreach($table as $col)
        {
            print "<tr>";
            foreach($col as $row)
            {
                print "<td style='width:50px;'>".$row."</td>";
            }
            print "</tr>";
        }
        print "</table>";
    }
}