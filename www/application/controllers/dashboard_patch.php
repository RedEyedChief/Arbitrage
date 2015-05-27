diff --git "a/C:\\Users\\FISHER~1\\AppData\\Local\\Temp\\TortoiseGit\\das3DD0.tmp\\dashboard-5924325-left.php" "b/C:\\WebServers\\home\\Arbitrage\\www\\application\\controllers\\dashboard.php"
index 356c148..07a2688 100644
--- "a/C:\\Users\\FISHER~1\\AppData\\Local\\Temp\\TortoiseGit\\das3DD0.tmp\\dashboard-5924325-left.php"
+++ "b/C:\\WebServers\\home\\Arbitrage\\www\\application\\controllers\\dashboard.php"
@@ -1,7 +1,5 @@
 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
-
 class Dashboard extends CI_Controller {
-
 	function __construct()
 	{
 		parent::__construct();
@@ -165,10 +163,8 @@ class Dashboard extends CI_Controller {
 		$this->load->view('admin/splitters/end_row');
 		$this->load->view('admin/admin_footer');
 	}
-
-	//Machulyanskiy
+	
 	function parsing()
-<<<<<<< HEAD
     	{
     		$this->blocsBefore();
     		$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
@@ -179,7 +175,6 @@ class Dashboard extends CI_Controller {
     		//$this->data['html']->clear();
     		$this->load->view('admin/splitters/end_row');
     		$this->load->view('admin/admin_footer');
-
     	}
 	
 	function testResult()
@@ -204,115 +199,5 @@ class Dashboard extends CI_Controller {
     		$this->load->view('general/map', $data);
     		$this->load->view('admin/splitters/end_row');
     		$this->load->view('admin/admin_footer');
-
     	}
-=======
-    {
-    	$this->blocsBefore();
-    	$this->data['html'] = file_get_html('http://hotline.ua/knigi/');
-    	//$this->data['parser'] = $this->content_model->get_OP();
-
-    	$this->load->view('admin/parsing_view');
-;
-    	$this->load->view('admin/splitters/end_row');
-    	$this->load->view('admin/admin_footer');
-
-    }
-
-	//Machulyanskiy: processing the request to the source
-    function parsing_request()
-    {
-		$parserURL = $this->input->post('parserURL', TRUE);
-		$parserRule = $this->input->post('parserRule', TRUE);
-		$parserProductType = $this->input->post('parserProductType', TRUE);
-		$parserCategory = $this->input->post('parserCategory', TRUE);
-
-		$headers = @get_headers($parserURL);
-
-        if($headers[0] == 'HTTP/1.1 200 OK')
-        {
-        			$count = 0;
-        			$this->data['html'] = file_get_html($parserURL);
-        			$rule = $this->data['html']->find($parserRule);
-        			if($rule == NULL)
-        			{
-        				$this->data['html'] -> clear();
-        				unset($this->data['html']);
-        				echo json_encode(array('status' => 'not_ok' , 'message' => 'Wrong Rule!'));
-        			}
-        			else
-        			{
-        				//save object of parsing to db
-                    	//$id_parser = $this->content_model->saveOP($parserURL, $parserRule);
-                    	$id_parser = 6;
-
-                    	//save product of parsing to db
-                        //$id_product = $this->content_model->save_product_OP($parserProductType, $parserCategory);
-                        $id_product = 10;
-
-        				foreach ($rule as $element) //'ul[class=book-tabl] li'
-        				{
-        					$count++;
-        					$arr[] =  array('status' => 'ok' ,'count' =>$count, 'info' => $element->plaintext, 'idProduct' => $id_product, 'idParser' => $id_parser);
-        				}
-
-        				$this->data['html'] -> clear();
-        				unset($this->data['html']);
-
-        				echo json_encode($arr);
-        			}
-       	}
-        else echo json_encode(array('status' => 'not_ok' , 'message' => 'Wrong URL!'));
-    }
-
-	//Machulyanskiy: processing the element OP
-    function save_items_of_product()
-    {
-    	$parserProductName = $this->input->post('parserProductName', TRUE);
-        $parserPrice = $this->input->post('parserPrice', TRUE);
-        $parserSeller = $this->input->post('parserSeller', TRUE);
-        $parserCount = $this->input->post('parserCount', TRUE);
-        $parserType = $this->input->post('parserType', TRUE);
-        $idProduct = $this->input->post('idProduct', TRUE);
-        $parserMarket = $this->input->post('parserMarket', TRUE);
-        $idMarket = $parserMarket;
-        echo $idMarket . '  ' . $idProduct . '  ' . $parserSeller;
-
-        //$idCity = $this->content_model->get_idCity($parserCity);
-
-		//$error = $this->content_model->save_items_of_product($parserProductName, $parserPrice, $parserCount, $parserType, $idProduct, $idMarket, $parserSeller);
-
-		if($error == null)		echo json_encode(array('status' => 'ok'));
-    }
-
-	//Machulyanskiy: delete OP
-	function delete_OP()
-    {
-        $id = $this->input->post('id', TRUE);
-    	$error = $this->content_model->delete_OP($id);
-        echo json_encode($error);
-    }
-
-	//Machulyanskiy: get list OP
-    function get_OP()
-    {
-    	$error = $this->content_model->get_OP();
-		//print_r ($error);
-		//prin($error);
-		//if($error !== NULL) echo json_encode($error);
-    	echo json_encode($error);
-    }
-
-	//Machulyanskiy: get list of elements OP
-    function get_elements_OP()
-    {
-    	$id = $this->input->post('id', TRUE);
-    	$error = $this->content_model->get_elements_OP($id);
-    	//print_r ($error);
-    	foreach ($error as $client_info)
-			$arr[] =  array('id' => $client_info['idProduct'], 'name' => $client_info['nameProduct'], 'price' => $client_info['priceProduct']);
-
-    	echo json_encode($arr);
-    }
->>>>>>> 364c1921108420ca53f7d1ca2fd2e35ae86bc135
-}
+}
\ No newline at end of file
