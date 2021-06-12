

<div class="col-md-12" style="margin-top: 10px;">

	<!-- form commence -->
	<div class="row card clearfix">



	    <div class="col-md-12 my-3 p-3 bg-white rounded box-shadow card-body">

	    	<div class="col-md-12">
	    		<div class="alert alert-warning col-md-12">
	    			<button class="close" data-dismiss="alert"><i class="fa fa-close text-danger"></i>
	    				
	    			</button>
	    			Hystorique sur mes achachats!
	    			<hr>
	    		</div>
	    	</div>

	    	<div class="col-md-12">
				<div class="text-center" align="center">
	        		<?php
                    if($this->session->flashdata('message'))
                    {
                        echo '
                        <div class="alert alert-success">
                        <button class="close" data-dismiss="alert">x</button>
                            '.$this->session->flashdata("message").'
                        </div>
                        ';
                    }
                    elseif ($this->session->flashdata('message2')) {
                      echo '
                        <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert">x</button>
                            '.$this->session->flashdata("message2").'
                        </div>
                        ';
                    }
                    else{

                    }
                    ?>
	        	</div>
	        </div>
		    
		    <?php

            foreach ($mes_ventes as $not) {
             
	              ?>

	              <div class="media text-muted pt-3">

	              
			        <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($not["image"]) ?>" class="img img-thumbnail img-circle mr-1" style="width: 40px;height: 40px; border-radius: 50%;" alt="...">

			        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			            <strong class="d-block text-gray-dark"><?php echo($not['product_name']) ?>...</strong><br>
			           <?php echo($not['product_price']) ?>  <?php echo(substr(date(DATE_RFC822, strtotime($not['created_at'])), 0, 23)); ?>
			        </p>
			        <div class="pull-right">
			           	<a href="javscript:void(0);" class="btn btn-outline-secondary btn-sm voir" code="<?php echo($not['code']) ?>" user_id="<?php echo($not['user_id']) ?>" first_name="<?php echo($not['first_name']) ?>" ><i class="fa fa-eye"></i> voir</a>

	                    <a onclick="return confirm('Etes-vous sûre de vouloire Supprimer ce cours dans la liste favorie?')" href="<?php echo(base_url()) ?>user/view_1/display_delete_vente2/<?php echo($not['code']) ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> supprimer</a> 
		           </div>
			    </div>
	             

	              <?php
            }

           

         ?>
	</div>

    
</div>
	<!-- fin forme -->
	
</div>
