<!-- Stock List Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('stock') ?></h1>
	        <small><?php echo display('out_of_date') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('stock') ?></a></li>
	            <li class="active"><?php echo display('out_of_date') ?></li>
	        </ol>
	    </div>
	</section>

	<section class="content">

		


		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                    <h4><?php echo display('out_of_date') ?></h4>
		                </div>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive" style="margin-top: 10px;">
		                     <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="checkList">
		                        <thead>
									<tr>
										<th class="text-center"><?php echo display('sl') ?></th>
										<th class="text-center"><?php echo display('product_name') ?></th>
										<th class="text-center"><?php echo display('batch_id') ?></th>
										<th class="text-center"><?php echo display('expeire_date') ?></th>
										<th class="text-center"><?php echo display('stock') ?></th>
										
									</tr>
								</thead>
								<tbody>
								
								</tbody>
		                    </table>
		                </div>
			            
		                <div class="text-center">
		                	
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Stock List End -->
<script type="text/javascript">
$(document).ready(function() { 

    $('#checkList').DataTable({ 
             responsive: true,

             "aaSorting": [[ 2, "asc" ]],
             "columnDefs": [
                { "bSortable": false, "aTargets": [0,1,3] },

            ],
		   'processing': true,
           'serverSide': true,

		  
           'lengthMenu':[[10, 25, 50,100,250,500,"<?php echo $totalnumber;?>"], [10, 25, 50,100,250,500,"All"]],

             dom:"'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip", buttons:[ {
	            extend: "copy", className: "btn-sm prints"
	        }
	        , {
	            extend: "csv", title: "Out Of Date", className: "btn-sm prints"
	        }
	        , {
	            extend: "excel", title: "Out Of Date", className: "btn-sm prints"
	        }
	        , {
	            extend: "pdf", title: "Out Of Date", className: "btn-sm prints"
	        }
	        , {
	            extend: "print", className: "btn-sm prints"
	        }
	        ],
	        
            'serverMethod': 'post',
            'ajax': {
               'url':'<?=base_url()?>Creport/CheckExpireList'
            },
          'columns': [
             { data: 'sl' },
             { data: 'product_id' },
             { data: 'batch_id' },
             { data: 'expeire_date'},
             { data: 'stock'},
            
            
          ],




    });




});




</script>
