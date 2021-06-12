<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
class admin extends CI_Controller
{
		private $token;
		private $connected;
		protected $email_sites;
		public function __construct()
		{
		  parent::__construct();
		  if(!$this->session->userdata('admin_login'))
		  {
		      	redirect(base_url().'login');
		  }
		  $this->load->library('form_validation');
		  $this->load->library('encryption');
	      // $this->load->library('pdf');
		  $this->load->model('crud_model'); 

		  $this->load->helper('url');

		  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
		  $this->connected = $this->session->userdata('admin_login');
		  $this->email_sites = $this->crud_model->get_email_du_site();

		}

		function index(){
			$data['title']="mon profile admin";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/templete_admin', $data);
		}

		function dashbord(){
			  $data['title']="Tableau de bord";
			  $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		      // $data['nombre_location'] = $this->crud_model->statistiques_nombre("profile_location");


		      $data['nombre_client'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 2);

		      $data['nombre_membre'] = $this->crud_model->statistiques_nombre_tag_by_column("users", 3);

		      $data['nombre_paiement'] = $this->crud_model->statistiques_nombre_valider("paiement");

		      $data['nombre_users'] = $this->crud_model->statistiques_nombre("product");
		      $this->load->view('backend/admin/dashbord', $data);
		}

		function stat_entree(){
			 $data['title']="Filtrage entrée en stock marchandise";
			 $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 

			 $date1=$this->input->post('date1');
			 $date2=$this->input->post('date2');
			 if ($date1=='' && $date2=='') {
			 	$data['nombre_total'] = $this->crud_model->statistiques_nombre_entree_enstock("profile_entree_stock");
			 	$data['nombre_total_by_cat'] = $this->crud_model->statistiques_nombre_entree_enstock_cat("profile_entree_stock");
			 	$data['title']="Filtrage entrée en stock marchandise";
			 	$this->load->view('backend/admin/stat_entree_stock', $data);
			 }
			 else{
			 	$data['title']="Filtrage entrée en stock marchandise";

			 	$data['date1']=$date1;
			 	$data['date2']=$date2;
			 	$this->load->view('backend/admin/stat_entree_stock', $data);
			 }
		}

		function stat_sortie(){
			 $data['title']="Filtrage sortie en stock marchandise";
			 $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 

			 $date1=$this->input->post('date1');
			 $date2=$this->input->post('date2');
			 if ($date1=='' && $date2=='') {
			 	
			 	$data['title']="Filtrage sortie en stock marchandise";
			 	$this->load->view('backend/admin/stat_sortie_stock', $data);
			 }
			 else{
			 	$data['title']="Ok Filtrage sortie en stock marchandise";

			 	$data['date1']=$date1;
			 	$data['date2']=$date2;
			 	$this->load->view('backend/admin/stat_sortie_stock', $data);
			 }
		}

		function impressionStockEntrant(){
	       $customer_id = "Bon d'etrée en stock ";
	       $html_content = '';
	       $html_content .= $this->crud_model->Fiche_impressionStockEntrant();

	       // $this->load->library('pdf');
	       // echo($html_content);
	       $this->pdf->loadHtml($html_content);
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }

	    function stat_fichestock(){

	       $data['title']="Fiche de stock des marchandises";
	       $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	       $customer_id = "Fiche de stock ";
	       $html_content = '';
	       $html_content .= $this->crud_model->Fiche_impressionFichedeStock();

	       // echo($html_content);

	       $this->pdf->loadHtml($html_content);
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }

	    // pour la sortie en stock
	    function impressionStockSortie(){
	       $customer_id = "Bon de sortie en stock ";
	       $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	       $html_content = '';
	       $html_content .= $this->crud_model->Fiche_impressionStockSortie();

	       // echo($html_content);
	       $this->pdf->loadHtml($html_content);
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }

	    function impressionStockEntrant_Date($date1='', $date2=''){
	       $customer_id = "Fiche d'approvisionnement en stock ";
	       $html_content = '';

	       if ($date1 > $date2) {
	       	# code...
	        $html_content .= $this->crud_model->Fiche_impressionStockEntrant_Date($date2, $date1);
	       }
	       else{

	       	$html_content .= $this->crud_model->Fiche_impressionStockEntrant_Date($date1, $date2);

	       }

	       // echo($html_content);

	       $this->pdf->loadHtml($html_content);
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }

	    // bon de sortie filtrage 
	    function impressionStockSortie_Date($date1='', $date2=''){
	       $customer_id = "Fiche d'approvisionnement en stock ";
	       $html_content = '';

	       if ($date1 > $date2) {
	       	# code...
	        $html_content .= $this->crud_model->Fiche_impressionStockSortie_Date($date2, $date1);
	       }
	       else{

	       	$html_content .= $this->crud_model->Fiche_impressionStockSortie_Date($date1, $date2);

	       }

	       // echo($html_content);

	       $this->pdf->loadHtml($html_content);
	       $this->pdf->render();
	       $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }



		function profile(){
	      $data['title']="mon profile admin";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users'] = $this->crud_model->fetch_connected($this->connected);
	      // $this->load->view('backend/admin/viewx', $data);
	      $this->load->view('backend/admin/profile', $data);
	    }

	    function basic(){
	        $data['title']="Information basique de mon compte";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic', $data);
	    }

	    function basic_image(){
	        $data['title']="Information basique de ma photo";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic_image', $data);
	    }

	    function basic_secure(){
	        $data['title']="Paramètrage de sécurité de mon compte";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/basic_secure', $data);
	    }

	    function notification($param1=''){
	      $data['title']    ="Listes des formations";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['users']    = $this->crud_model->fetch_connected($this->connected);
	      $this->load->view('backend/admin/notification', $data);
	    }


		function site(){
			$data['title']="Paramétrage  du site";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	    	$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/site', $data);		
		}
		function role(){
			$data['title']="Paramètrage de roles";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/role', $data);
		}

		function category(){

			$data['title']="Paramètrage cétegorie produit";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$this->load->view('backend/admin/category', $data);
		}

		function users(){
	      $data['title']="Nos utilisateurs";
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	      $data['nombre_users']   = $this->crud_model->statistiques_nombre("users");
	      $data['nombre_users_m'] = $this->crud_model->statistiques_nombre_where("users","sexe","M");
	      $data['nombre_users_f'] = $this->crud_model->statistiques_nombre_where("users","sexe","F");
	      $data['nombre_users_a'] = $this->crud_model->statistiques_nombre_where_null("users","sexe","NULL");
	      $data['users']  = $this->crud_model->Select_users();   
	      $data['roles']  = $this->crud_model->Select_roles();    
	      $this->load->view('backend/admin/users', $data);
	    }

	    function stat_users(){
		    $data['title']="Statistique sur nos utilisateurs";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
		    $data['nombre_users']   = $this->crud_model->statistiques_nombre("users");
		    $data['nombre_users_m'] = $this->crud_model->statistiques_nombre_where("users","sexe","M");
		    $data['nombre_users_f'] = $this->crud_model->statistiques_nombre_where("users","sexe","F");
		    $data['nombre_users_a'] = $this->crud_model->statistiques_nombre_where_null("users","sexe","NULL");
		    $this->load->view('backend/admin/stat_users', $data);
		}


		// script pour la sauvegarge de données 
	    function database($param1 = '', $param2 = '')
	    {
	        
	        if($param1 == 'restore')
	        {
	            // $this->crud_model->import_db();
	            $this->session->set_flashdata('message',"Importation de la base des données avec succès!!!");
	            redirect(base_url() . 'admin/database/', 'refresh');
	        }
	        if($param1 == 'create')
	        {
	          $this->crud_model->create_backup();
	          $this->session->set_flashdata('message',"Sauvegarde de la base des données avec succès!!!");
	          redirect(base_url() . 'admin/database/', 'refresh');
	        }

	        $data['title'] = "Sauvegarde et restauration de la base des données";
	        $data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
	         $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
	        $data['users'] = $this->crud_model->fetch_connected($this->connected);
	        $this->load->view('backend/admin/database', $data);
	    }
	    // fin script sauvegarde des données 

	    function approvisionnement(){
			$data['title']="Approvisionnement des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/approvisionnement', $data);
		}

		function galery(){

			$data['title']="Ajout Approvisionnement galery des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/galery', $data);
		}

		function entree(){

			$data['title']="Entrée en stock des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/entree_stock', $data);
		}

		function evaluation(){

			$data['title']="Sortie en stock des produits";
			$data['contact_info_site']  = $this->crud_model->Select_contact_info_site(); 
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['produits'] = $this->crud_model->fetch_produits();
			$this->load->view('backend/admin/evaluation_stock', $data);
		}

		function contact_info(){
		    $data['title']="Les informations de contact";
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
		    $this->load->view('backend/admin/contact_info', $data);
		}

		/*

	    DEBIT FONCTION APPEL DES VIEWS UTILISATION DE PORTALI Ecommerce
	    MES SCRIPTS EcommerceB COMMENCE DEJE
	    ========================================================
	    */

	    function paiement_pading($param1=''){
	    	$data['title']="Les transactions de paiement!";
	    	$data['token']= $param1;
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
	    	$data['mes_ventes'] = $this->crud_model->fetch_connected_vente_all(); 
		    $this->load->view('backend/admin/achat', $data);

	    }

	    function compte($param1=''){
	    	$data['title']="Liste de nos paiements et vente!";
	    	$data['token']= $param1;
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
	    	$data['mes_ventes'] = $this->crud_model->fetch_connected_vente_all(); 
		    $this->load->view('backend/admin/compte', $data);

	    }

	    function stat_paiement(){
	    	$data['title']="Statistique sur paiements et vente!";
	    	$data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $data['contact_info_site']  = $this->crud_model->Select_contact_info_site();
	    	$data['mes_ventes'] = $this->crud_model->fetch_connected_vente_all(); 
	    	$data['year_list'] = $this->crud_model->fetch_year();
		    $this->load->view('backend/admin/statistique_vente', $data);
	    }

	    function facturePaiement($code=''){
	       $customer_id = "paiement facture n° ".$code;
	       $idpersonne = $this->crud_model->fetch_clicent_Panier_tag($code);
	       // operation d'envois des notification 
	        // $this->load->library('pdf');

	       $dataUpdate = array(
	        'etat_paiement' =>  1
	       );

	       $cool = $this->crud_model->update_paiement_etat($code, $dataUpdate);
	       if (!$cool) {

	       		$url    ="user/facturePaiement/". $code;
                $nom    = $this->crud_model->get_name_user($idpersonne);

                // $nom = $this->input->post('titre');
                $message ="Bonjour ".$nom." votre paiement a été validé avec succès 👌";

                $notification = array(
                  'titre'     =>    "Félicitation d'avance!!!",
                  'icone'     =>    "fa fa-check",
                  'message'   =>     $message,
                  'url'       =>     $url,
                  'id_user'   =>     $idpersonne
                );
                
                $not = $this->crud_model->insert_notification($notification);

                $dataUpdate = array(
                	'etat_vente'	=> 1
                );
                $this->crud_model->updated_padding_vente($code, $dataUpdate);
	       	
	       }
	       // fin envois 
	       $html_content = '';
	       $html_content .= $this->crud_model->fetch_single_details_facture($idpersonne, $code);
	       echo($html_content);
	       // $this->pdf->loadHtml($html_content);
	       // $this->pdf->render();
	       // $this->pdf->stream("paiement reçu_".$customer_id.".pdf", array("Attachment"=>0));
	    }

	    function fetch_data()
		{
		  if($this->input->post('year'))
		  {
		   $chart_data = $this->crud_model->fetch_chart_data($this->input->post('year'));
		   
		   foreach($chart_data->result_array() as $row)
		   {
		    $output[] = array(
			     'month'  => $row["month"],
			     'profit' => floatval($row["montant"])
		    );
		   }
		   echo json_encode($output);
		  }
		}






	    /*

	    DEBIT FONCTION APPEL DES VIEWS UTILISATION DE PORTALI Ecommerce
	    MES SCRIPTS EcommerceB COMMENCE DEJE
	    ========================================================
	    */


	    function modification_panel($param1='', $param2='', $param3=''){

		      if ($param1="option1") {
		         $data = array(
		            'first_name'        => $this->input->post('first_name'),
		            'last_name'       => $this->input->post('last_name'),
		            'telephone'       => $this->input->post('telephone'),
		            'full_adresse'      => $this->input->post('full_adresse'),
		            'biographie'        => $this->input->post('biographie'),
		            'date_nais'       => $this->input->post('date_nais'),
		            'sexe'          => $this->input->post('sexe'),
		            'email'         => $this->input->post('mail_ok'), 

		            'facebook'        => $this->input->post('facebook'),
		            'linkedin'        => $this->input->post('linkedin'),
		            'twitter'         => $this->input->post('twitter')
		        );

		        $id_user= $this->connected;
		        $query = $this->crud_model->update_crud($id_user, $data);
		        $this->session->set_flashdata('message', 'votre profile a été mis à jour avec succès!!!🆗');
		         redirect('admin/basic', 'refresh');
		      }

		  }

		  function modification_photo(){

		     $id_user= $this->connected;
		     if ($_FILES['user_image']['size'] > 0) {
		       # code...
		        $data = array(
		          'image'     => $this->upload_image()
		        );
		       $query = $this->crud_model->update_crud($id_user, $data);
		       $this->session->set_flashdata('message', 'modification avec succès');
		           redirect('admin/basic_image', 'refresh');
		     }
		     else{

		        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
		        redirect('admin/basic_image', 'refresh');

		     }
		     
		  }


		  function upload_image()  
		  {  
		       if(isset($_FILES["user_image"]))  
		       {  
		            $extension = explode('.', $_FILES['user_image']['name']);  
		            $new_name = rand() . '.' . $extension[1];  
		            $destination = './upload/photo/' . $new_name;  
		            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
		            return $new_name;  
		       }  
		  }

		  function modification_account($param1=''){
		       $id_user= $this->connected;
		       $first_name;

		       $passwords = md5($this->input->post('user_password_ancien'));
		       
		       $users = $this->db->query("SELECT * FROM users WHERE passwords='".$passwords."' AND id='".$id_user."' ");

		       if ($users->num_rows() > 0) {
		          
		          foreach ($users->result_array() as $row) {
		            $first_name = $row['first_name'];
		            // echo($first_name);
		             $nouveau   =  $this->input->post('user_password_nouveau');
		             $confirmer =  $this->input->post('user_password_confirmer');
		             if ($nouveau == $confirmer) {
		              $new_pass= md5($nouveau);

		              $data = array(
		                  'passwords'  => $new_pass
		                );

		                 $query = $this->crud_model->update_crud($id_user, $data);
		                 $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès '.$first_name);
		                   redirect('admin/basic_secure', 'refresh');

		               }
		               else{
		   
		                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
		                redirect('admin/basic_secure', 'refresh');
		               }
		         
		          }

		       }
		       else{

		          $this->session->set_flashdata('message2', 'information incorecte');
		          redirect('admin/basic_secure', 'refresh');
		       }
		     
		  } 

		  function view_1($param1='', $param2='', $param3=''){
		      
			  if($param1=='display_delete') {
			  	$this->session->set_flashdata('message', 'suppression avec succès ');
			    $query = $this->crud_model->delete_notifacation_tag($param2);
			    redirect('admin/notification');
			  }

			  if($param1=='display_delete_message') {

			    $query = $this->crud_model->delete_message_tag($param3);
			    redirect('admin/message/'.$param2);
			  }
			  else{

			  }

		  }


		// script de produit en stock

		function pagination_view_product()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_product();
		  $config["per_page"] = 10;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li class="page-item">';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li class="page-item">';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
		  $config["next_tag_open"] = '<li class="page-item">';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
		  $config["prev_tag_open"] = "<li class='page-item'>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li class='page-item'>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_product($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		

		function fetch_search_view_product()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_view_product($query);
		  $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="15%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Catégorie produit</th>
	               <th width="15%">Qte en stock</th>
	               <th width="10%">Utilisateur action</th>
	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </thead> 
	      ';
	      if ($data->num_rows() < 0) {
	        
	      }
	      else{

	        foreach($data->result() as $row)
	        {
	         $output .= '
	         <tr>
	          <td><img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->product_name, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->product_price, 0,10)).' $'.'</td>
	          <td>'.nl2br(substr($row->nom, 0,20)).' ...'.'</td>
	          <td>'.nl2br(substr($row->Qte, 0,10)).' '.'</td>
	          <td>'.nl2br(substr($row->first_name, 0,10)).'...'.'</td>
	          
	          <td><button type="button" name="update" product_id="'.$row->product_id.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" product_id="'.$row->product_id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          <tfoot>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="15%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Catégorie produit</th>
	               <th width="15%">Qte en stock</th>
	               <th width="10%">Utilisateur action</th>
	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </tfoot>   
	            
	        </table>';
		  echo $output;
		}


        function fetch_product(){  

           $fetch_data = $this->crud_model->make_datatables_product();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->nom, 0,10)).'...'; 

                // $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';
                $sub_array[] = nl2br(substr($row->first_name, 0,10)).'...'; 
                
 
                $sub_array[] = '<button type="button" name="update" product_id="'.$row->product_id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" product_id="'.$row->product_id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_product(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_product(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_product()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_product($_POST["product_id"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['category_id'] 			= $row->category_id; 
                $output['Qte'] 					= $row->Qte;
                $output['nom'] 					= $row->nom;
                

                if($row->product_image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->product_image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_product(){

      	$id_user = $this->session->userdata("admin_login");


      	  if($_FILES["user_image"]["size"] > 0)  
          {  
               $insert_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id'), 
		           'id_user'           		=>     $id_user, 
		           'product_image'          =>     $this->upload_image_product()
			  	);    
          }  
          else  
          {  
               $user_image = "photoDefaut.jpg";  
               $insert_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id'), 
		           'id_user'           		=>     $id_user, 
		           'product_image'          =>     $user_image
			  	); 
          }

	      
	       
	      $requete=$this->crud_model->insert_product($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_product(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'category_id'         	=>     $this->input->post('category_id'),  
		           'Qte'          			=>     $this->input->post("Qte"),
		           'product_image'          =>     $this->upload_image_product()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'product_name'           =>     $this->input->post('product_name'),  
		           'product_price'          =>     $this->input->post("product_price"), 
		           'Qte'          			=>     $this->input->post("Qte"),
		           'category_id'         	=>     $this->input->post('category_id')  
			  	);    
          }
  
          $this->crud_model->update_product($this->input->post("product_id"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_product(){
 
          $this->crud_model->delete_product($this->input->post("product_id"));

          echo("suppression avec succès");
        
      }


      function upload_image_product()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/product/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 
	  // fin de script product 


	  // script de galery produit en stock
        function fetch_galery(){  

           $fetch_data = $this->crud_model->make_datatables_galery();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/galery/'.$row->photos.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                
 
                $sub_array[] = '<button type="button" name="update" idgalery="'.$row->idgalery.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idgalery="'.$row->idgalery.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_galery(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_galery(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_galery()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_galery($_POST["idgalery"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                

                if($row->photos != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/product/galery/'.$row->photos.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->photos.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_galery(){

      
      	  if($_FILES["user_image"]["size"] > 0)  
          {  
                $insert_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $this->upload_image_galery()
			  	);    
          }  
          else  
          {  
               $user_image = "photoDefaut.jpg";  
               $insert_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $user_image
			   ); 
          }

	      
	       
	      $requete=$this->crud_model->insert_galery($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_galery(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'product_id'      =>     $this->input->post('product_id'),  
		           'photos'          =>     $this->upload_image_galery()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'product_id'      =>     $this->input->post('product_id')  
			  	);    
          }
  
          $this->crud_model->update_galery($this->input->post("idgalery"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_galery(){
 
          $this->crud_model->delete_galery($this->input->post("idgalery"));

          echo("suppression avec succès");
        
      }


      function upload_image_galery()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/product/galery/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 
	  // fin de script product galery


		// script de category
	    function fetch_category(){  

	           $fetch_data = $this->crud_model->make_datatables_category();  
	           $data = array();  
	           foreach($fetch_data as $row)  
	           {  
	                $sub_array = array();  
	               
	                $sub_array[] = nl2br(substr($row->nom, 0,50)); 
	                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
	               
	 
	                $sub_array[] = '<button type="button" name="update" idcat="'.$row->idcat.'" class="btn btn-warning btn-sm btn-circle update"><i class="fa fa-edit"></i></button>';  
	                $sub_array[] = '<button type="button" name="delete" idcat="'.$row->idcat.'" class="btn btn-danger btn-sm btn-circle delete"><i class="fa fa-trash"></i></button>';  
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_category(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function fetch_single_category()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_category($_POST["idcat"]);  
	           foreach($data as $row)  
	           {  
	                $output['nom'] 		= $row->nom;  
	                
	               
	           }  
	           echo json_encode($output);  
	      }  


	      function operation_category(){

	          $insert_data = array(  
		           'nom'           	=>     $this->input->post('nom')
			  );  

		      $requete=$this->crud_model->insert_category($insert_data);
		      echo("Ajout information avec succès");
		      
	      }

	      function modification_category(){
	  
	          $updated_data = array(  
		           'nom'           	=>     $this->input->post('nom')
			  );
	  
	          $this->crud_model->update_category($this->input->post("idcat"), $updated_data);

	          echo("modification avec succès");
	      }

	      function supression_category(){
	 
	          $this->crud_model->delete_category($this->input->post("idcat"));
	          echo("suppression avec succès");
	        
	      }

		  // fin de sript parametrage 



	    // script des utilisateurs 
	    function fetch_users(){  

	           $fetch_data = $this->crud_model->make_datatables_users();  
	           $data = array(); 
	           $etat =''; 
	           foreach($fetch_data as $row)  
	           {  
	           		if ($row->idrole == 1) {
	           			$etat ='<span class="badge badge-success">Admin</span>';
	           		}
	           		else if ($row->idrole == 2) {
	           			$etat ='<span class="badge badge-danger">Client</span>';
	           		}
	           		else if ($row->idrole == 3) {
	           			$etat ='<span class="badge badge-info">Boutiquier</span>';
	           		}
	           		else{
	           			$etat ='<span class="badge badge-danger">User</span>';
	           		}

	                $sub_array = array();  
	                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="table-user-thumb" style="border-radius: 50%; width: 50px; height: 30px;" />';  
	                $sub_array[] = nl2br(substr($row->first_name, 0,50)).'...';  
	                $sub_array[] = nl2br(substr($row->last_name, 0,50)).'...'; 

	                $sub_array[] = nl2br(substr($row->sexe, 0,50)).'';

	                $sub_array[] = nl2br(substr($row->email, 0,50));

	                $sub_array[] = nl2br(substr($row->telephone, 0,50));
	                $sub_array[] = $etat;

	                
	 
	                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>'; 

	                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';
	                
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_users(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_users(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function operation_users(){

	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $insert_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'passwords'      =>     md5(123456),
	                   'idrole'         =>     $this->input->post("idrole"), 
	                   'image'          =>     $this->upload_image_users()
	                );    
	          }  
	          else  
	          {  
	                 $user_image = "icone-user.png";  
	                 $insert_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'image'          =>     $user_image
	                );   
	          }

	        $requete=$this->crud_model->insert_users($insert_data);
	        echo("Ajout information avec succès");
	        
	      }

	      function modification_users(){

	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $updated_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'linkedin'       =>     $this->input->post("linkedin"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'image'          =>     $this->upload_image_users()
	                );    
	          }  
	          
	          else  
	          {   
	               $updated_data = array(  
	                   'first_name'     =>     $this->input->post('first_name'),  
	                   'last_name'      =>     $this->input->post("last_name"),
	                   'email'          =>     $this->input->post("email"),
	                   'telephone'      =>     $this->input->post("telephone"),
	                   'full_adresse'   =>     $this->input->post("full_adresse"),
	                   'date_nais'      =>     $this->input->post("date_nais"), 
	                   'sexe'           =>     $this->input->post("sexe"),
	                   'facebook'       =>     $this->input->post("facebook"),
	                   'twitter'        =>     $this->input->post("twitter"),
	                   'idrole'         =>     $this->input->post("idrole"),
	                   'linkedin'       =>     $this->input->post("linkedin")
	                );   
	          }
	  
	          
	          $this->crud_model->update_users($this->input->post("id"), $updated_data);

	          echo("modification avec succès");
	      }

	      function supression_users(){
	 
	          $this->crud_model->delete_users($this->input->post("id"));
	          echo("suppression avec succès");
	        
	      }

	      function fetch_single_users()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_users($this->input->post('id'));  
	           foreach($data as $row)  
	           {  
	                $output['first_name'] = $row->first_name;  
	                $output['last_name'] = $row->last_name; 

	                $output['email'] = $row->email;
	                $output['telephone'] = $row->telephone;
	                $output['full_adresse'] = $row->full_adresse;
	                $output['biographie'] = $row->biographie;
	                $output['date_nais'] = $row->date_nais;
	                $output['sexe'] = $row->sexe;
	                $output['idrole'] = $row->idrole;

	                $output['facebook'] = $row->facebook;
	                $output['linkedin'] = $row->linkedin;
	                $output['twitter'] = $row->twitter;
	                $output['image'] = $row->image;

	                if($row->image != '')  
	                {  
	                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="300" height="250" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
	                }  
	                else  
	                {  
	                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	                }  

	                
	           }  
	           echo json_encode($output);  
	      }

      // fun script utilisateurs 



	    // script de role
		function fetch_role(){  

		       $fetch_data = $this->crud_model->make_datatables_role();  
		       $data = array();  
		       foreach($fetch_data as $row)  
		       {  
		            $sub_array = array();  
		           
		            $sub_array[] = nl2br(substr($row->nom, 0,50)); 
		            $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
		           

		            $sub_array[] = '<button type="button" name="update" idrole="'.$row->idrole.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
		            $sub_array[] = '<button type="button" name="delete" idrole="'.$row->idrole.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
		            $data[] = $sub_array;  
		       }  
		       $output = array(  
		            "draw"                =>     intval($_POST["draw"]),  
		            "recordsTotal"        =>     $this->crud_model->get_all_data_role(),  
		            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_role(),  
		            "data"                =>     $data  
		       );  
		       echo json_encode($output);  
		  }

		  function fetch_single_role()  
		  {  
		       $output = array();  
		       $data = $this->crud_model->fetch_single_role($_POST["idrole"]);  
		       foreach($data as $row)  
		       {  
		            $output['nom']    = $row->nom;  
		            
		           
		       }  
		       echo json_encode($output);  
		  }  


		  function operation_role(){

		    $insert_data = array(  
		           'nom'            =>     $this->input->post('nom')
		    );  

		      $requete=$this->crud_model->insert_role($insert_data);
		      echo("Ajout information avec succès");
		      
		  }

		  function modification_role(){

		      $updated_data = array(  
		           'nom'            =>     $this->input->post('nom')
		    );

		      $this->crud_model->update_role($this->input->post("idrole"), $updated_data);

		      echo("modification avec succès");
		  }

		  function supression_role(){

		      $this->crud_model->delete_role($this->input->post("idrole"));
		      echo("suppression avec succès");
		    
		  }

		  // fin role

		// script de tbl_info
	    function fetch_tbl_info(){  

	           $fetch_data = $this->crud_model->make_datatables_tbl_info();  
	           $data = array();  
	           foreach($fetch_data as $row)  
	           {  
	                $sub_array = array();  
	                $sub_array[] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail img-responsive" width="50" height="35" style="border-radius:50%;" />';  
	                $sub_array[] = nl2br(substr($row->nom_site, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->email, 0,10)).'...';  
	                $sub_array[] = nl2br(substr($row->tel1, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->tel2, 0,5)).'...'; 
	                $sub_array[] = nl2br(substr($row->adresse, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->facebook, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->twitter, 0,10)).'...'; 
	                $sub_array[] = nl2br(substr($row->linkedin, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->termes, 0,10)).'...'; 
	                // $sub_array[] = nl2br(substr($row->confidentialite, 0,10)).'...'; 
	                
	 
	                $sub_array[] = '<button type="button" name="update" idinfo="'.$row->idinfo.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
	                $sub_array[] = '<button type="button" name="delete" idinfo="'.$row->idinfo.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
	                $data[] = $sub_array;  
	           }  
	           $output = array(  
	                "draw"                =>     intval($_POST["draw"]),  
	                "recordsTotal"        =>     $this->crud_model->get_all_data_tbl_info(),  
	                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_tbl_info(),  
	                "data"                =>     $data  
	           );  
	           echo json_encode($output);  
	      }

	      function fetch_single_tbl_info()  
	      {  
	           $output = array();  
	           $data = $this->crud_model->fetch_single_tbl_info($_POST["idinfo"]);  
	           foreach($data as $row)  
	           {  
	                $output['nom_site']     = $row->nom_site;  
	                $output['adresse']      = $row->adresse; 
	                $output['tel1']       = $row->tel1; 
	                $output['tel2']       = $row->tel2; 
	                $output['email']      = $row->email; 
	                $output['facebook']     = $row->facebook; 
	                $output['twitter']      = $row->twitter; 
	                $output['linkedin']     = $row->linkedin;

	                $output['termes']       = $row->termes;
	                $output['confidentialite']  = $row->confidentialite;

	                $output['description']   = $row->description;
	                $output['mission']       = $row->mission;
	                $output['objectif']      = $row->objectif;
	                $output['blog']      = $row->blog;


	                if($row->icone != '')  
	                {  
	                     $output['user_image'] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->icone.'" />';  
	                }  
	                else  
	                {  
	                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
	                }  
	           }  
	           echo json_encode($output);  
	      }  


	      function operation_tbl_info(){


	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $insert_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'confidentialite'        =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"),
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'              =>     $this->upload_image_tbl_info()
	          );    
	          }  
	          else  
	          {  
	               $user_image = "icone-user.png";  
	               $insert_data = array(  
	               'nom_site'           =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'               =>     $this->input->post('tel2'), 
	               'adresse'            =>     $this->input->post("adresse"), 
	               'facebook'           =>     $this->input->post("facebook"), 
	               'twitter'            =>     $this->input->post("twitter"),
	               'linkedin'           =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'             =>     $this->input->post("termes"),
	               'confidentialite'    =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"), 
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'              =>     $user_image
	          );   
	          }

	        
	         
	        $requete=$this->crud_model->insert_tbl_info($insert_data);
	        echo("Ajout information avec succès");
	        
	      }

	      function modification_tbl_info(){
	  
	          if($_FILES["user_image"]["size"] > 0)  
	          {  
	               $updated_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'confidentialite'        =>     $this->input->post("confidentialite"), 
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"),
	               'blog'               =>     $this->input->post("blog"), 
	               'icone'                  =>     $this->upload_image_tbl_info()
	          );    
	          }  
	          else  
	          {  
	               $updated_data = array(  
	               'nom_site'             =>     $this->input->post('nom_site'),  
	               'tel1'               =>     $this->input->post("tel1"), 
	               'tel2'                 =>     $this->input->post('tel2'), 
	               'adresse'              =>     $this->input->post("adresse"), 
	               'facebook'             =>     $this->input->post("facebook"), 
	               'twitter'              =>     $this->input->post("twitter"),
	               'linkedin'             =>     $this->input->post("linkedin"), 
	               'email'              =>     $this->input->post("email"),
	               'termes'               =>     $this->input->post("termes"),
	               'description'        =>     $this->input->post("description"), 
	               'mission'            =>     $this->input->post("mission"), 
	               'objectif'           =>     $this->input->post("objectif"), 
	               'blog'               =>     $this->input->post("blog"),
	               'confidentialite'        =>     $this->input->post("confidentialite")
	          );    
	          }
	  
	          $this->crud_model->update_tbl_info($this->input->post("idinfo"), $updated_data);

	          echo("modification avec succès");
	      }

	      


	      function supression_tbl_info(){
	 
	          $this->crud_model->delete_tbl_info($this->input->post("idinfo"));

	          echo("suppression avec succès");
	        
	      }

	      // fin script tbl_info


	    // script de galery produit en stock

	    function pagination_view_sortie()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_sortie();
		  $config["per_page"] = 10;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li class="page-item">';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li class="page-item">';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
		  $config["next_tag_open"] = '<li class="page-item">';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
		  $config["prev_tag_open"] = "<li class='page-item'>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li class='page-item'>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_sortie($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		function fetch_search_view_sortie()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_view_sortie($query);
		  $output .= '
	      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
	          <thead>  
	            <tr>         
	               <th width="10%">Image</th>
	               <th width="25%">Nom du produit</th>  
	               <th width="10%">Prix</th>
	               <th width="10%">Qte en stock</th>
	                 
	               <th width="10%">Qte en sortie</th>

	               <th width="25%">Mise à jour</th>

	               <th width="5%">Modifier</th> 
	               <th width="5%">Supprimer</th>  
	            </tr> 
	         </thead> 
	      ';
	      if ($data->num_rows() < 0) {
	        
	        $output .= '
	         <tr>
	          <td colspan="8">Aucune donnée n\'est à présent</td>

	         </tr>
	         ';
	      }
	      else{

	        foreach($data->result() as $row)
	        {
	         $output .= '
	         <tr>
	          <td><img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

	          <td>'.nl2br(substr($row->product_name, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->product_price, 0,10)).' $'.'</td>
	          <td>'.nl2br(substr($row->Qte, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr($row->QteEntree, 0,10)).'...'.'</td>
	          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>

	          <td><button type="button" name="update" ids="'.$row->ids.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button></td>
	          <td><button type="button" name="delete" ids="'.$row->ids.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
	          

	         </tr>
	         ';
	        }
	      }
	      $output .= '
	          <tfoot>  
	                <tr>         
	                  <th width="10%">Image</th>
	                  <th width="25%">Nom du produit</th>  
	                  <th width="10%">Prix</th>
	                  <th width="10%">Qte en stock</th>
	                   
	                  <th width="10%">Qte en sortie</th>

	                  <th width="25%">Mise à jour</th>

	                  
	                  <th width="5%">Modifier</th> 
	                  <th width="5%">Supprimer</th>      
	              </tr> 
	         </tfoot>   
	            
	        </table>';
		  echo $output;
		}



        function fetch_entree(){  

           $fetch_data = $this->crud_model->make_datatables_entree();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).' $';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                $sub_array[] = nl2br(substr($row->QteEntree, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
                
                $sub_array[] = '<button type="button" name="update" ide="'.$row->ide.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" ide="'.$row->ide.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_entree(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_entree(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
        }

      function fetch_single_entree()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_entree($_POST["ide"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                $output['QteEntree'] 			= $row->QteEntree;
                

           }  
           echo json_encode($output);  
      }  


      function operation_entree(){

      	    $insert_data = array(  
	           'product_id'      =>    $this->input->post('product_id'),  
	           'QteEntree'      =>     $this->input->post('QteEntree') 
		  	);

		  	$updated_data = array(  
	           'Qte'      =>    $this->input->post('qte_disponsible')
		  	);  
	       
	      	$requete=$this->crud_model->insert_entree($insert_data);
	      	if ($requete > 0) {
	      		$this->crud_model->update_product($this->input->post("product_id"), $updated_data);
	      	}

	      	echo("Ajout information avec succès");
	      
      }

      function modification_entree(){
  
        $updated_data = array(  
           'product_id'     =>    $this->input->post('product_id'),  
           'QteEntree'      =>     $this->input->post('QteEntree') 
	  	);

        $this->crud_model->update_entree($this->input->post("ide"), $updated_data);

        echo("modification avec succès");
      }

      function supression_entree(){
 
          $this->crud_model->delete_entree($this->input->post("ide"));

          echo("suppression avec succès");
        
      }
	  // fin de script entree product

	  // script de sortie produit en stock
       function fetch_sortie(){  

           $fetch_data = $this->crud_model->make_datatables_sortie();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/product/'.$row->product_image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" />';  
                $sub_array[] = nl2br(substr($row->product_name, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->product_price, 0,10)).' $';  
                $sub_array[] = nl2br(substr($row->Qte, 0,10)).'...'; 

                $sub_array[] = nl2br(substr($row->QteEntree, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
                
                $sub_array[] = '<button type="button" name="update" ids="'.$row->ids.'" class="btn btn-warning btn-circle btn-sm update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" ids="'.$row->ids.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_sortie(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_sortie(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
       }

      function fetch_single_sortie()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_sortie($_POST["ids"]);  
           foreach($data as $row)  
           {  
                $output['product_name'] 		= $row->product_name;  
                $output['product_price'] 		= $row->product_price; 
                $output['product_id'] 			= $row->product_id;

                $output['Qte'] 					= $row->Qte;
                $output['QteEntree'] 			= $row->QteEntree;
                

           }  
           echo json_encode($output);  
      }  


      function operation_sortie(){

      	    $insert_data = array(  
	           'product_id'      =>    $this->input->post('product_id'),  
	           'QteEntree'      =>     $this->input->post('QteEntree') 
		  	);

		  	$updated_data = array(  
	           'Qte'      =>    $this->input->post('qte_disponsible')
		  	);  
	       
	      	$requete=$this->crud_model->insert_sortie($insert_data);
	      	if ($requete > 0) {
	      		$this->crud_model->update_product($this->input->post("product_id"), $updated_data);
	      	}

	      	echo("Ajout information avec succès");
	      
      }

      function modification_sortie(){
  
        $updated_data = array(  
           'product_id'     =>    $this->input->post('product_id'),  
           'QteEntree'      =>     $this->input->post('QteEntree') 
	  	);

        $this->crud_model->update_sortie($this->input->post("ids"), $updated_data);

        echo("modification avec succès");
      }

      function supression_sortie(){
 
          $this->crud_model->delete_sortie($this->input->post("ids"));
          echo("suppression avec succès");
        
      }
	  // fin de script sortie product









      function upload_image_users()  
      {  
           if(isset($_FILES["user_image"]))  
           {  
                $extension = explode('.', $_FILES['user_image']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/photo/' . $new_name;  
                move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }

      function upload_image_tbl_info()  
  	  {  
  	       if(isset($_FILES["user_image"]))  
  	       {  
  	            $extension = explode('.', $_FILES['user_image']['name']);  
  	            $new_name = rand() . '.' . $extension[1];  
  	            $destination = './upload/tbl_info/' . $new_name;  
  	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
  	            return $new_name;  
  	       }  
  	  }

  	// script pour formulaire de contact 
    // ajout des contacts
    function fetch_contact(){  

       $fetch_data = $this->crud_model->make_datatables_contact();  
       $data = array();  
       foreach($fetch_data as $row)  
       {  

          if ($row->fichier != '') {
            $etat = '<a href="'.base_url().'upload/contact/'.$row->fichier.'" class="badge badge-white"><i class="fa fa-file"></i></a>';
          }
          else{
            $etat = '';
          }

            $sub_array = array();

            $sub_array[] = '
            <input type="checkbox" class="delete_checkbox" value="'.$row->email.'" />
            ';  
              
            $sub_array[] = nl2br(substr($row->nom, 0,20)).'...';  
            $sub_array[] = nl2br(substr($row->sujet, 0,20)).'...'; 
            $sub_array[] = $row->email; 
            $sub_array[] = nl2br(substr($row->message, 0,50)).'...';
            $sub_array[] = substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23);

            $sub_array[] = $etat; 

            $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-dark btn-circle btn-sm update"><i class="fa fa-comment-o"></i></button>'; 

            $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button>';  
            $data[] = $sub_array;  
       }  
       $output = array(  
            "draw"                =>     intval($_POST["draw"]),  
            "recordsTotal"        =>     $this->crud_model->get_all_data_contact(),  
            "recordsFiltered"     =>     $this->crud_model->get_filtered_data_contact(),  
            "data"                =>     $data  
       );  
       echo json_encode($output);  
  }

  function fetch_single_contact()  
  {  
       $output = array();  
       $data = $this->crud_model->fetch_single_contact($this->input->post('idcontact'));  
       foreach($data as $row)  
       {  
            $output['nom'] = $row->nom;  
            $output['message'] = $row->message;
            $output['email'] = $row->email;
            $output['sujet'] = $row->sujet; 

       }  
       echo json_encode($output);  
  } 

  function operation_contact(){

    $insert_data = array(  
         'nom'          =>     $this->input->post('name'),  
         'sujet'       =>     $this->input->post("subject"),
         'email'         =>     $this->input->post("email"),  
         'message'       =>     $this->input->post("message")  
         
  );  
     
    $requete=$this->crud_model->insert_contact($insert_data);
    echo("Ajout message  avec succès");
    
  }

  
  function supression_contact()
  {

      $this->crud_model->delete_contact($this->input->post("idcontact"));

      echo("suppression avec succès");
    
  }

    function supression_transaction()
	{

	      $this->crud_model->delete_transaction($this->input->post("code"));

	      echo("suppression avec succès");
	    
	}

    function multiple_supression_transaction()
    {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
                $code    = $id[$count];
                $query = $this->crud_model->delete_transaction($code);
           }

           if(!$query){
                echo("Suppression avec succès");
           } 
           else {
                echo("échec lors de la suppression !!!!!!!!!!!!");
           }


        }
    }

    function suppression_tag_transaction()
    {
    	$code = $this->input->post('code');
    	$idpersonne = $this->crud_model->fetch_clicent_Panier_tag($code);
    	$query = $this->crud_model->delete_transaction_paiement($code);
    	if(!$query){

            echo("Suppression avec succès");
            $url    ="user/achat";
            $nom    = $this->crud_model->get_name_user($idpersonne);

            $delete = $this->crud_model->ondelete_notifacation($idpersonne, $url);
            if (!$delete) {

            	$message ="Bonjour ".$nom." votre paiement a été invalidé pour une raison valable. pour plus d'information contacter l'administration pour une explication valable";
	            $notification = array(
	              'titre'     =>    "Désolé  ".$nom,
	              'icone'     =>    "fa fa-check",
	              'message'   =>     $message,
	              'url'       =>     $url,
	              'id_user'   =>     $idpersonne
	            );
	            
	            $not = $this->crud_model->insert_notification($notification);
			    $dataUpdate = array(
	            	'etat_vente'	=> 0
	            );
	            $this->crud_model->updated_padding_vente($code, $dataUpdate);

            }

            echo("suppression avec succès!!!");

        } 
        else{
            echo("échec lors de la suppression !!!");
        }

    }

    function infomation_par_mail()
    {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $website = $this->email_sites;

                $to =$id[$count];
                $subject = $this->input->post('sujet');
                $message2 = $this->input->post('message');
                 

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@etskase.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

           }

           if(mail($to,$subject,$message2,$headers) > 0){
                echo("message envoyé avec succès");
           } 
           else {
                echo("échec lors de l'envoie de message!!!!!!!!!!!!");
           }


        }
    }
     // fin contact

    /*
    les scripts pour confirmation de paiement
    ========================================
    =======================================
    =======================================
    */


    // script pour les paiements

		function pagination_view_paiements_padding()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_paiement_padding();
		  $config["per_page"] = 5;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li class="page-item">';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li class="page-item">';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
		  $config["next_tag_open"] = '<li class="page-item">';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
		  $config["prev_tag_open"] = "<li class='page-item'>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li class='page-item'>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_paiement_padding($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		function fetch_search_view_paiements_padding()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_paiement_padding($query);
		   $output .= '
		      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
		          <thead>  
		            <tr>
		               <th width="5%">
		                 <div class="form-inline">
		                   <button type="button" name="delete" class="btn btn-danger btn-circle btn-sm coucou_delete"><i class="fa fa-trash"></i> del</button>
		                 </div>
		               </th>         
		               <th width="10%">Image</th>
		               <th width="15%">Nom du client</th>  
		               <th width="5%">Code de transaction</th>
		               <th width="10%">Montant</th>
		               <th width="15%">Mobile</th>
		               <th width="10%">Mis à jour</th>
		               <th width="5%">valider</th> 
		               <th width="5%">Supprimer</th>  
		            </tr> 
		         </thead> 
		         <tbody id="example-tbody">
		      ';
		      if ($data->num_rows() < 0) {
		        
		      }
		      else{
		        $mobile = '';

		        foreach($data->result() as $row)
		        {

		          if ($row->motif =="m-pesa") {
		            $mobile = '
		            <img src="'.base_url().'upload/module/m-pesa.com.png" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
		            ';
		          }
		          elseif ($row->motif =="airtel money") {
		            $mobile = '
		            <img src="'.base_url().'upload/module/airtel.jpg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
		            ';
		          }
		          else{
		             $mobile = '';
		          }


		         $output .= '
		         <tr>
		          <td>
		            <input type="checkbox" class="delete_checkbox mr-1" value="'.$row->code.'" />
		            <button type="button" name="update" code="'.$row->code.'" class="btn btn-dark btn-circle btn-sm voir" user_id="'.$row->user_id.'" first_name="'.$row->first_name.'"><i class="fa fa-eye"></i></button>
		          </td>
		          <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

		          <td>'.nl2br(substr($row->first_name.'-'.$row->last_name, 0,15)).'<br>
		            <a href="tel:'.nl2br(substr($row->telephone, 0,10)).'">'.nl2br(substr($row->telephone, 0,10)).'</a> '.'</td>
		          <td>'.nl2br(substr($row->code, 0,20)).'</td>
		          <td>'.nl2br(substr($row->montant, 0,20)).'$'.'</td>
		          <td>'.$mobile.'</td>
		          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
		          
		          <td><button type="button" name="valider_liste" code="'.$row->code.'" class="btn btn-success btn-circle btn-sm valider_liste"><i class="fa fa-check"></i></button></td>
		          <td><button type="button" name="delete" code="'.$row->code.'" class="btn btn-danger btn-circle btn-sm delete"><i class="fa fa-trash"></i></button></td>
		          

		         </tr>
		         ';
		        }
		      }
		      $output .= '
		          </tbody>
		          <tfoot>  
		            <tr>         
		              <th width="5%"> <button type="button" name="delete" class="btn btn-danger btn-circle btn-sm coucou_delete"><i class="fa fa-trash"></i> del</button></th>         
		               <th width="10%">Image</th>
		               <th width="15%">Nom du client</th>  
		               <th width="5%">Code de transaction</th>
		               <th width="10%">Montant</th>
		               <th width="15%">Mobile</th>
		               <th width="10%">Mis à jour</th>
		               <th width="5%">valider</th> 
		               <th width="5%">Supprimer</th> 
		            </tr> 
		         </tfoot>   
		            
		        </table>';
		  echo $output;
		}



	// appell showVente
	function showVente()
	{
		$user_id = $this->input->post("user_id");
		$code = $this->input->post("code");
	    echo $this->affichage_view_cart_padding_vente($user_id, $code);
	}

	// affichage des ventes en attente
	function affichage_view_cart_padding_vente($user_id, $code)
	{

	  $output = '';
	  
	  $count = 0;
	  $net_apayer 	= $this->crud_model->padding_vente_calcul_net_apayer($user_id, $code);
	  $produit 		= $this->crud_model->padding_vente_detail_cart($user_id, $code);
	  if ($produit->num_rows() > 0) {

	  	  $output .= '
			  <div class="table-responsive mb-4">
			  
			   <br />
			   <table class="table panier_table" id="panier_table">
			   <thead class="bg-light">
				    <tr>
				     <th class="border-0" scope="col">
				     	<strong class="text-small text-uppercase">Image</strong>
				     </th>
				     <th class="border-0" scope="col">
				     	<strong class="text-small text-uppercase">Nom du produit</strong>
				     </th>
				     <th class="border-0" scope="col">
				     	<strong class="text-small text-uppercase">Quantité</strong>
				     </th>
				     <th class="border-0" scope="col">
				     	<strong class="text-small text-uppercase">Prix</strong>
				     </th>
				     <th class="border-0" scope="col">
				     	<strong class="text-small text-uppercase">Prix total</strong>
				     </th>
				     
				    
				    </tr>
			    </thead>
			    <tbody>

		  ';

	  	  foreach($produit->result_array() as $items)
		  {
			   $count++;
			   $output .= '
			   <tr> 
			   	<td class="align-middle border-0"><img src="'.base_url().'upload/product/'.$items["product_image"].'" class="img-thumbnail" width="40" height="30" /></td>
			    <td class="align-middle border-0">'.$items["product_name"].'</td>
			    <td class="align-middle border-0"> 

			    <!--<input type="number" min="1" name="" value="'.$items["quantity"].'" class="form-control" placeholder="La quantité"> -->
			     '.$items["quantity"].'
			     </td>
			    <td class="align-middle border-0">'.$items["product_price"].'$</td>
			    <td class="align-middle border-0">'.$items["product_priceTotal"].'$</td>
			    
			   </tr>
			   ';
		  }
		  $output .= '
			   <tr>
			    <td colspan="4" align="right" class="align-middle border-0">Total</td>
			    <td class="align-middle border-0">'.$net_apayer.'$</td>
			   </tr>
			   </tbody>
			  </table>

			  </div>

			  
		  ';

		  
	  }
	  else{

	  	$output .= '
	   		<div class="col-xl-3 col-lg-4 col-sm-6"></div>

	  		 <div class="col-xl-6 col-lg-4 col-sm-6">
	  		 <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: 100;" src="data:'.base_url().'upload/annumation/b.gif" srcset="'.base_url().'upload/annumation/b.gif" data-holder-rendered="true" style="border-radius: 100px;">
	  		 </div>
	  		
	  		 <div class="col-xl-3 col-lg-4 col-sm-6"></div>
	   ';

	  }
	  
  	 return $output;
	}
	// fin affichage des ventes en attente

	// valider trancation
    function valider_multiple_fausse_tranaction()
    {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
                $code    = $id[$count];
                $info_pro = $this->crud_model->get_info_padding_transaction($code);
                $month = $this->crud_model->get_info_mois();
                $year = $this->crud_model->get_info_annee();



                foreach ($info_pro as $key) {
                    $idpersonne   =  $key['idpersonne'];
                    $date_paie    =  $key['date_paie'];
                    $montant      =  $key['montant'];
                    $motif        =  $key['motif'];
                    $token        =  $key['token'];
                    $codes  	  =  $key['code'];
                    $first_name   =  $key['first_name'];
                    $last_name    =  $key['last_name'];
                    $email  	  =  $key['email'];
                    $telephone    =  $key['telephone'];
                    $adresse1  	  =  $key['adresse1'];
                    $adresse2     =  $key['adresse2'];

                    $insertdata = array(
                        'idpersonne'      => $idpersonne,
                        'date_paie'       => $date_paie,
                        'montant'         => $montant,
                        'motif'           => $motif ,
                        'token'           => $token,
                        'code'     		  => $codes,
                        'first_name'      => $first_name,
                        'last_name'       => $last_name,
                        'email'     	  => $email,
                        'telephone'       => $telephone,
                        'adresse1'     	  => $adresse1,
                        'adresse2'     	  => $adresse2,
                        'year'      	  => $year,
                        'month'      	  => $month
                    );

                    $query = $this->crud_model->insert_paiement_compte($insertdata);
                    if ($query > 0) {
                        # code...
                        $url    ="user/facturePaiement/". $codes;
                        $nom    = $this->crud_model->get_name_user($idpersonne);

                        // $nom = $this->input->post('titre');
                        $message ="Bonjour ".$nom." votre paiement a été validé avec succès 👌";

                        $notification = array(
                          'titre'     =>    "Félicitation d'avance!!!",
                          'icone'     =>    "fa fa-check",
                          'message'   =>     $message,
                          'url'       =>     $url,
                          'id_user'   =>     $idpersonne
                        );
                        
                        $not = $this->crud_model->insert_notification($notification);

                        $dataUpdate = array(
		                	'etat_vente'	=> 1
		                );
		                $this->crud_model->updated_padding_vente($code, $dataUpdate);

                    }

                }

           }

           echo("Validation paiement mise à jour avec succès!! 👌");

        }
    }
    // fin valider trancation


    /*
    paiement normal
    **********************************************
    ===============================================
    */
    function pagination_view_paiements_normal()
		{

		  $this->load->library("pagination");
		  $config = array();
		  $config["base_url"] = "#";
		  $config["total_rows"] = $this->crud_model->count_all_view_paiement_normaux();
		  $config["per_page"] = 5;
		  $config["uri_segment"] = 3;
		  $config["use_page_numbers"] = TRUE;
		  $config["full_tag_open"] = '<ul class="nav pagination">';
		  $config["full_tag_close"] = '</ul>';
		  $config["first_tag_open"] = '<li class="page-item">';
		  $config["first_tag_close"] = '</li>';
		  $config["last_tag_open"] = '<li class="page-item">';
		  $config["last_tag_close"] = '</li>';
		  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
		  $config["next_tag_open"] = '<li class="page-item">';
		  $config["next_tag_close"] = '</li>';
		  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
		  $config["prev_tag_open"] = "<li class='page-item'>";
		  $config["prev_tag_close"] = "</li>";
		  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		  $config["cur_tag_close"] = "</a></li>";
		  $config["num_tag_open"] = "<li class='page-item'>";
		  $config["num_tag_close"] = "</li>";
		  $config["num_links"] = 1;
		  $this->pagination->initialize($config);
		  $page = $this->uri->segment(3);
		  $start = ($page - 1) * $config["per_page"];

		  $output = array(
		   'pagination_link'  => $this->pagination->create_links(),
		   'country_table'   => $this->crud_model->fetch_details_view_paiement_normal($config["per_page"], $start)
		  );
		  echo json_encode($output);
		}


		function fetch_search_view_paiements_normal()
		{
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_paiement_normal($query);
		  $output .= '
		      <table class="table-striped  nk-tb-list nk-tb-ulist dataTable no-footer" data-auto-responsive="false" id="user_data" role="grid" aria-describedby="DataTables_Table_1_info">
		          <thead>  
		            <tr>
		               <th width="10%">
		                 operation
		               </th>         
		               <th width="10%">Image</th>
		               <th width="15%">Nom du client</th>  
		               <th width="5%">Code de transaction</th>
		               <th width="10%">Montant</th>
		               <th width="15%">Mobile</th>
		               <th width="10%">Mis à jour</th>
		               <th width="5%">imprimmer</th> 

		            </tr> 
		         </thead> 
		         <tbody id="example-tbody">
		      ';
		      if ($data->num_rows() < 0) {
		        
		      }
		      else{

		        $mobile = '';
		        $eteat_facture ='';

		        foreach($data->result() as $row)
		        {

		          if ($row->motif =="m-pesa") {
		            $mobile = '
		            <img src="'.base_url().'upload/module/m-pesa.com.png" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
		            ';
		          }
		          elseif ($row->motif =="airtel money") {
		            $mobile = '
		            <img src="'.base_url().'upload/module/airtel.jpg" class="img-thumbnail img-responsive" style="height: 25px; width: 50px;">
		            ';
		          }
		          else{
		             $mobile = '';
		          }

		          if ($row->etat_paiement ==0) {
		            $eteat_facture = '

		            <button type="button" name="delete" code="'.$row->code.'" class="btn btn-danger btn-circle btn-sm delete mr-1"><i class="fa fa-trash"></i></button> 

		            <button type="button" name="update" code="'.$row->code.'" class="btn btn-dark btn-circle btn-sm voir" user_id="'.$row->idpersonne.'" first_name="'.$row->first_name.'"><i class="fa fa-eye"></i></button> 

		            ';
		          }
		          elseif ($row->etat_paiement ==1) {
		            $eteat_facture = '

		            <button type="button" name="update" code="'.$row->code.'" class="btn btn-success btn-circle btn-sm voir" user_id="'.$row->idpersonne.'" first_name="'.$row->first_name.'"><i class="fa fa-check"></i></button>

		            <button type="button" name="update" code="'.$row->code.'" class="btn btn-dark btn-circle btn-sm voir" user_id="'.$row->idpersonne.'" first_name="'.$row->first_name.'"><i class="fa fa-eye"></i></button>
		            ';
		          }
		          else{
		             $eteat_facture = '';
		          }



		         $output .= '
		         <tr>
		          <td>
		            '.$eteat_facture.'
		          </td>
		          <td><img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-thumbnail" width="50" height="35" style="border-radius:50%;" /></td>

		          <td>'.nl2br(substr($row->first_name.'-'.$row->last_name, 0,15)).'<br>
		            <a href="tel:'.nl2br(substr($row->telephone, 0,10)).'">'.nl2br(substr($row->telephone, 0,10)).'</a> '.'</td>
		          <td>'.nl2br(substr($row->code, 0,20)).'</td>
		          <td>'.nl2br(substr($row->montant, 0,20)).'$'.'</td>
		          <td>'.$mobile.'</td>
		          <td>'.nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)).'</td>
		          
		         
		          <td><a href="'.base_url().'admin/facturePaiement/'.$row->code.'" class="btn btn-dark btn-circle btn-sm"><i class="fa fa-print"></i></a></td>
		          

		         </tr>
		         ';
		        }
		      }
		      $output .= '
		          </tbody>
		          <tfoot>  
		            <tr>         
		              <th width="5%">
		                 operation
		               </th>         
		               <th width="10%">Image</th>
		               <th width="15%">Nom du client</th>  
		               <th width="5%">Code de transaction</th>
		               <th width="10%">Montant</th>
		               <th width="15%">Mobile</th>
		               <th width="10%">Mis à jour</th>
		               <th width="5%">imprimmer</th>
		            </tr> 
		         </tfoot>   
		            
		        </table>';
		  echo $output;
		}























}



 ?>