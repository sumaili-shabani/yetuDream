 <?php




    
    /*
    LISTE DES FAVORY
    ===========================================
    ===========================================
    */
    // favory
    $nombre_de_favory;
    $this->db->order_by('created_at', 'desc');
    $Favories= $this->db->get("profile_favory2");
    if ($Favories->num_rows() > 0) {
        $nombre_de_favory = $Favories->num_rows();
    }
    else{
    $nombre_de_favory=0;
    } 





    // $nombre_de_message;
    // $messagerie = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$connected."'  ORDER BY messagerie.created_at DESC LIMIT  20");
    // if ($messagerie->num_rows() > 0) {
    //   $nombre_de_message= $messagerie->num_rows();
    // }
    // else{
    //   $nombre_de_message= 0;
    // }





 ?>

<header class="header bg-dark">
    <div class="container px-0 px-lg-3">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      	<a class="navbar-brand" href="<?php echo(base_url()) ?>"><span class="font-weight-bold text-uppercase text-dark">
	      	<font class="text-info">B</font><font class="text-warning">ou</font><font class="text-success">ti</font><font class="text-info">que</font> <font class="text-danger"><?php echo($nom_site_info) ?></font></span>
	    </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="<?php echo(base_url()) ?>home"><i class="fas fa-home mr-1"></i>Accueil</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="<?php echo(base_url()) ?>home/shop"><i class="fas fa-shopping-cart mr-1"></i>Shop</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="<?php echo(base_url()) ?>home/recent_lot"><i class="fas fa-tag mr-1"></i>Recent lot</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link" href="<?php echo(base_url()) ?>home/contact"><i class="fas fa-envelope mr-1"></i>Contact</a>
            </li>
            <!-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
            </li> -->
          </ul>
          <ul class="navbar-nav ml-auto"> 
          	<!-- panier -->
            <li class="nav-item"><a class="nav-link" href="<?php echo(base_url()) ?>home/panier"> <i class="fas fa-dolly-flatbed mr-1"></i><sup><small class="text-gray">(<?php echo($nombreProduitsPanier) ?>)</small></sup></a></li>
            <!-- fin paier -->

            <!-- favory -->
            <li class="nav-item dropdown">
		        <a class="nav-link" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  <i class="fas fa-heart mr-1"></i>
		          <sup><small class="text-gray"> (<?php echo($nombre_de_favory) ?>)</small> </sup>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

		           <?php

		             $this->db->order_by('created_at', 'desc');
		             $this->db->limit(6);
		             $Favores= $this->db->get("profile_favory2");
		             if ($Favores->num_rows() > 0) {
		              

		              foreach ($Favores->result_array() as $not) {
		               
		                ?>

		                 <a class="dropdown-item media bg-flat-warnging" href="<?php echo(base_url()) ?>home/detailProduct/<?php echo($not['product_id']) ?>">
		                 	<img src="<?php echo(base_url()) ?>upload/product/<?php echo($not["product_image"]) ?>" class="img img-thumbnail img-circle mr-1" style="width: 40px;height: 40px; border-radius: 50%;" alt="...">
		                     
		                      <p class="mr-1" style="margin-top: 6px;"><?php echo(substr($not["product_name"], 0,120)) ?> ... <span class="text-primary"><?php echo($not["product_price"]) ?>$</span> </p> 


		                  </a>
		               
		                <?php
		              }

		             }
		             else{
		              $nombre_de_favory=0;
		             } 

		           ?>

		            <div class="dropdown-divider"></div>
		          
		            <a class="dropdown-item text-center" onclick="return confirm('Etes-vous sûre de vouloir le supprimer?')" href="<?php echo(base_url()) ?>home/clear_my_favoryte_list"><i class="fas fa-trash mr-1"></i> Vider  <code class="text-warning" style="font-size: 20px;"><?php echo($nombre_de_favory) ?></code> produit(s)  dans la liste favorite </a>


		          

		        </div>
		    </li>
		    <!-- fin favory -->

            

		    <li class="nav-item">
             	<a class="nav-link" href="<?php echo(base_url()) ?>login"><i class="fa fa-sign-in fa-lg mr-1"></i>Connectez-vous!</a>
            </li>

            
          </ul>
        </div>
      </nav>
    </div>
  </header>
