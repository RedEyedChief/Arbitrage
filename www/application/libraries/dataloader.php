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
        $this->dist = array();
        $this->max_dist = 0;
        $this->inf = 100000;
        $this->min_dist = $this->inf;
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
        print $this->min_dist.'    '.$this->max_dist.'<br>';
    }
    
    public function find_diffs()
    {
        foreach ($this->source as $key=>$ver)
        {
            foreach ($ver as $id=>$s)
            {
                //$s = intval($s);
                $d = $this->dest[$key][$id];
                print $d.'  '.$s;
                print '<br>';
            }
        }
    }
    
    public function step($ver)
    {
        //die(print_r($this->source[$ver]));
        $min = $this->inf;
        $mp = -1;
        
        $this->source[$ver][0] = 100;
        $this->dest[$ver][0] = 1000;
        //print 'step<br>';
        
        $this->visited[$ver] = true;
        //die(print_r($this->coords));
        foreach ($this->source[$ver] as $key=>$product) //For each product source
        {
            //print 'f';
            if( $this->source[$ver][$key] <= 0) continue;
            foreach ($this->markets as $id=>$market)
            {
                if ($id != $ver && !$this->visited[ $id ])    //For each other market
                {
                    $this->dest[$id][0]=1;
                    //print "Source = ".$this->source[$ver][$key]."; dest = ".$this->dest[$id][$key]."<br>";
                    //$dif = $this->dest[$id][$key] - $this->source[$ver][$key];
                    
                    $dif = $this->dist[$id][$ver];
                    
          //          print $dif.' between '.$id.' and '.$ver.' is '.$dif.'<br>';
                    
                    if ($dif < $min)
                    {
                        $min = $dif;
                        $mp = $id;
                    }
                }
            }
            //if ( $this->source[$ver][$key] > $max and !$this->visited[$key] )
            //{
            //    $mp = $key;
            //    $max = $this->source[$ver][$key];
            //}
        }
        //if ($mp==$this->start) print "finded<br>";
        //print $ver."== (".$max.") ==>".$mp."<br>";
        if ($min==$this->inf) { $mp = $this->markets_res[$this->start]; }
        array_push($this->way,$mp);
        //print "mp = ".$mp.'; max = '.$max.'<br>';
        //print 'max '.$max.'<br>';
        //print $min." mp = ".$mp."<br>";
        $ret = $min !== $this->inf ? $this->step($mp) + $min : 0;
        //die(print_r($ret));
        return $ret;
    }
    
    public function load($ver)
    {   
        $this->num_markets = $this->CI->data_model->get_num_markets();
        $this->num_markets = $this->num_markets[0]->num;
        $this->start = $ver;
        //
        //$this->num_products_sell = $this->CI->data_model->get_num_products(0);
        //$this->num_products_sell = $this->num_products_sell[0]->num;
        //
        //$this->num_products_buy = $this->CI->data_model->get_num_products(1);
        //$this->num_products_buy = $this->num_products_buy[0]->num;
        
        $this->all_products = $this->CI->data_model->get_products();
        $this->all_items = $this->CI->data_model->get_items();
        //for($i=0;$i<$num_markets;$i++)
        //{
        //    for($j=0;j<$num_products;$j++)
        //    {
        //        $table[$i][$j] = 0;
        //    }
        //}
        
        $this->markets = $this->CI->data_model->get_markets();  //Список міст
        //$this->products = $this->data_model->get_products();
        
        $i=0;
        foreach ($this->markets as $col)
        {
            //$this->markets[$col->id] = $i;
            $this->markets_res[$col->id] = $i;
            $this->visited[$i] = false;
            $this->coords[$i] = (object) array (
                                      'lat' => $col->lat,
                                      'lng' => $col->lng
            );
            
            $key = $i;
            
            if (!empty($this->all_products))
            {
                $j=0;
                foreach ($this->all_products as $product)
                {
                    $this->source[$i][$j] = 0;
                    $this->dest[$i][$j] = 0;
                    $this->products[$product->id] = $j;
                    $j++;
                    //array_push ( $table , fetch_id_column( $this->data_model->get_products($col->id, $col->type) , $this->products_ids ) );  //Тип - продаж, купівля
                }
            }
            
            $items = $this->CI->data_model->get_items($col->id, 0);//sell
            //$this->source[$key][0] = 1;
            //$this->dest[$key][0] = 1;
            
            if (!empty($items))
            {
                $j=0;
                foreach ($items as $item)
                {
                    $this->source[$key][$this->products[$item->id]] = $item->price;
                    $j++;
                    //array_push ( $table , fetch_id_column( $this->data_model->get_products($col->id, $col->type) , $this->products_ids ) );  //Тип - продаж, купівля
                }
            }
            
            $items = $this->CI->data_model->get_items($col->id, 1);//buy
            if (!empty($items))
            {
                $j=0;
                foreach ($items as $item)
                {
                    $this->dest[$key][$this->products[$item->id]] = $item->price;
                    $j++;
                    //array_push ( $table , fetch_id_column( $this->data_model->get_products($col->id, $col->type) , $this->products_ids ) );  //Тип - продаж, купівля
                }
            }
            
            $i++;
        }
        
        $this->way = array();
        array_push($this->way, $this->markets_res[$ver]);
        
        $this->find_distances();
        $this->find_diffs();
        
        $this->step($this->markets_res[$ver]);
        for ($i = 0; $i < count($this->way); $i++)
        {
            $this->way[$i] = array_search($this->way[$i], $this->markets_res);
        }
        echo json_encode($this->way);
        //print '<br>';
        
        //foreach ($table as $col)
        //{
        //    print_r($col);
        //    echo "<br>";
        //}
        //$this->print_table($this->source);
        //print "<br>";
        //$this->print_table($this->dest);
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