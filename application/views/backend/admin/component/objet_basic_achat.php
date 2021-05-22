<div class="col-md-12">
	<div class="row mb-2">
      <div class="col-md-4"></div>
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <div class="form-group">
            <div class="input-group">
               <span class="input-group-addon mr-1" style="margin-top: 5px;"><i class="fa fa-search"></i> Recherche </span>
               <input type="text" name="search_text" id="search_text" placeholder="Rechercher une transaction..." class="form-control" value="<?php
                if(isset($token)){
                	echo($token);
               	}
               	else{

               	}
                ?>" />
            </div>
        </div>
      </div>
    </div>

    <div class="table-responsive" id="country_table" style="margin-top: 10px;">
		                            
    </div>

	<div class="col-md-12 mb-2">
	  <div class="row">
	    <div class="col-md-4"></div>
	    <div class="col-md-4">
	      <nav class="pagination" id="pagination_link">
	    
	      </nav>
	    </div>
	    <div class="col-md-4"></div>
	  </div>
	</div>


</div>

