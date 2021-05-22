 <?php

 $first_name;
 $last_name;
 $email;
 $image;
 $telephone;
 $full_adresse;
 $biographie;
 $date_nais;
 $passwords;
 $idrole;

 $facebook;
 $linkedin;
 $twitter ;

 $university;
 $faculte;
 $option ;
 $sexe;
 $photo;

 $id_user;

 foreach ($users as $row) {
  $id_user    = $row["id"];
  $first_name   = $row["first_name"];
  $last_name    = $row["last_name"];
  $email      = $row["email"];
  $image      = $row["image"];
  $telephone    = $row["telephone"];
  $full_adresse = $row["full_adresse"];
  $biographie   = $row["biographie"];
  $date_nais    = $row["date_nais"];
  $passwords    = $row["passwords"];
  $idrole       = $row["idrole"];
  $sexe       = $row["sexe"];

  $facebook     = $row["facebook"];
  $linkedin     = $row["linkedin"];
  $twitter      = $row["twitter"];
  
 }

 ?>
<!DOCTYPE html>
<html lang="fr">

<head>

   <?php include('_meta.php') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <?php include('_navigation.php') ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('_menuheader.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   <!-- mes scripts -->

                   <div class="col-md-12 card">
                   	<div class="row card-body">
                   		
                   		<div class="col-md-12">

                   			
	                    	<?php include("component/objet_basic_achat.php") ?>

                   		</div>
                   	</div>
                   </div>
                   
        			<!-- fin -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('_footer.php') ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

   
   <?php include('_script.php') ?>

    <div id="userModal" class="modal fade">
      <div class="modal-dialog modal-lg">
        <form method="post" id="user_form" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header bg-dark text-white">
              <div align="center" class="modal-title text-center"></div>
              <button type="button" class="close text-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                    

                <div class="form-group col-md-12" id="country_table2">
                     
                </div>

                    
              
            </div>
            
          </div>
        </form>
      </div>
    </div>

     
   <script type="text/javascript">
   	$(document).ready(function() {

   		 function load_country_data(page)
          {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/pagination_view_paiements_normal/"+page,
             method:"GET",
             dataType:"json",
              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
             success:function(data)
             {
              $('#country_table').html(data.country_table);
              $('#pagination_link').html(data.pagination_link);
             }
            });
          }

         $(document).on("click", ".pagination li a", function(event){
            event.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_country_data(page);
         });

         views();

         function load_data(query)
         {
            $.ajax({
             url:"<?php echo base_url(); ?>admin/fetch_search_view_paiements_normal",
             method:"POST",
             data:{query:query},
              beforeSend:function()
              {
                $('#country_table').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
              },
             success:function(data){
              $('#country_table').html(data);
             }
            })
         }

         $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
           load_data(search);
          }
          else
          {
            load_country_data(1);
          }
         });

         function views(){
         	 var recherche = $('#search_text').val();
	         if (recherche !='') {
	         	load_data(recherche);
	         }
	         else{
	         	load_country_data(1);
	         }
         }

         



        $(document).on('click', '.voir', function(){  

             var code = $(this).attr("code");
             var user_id = $(this).attr("user_id");
             var first_name = $(this).attr("first_name");  
             if (user_id !='' && code !='' && first_name !='') {
                  $('#userModal').modal('show');
                  $.ajax({  
                      url:"<?php echo base_url(); ?>admin/showVente",  
                      method:"POST",  
                      data:{
                        user_id:user_id,
                        code:code
                      },
                      beforeSend:function()
                      {
                          $('#country_table2').html('<div class="col-md-12 post_data"><p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p><p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p></div>');
                      },    
                      success:function(data)  
                      {   
                           $('#country_table2').html(data); 
                           $('.modal-title').text("les achats  de "+first_name);  
                          
                      }  
                  });
             }
             else{
               swal("erreur!!!", "une erreur est subvenue lors de l'opération","info");

             }

        });

       

	    $(document).on('click', '.delete', function(event) {
	    	  event.preventDefault();
	    	  /* Act on the event */
	    	  var code = $(this).attr("code");
	          if(confirm("Etes-vous sûr de vouloire le supprimer?"))
	          {
	            
	            $.ajax({
	              url:"<?php echo base_url(); ?>admin/suppression_tag_transaction",
	              method:"POST",
	              data:{code:code},
	              success:function(data)
	              {
	                var message = data;
	                swal("succès!!!",message,"success");
	                load_country_data(1);
	              }

	            });
	          }
	          else
	          {
	             var message ="opération annulée";
	             swal("Oups!!!",message,"info");

	          } 

	      });

		$(document).on('click', '.valider_liste', function(event) {
	          event.preventDefault();
	          var checkbox = $('.delete_checkbox:checked');

	          if(confirm("Etes-vous sûre de vouloir le valider?"))
	          {
	            
	              if(checkbox.length > 0)
	              {
	               var checkbox_value = [];
	               $(checkbox).each(function(){
	                checkbox_value.push($(this).val());

	               });

	               // alert("email:"+checkbox_value);
	               $.ajax({
	                    url:"<?php echo base_url(); ?>admin/valider_multiple_fausse_tranaction",
	                    method:"POST",
	                    data:{
	                        checkbox_value:checkbox_value
	                    },
	                    success:function(data)
	                    {
	                        
	                        var message = data;
	                        swal('Succès!!!', message,"success");
	                        load_country_data(1);
	                        
	                        $('.bg-red').fadeOut(1500);

	                        
	                    }
	               });
	              }
	              else
	              {
	                swal("Erreur!!!","veillez selectionner au moins une fausse transaction","error");
	               
	              }

	          }
	          else
	          {

	            swal("Oups!!!","opération annulée","info");

	          }
		             
	    });

	   

        $('.delete_checkbox').click(function(){
          if($(this).is(':checked'))
          {
           $(this).closest('tr').addClass('bg-danger text-white');
          }
          else
          {
           $(this).closest('tr').removeClass('bg-danger text-white');
          }
        });

        $('#example-tbody').on( 'click', 'tr', function (){
            $(this).toggleClass('bg-danger text-white');
        });

   	});
   </script>

</body>

</html>