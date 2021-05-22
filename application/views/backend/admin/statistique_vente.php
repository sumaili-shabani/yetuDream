<!DOCTYPE html>
<html lang="fr">

<head>

   <?php include('_meta.php') ?>
   <link rel="stylesheet" type="text/css" href="<?= base_url('js/chart/morris.css')?>">

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
                <div class="container-fluid mb-4">

                   <div class="col-md-12 card">
                       <div class="row card-body">
                           <!-- mes scripts commencent -->

                           <div class="col-md-12">
		                		<div class="row">

		                			<div class="container">
        							  <br />
        							  <h6 class="text-center">Statistique sur vente</h6>
        							  <br />
        							  <div class="panel panel-default">
        							            <div class="panel-heading">
        							                <div class="row">
        							                    <div class="col-md-9">
        							                        <h6 class="panel-title">Le mois avec le profit</h6>
        							                    </div>
        							                    <div class="col-md-3">
        							                        <select name="year" id="year" class="form-control">
        							                            <option value="">Selectionner l'année</option>
        							                        <?php
        							                        foreach($year_list->result_array() as $row)
        							                        {
        							                            echo '<option value="'.$row["year"].'">'.$row["year"].'</option>';
        							                        }
        							                        ?>

        							                        </select>
        							                    </div>
        							                </div>
        							            </div>
        							            <div class="panel-body">
        							                <div id="chart_area" style="width: 1000px; height: 620px;"></div>
        							            </div>
        							        </div>
        							 </div>
		                			
		                		</div>
		                	</div>

                           
                           <!-- fin de mes scripts commencent -->
                       </div>
                   </div>

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

   <!-- google chart to load.js -->
	<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
  <script src="<?= base_url('js/chart/loader.js')?>"></script>
	<script src="<?= base_url('js/chart/morris.min.js')?>"></script>
	<script src="<?= base_url('js/chart/raphael-min.js')?>"></script>
	<script src="<?= base_url('js/chart/load.js')?>"></script>
   <!-- fin de script de load -->


   <script type="text/javascript">

		google.charts.load('current', {packages:['corechart', 'bar']});
		google.charts.setOnLoadCallback();

		function load_monthwise_data(year, title)
		{
		    var temp_title = title + ' ' + year;
		    $.ajax({
		        url:"<?php echo base_url(); ?>admin/fetch_data",
		        method:"POST",
		        data:{year:year},
		        dataType:"JSON",
		        success:function(data)
		        {
		            drawMonthwiseChart(data, temp_title);
		        }
		    })
		}

		function drawMonthwiseChart(chart_data, chart_main_title)
		{
		    var jsonData = chart_data;
		    var data = new google.visualization.DataTable();
		    data.addColumn('string', 'Mois');
		    data.addColumn('number', 'Profit');

		    $.each(jsonData, function(i, jsonData){
		        var month = jsonData.month;
		        var profit = parseFloat($.trim(jsonData.profit));
		        data.addRows([[month, profit]]);
		    });

		    var options = {
		        title:chart_main_title,
		        hAxis: {
		            title: "Mois"
		        },
		        vAxis: {
		            title: 'Profit'
		        },
		        chartArea:{width:'80%',height:'85%'}
		    }

		    var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));

		    chart.draw(data, options);
		}

		$('#year').change(function(){
		    var year = $(this).val();
		    if(year != '')
		    {
		        load_monthwise_data(year, 'Le profit et vente par mois');
		    }
        else{
          var annee = new Date();
          var year = annee.getFullYear();
          load_monthwise_data(year, 'Le profit et vente par mois');

        }
		});

    function chargement(){
      var annee = new Date();
      var year = annee.getFullYear();
      load_monthwise_data(year, 'Le profit et vente par mois');
    }
    chargement();



		

</script>




</body>

</html>