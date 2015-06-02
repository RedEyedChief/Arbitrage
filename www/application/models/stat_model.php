<?php
class Stat_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))        // Визначаємо IP
        { $ip=$_SERVER['HTTP_CLIENT_IP']; }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
        { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; }
        else { $ip=$_SERVER['REMOTE_ADDR']; }
        return $ip;
    }
    
    public function writeLog()  {
        $file=realpath(FCPATH)."/static/log/stat.log";    // файл для запису історії відвідування
        $col_zap=4999;    // обмежуємо к-сть рядків log-файлу 
        if (strstr($_SERVER['HTTP_USER_AGENT'], 'YandexBot')) {$bot='YandexBot';} //Виявляємо пошукових ботів
        elseif (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')) {$bot='Googlebot';}
        else { $bot=$_SERVER['HTTP_USER_AGENT']; }
        
        $ip = $this->getRealIpAddr();
        $date = date("H:i:s d.m.Y");        // визначаємо дату та час події
        $home = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    // визначаємо сторінку сайту
        $lines = file($file);
        while(count($lines) > $col_zap) array_shift($lines);
        $lines[] = $date."|".$bot."|".$ip."|".$home."|\r\n";
        file_put_contents($file, $lines);
    }
    
    public function insertLog($tag,$message)
    {
        $mysqltime = date ("Y-m-d H:i:s");
        $data = array(
                      'tagLog'=>$tag,
                      'messageLog'=>$message,
                      'dateLog'=>$mysqltime
                      );
        $this->db->insert('log',$data);
    }
    
    public function selectLogs($tag)
    {
        $query = $this->db->query("SELECT DATE_FORMAT( from_unixtime( UNIX_TIMESTAMP( dateLog ) ), '%d-%m-%Y') AS date, COUNT(idLog) AS num FROM (`log`) WHERE `tagLog` = '".$tag."' GROUP BY `date` ORDER BY `dateLog` LIMIT 10");
        
        if($query -> num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
    
    //function viewArticle($id) {
    //    $this->db->start_cache();
    //    $this->db->where('idArticle', $id);
    //    $this->db->set('viewsArticle', 'viewsArticle+1', FALSE);
    //    $this->db->update('article');
    //    $this->db->stop_cache();
    //    $this->db->flush_cache();
    //}
    //
    //function viewCategory($name)
    //{
    //    $this->db->start_cache();
    //    $this->db->where("nameCategoryView",$name);
    //    $this->db->where("dateCategoryView",date('Y-m-d'));
    //    $this->db->set('numberCategoryView','numberCategoryView+1',false);
    //    $result = $this->db->update("categoryView");
    //    $rows = $this->db->affected_rows();
    //    $this->db->stop_cache();
    //    $this->db->flush_cache();
    //   // $afftectedRows=$this->db->affected_rows();
    //    if($rows>0)
    //    {
    //        return true;
    //    }
    //    else
    //    {
    //        $this->db->start_cache();
    //        $data = array(
    //            "nameCategoryView"=>$name,
    //            "dateCategoryView"=>date('Y-m-d')
    //        );
    //        $this->db->insert("CategoryView",$data);
    //        $this->db->stop_cache();
    //        $this->db->flush_cache();
    //    }
    //}
}
?>