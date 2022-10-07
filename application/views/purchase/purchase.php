<style type="text/css">
    .prints{
        background-color: #31B404;
        color:#fff;
    }
</style>
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('manage_purchase') ?></h1>
	        <small><?php echo display('manage_your_purchase') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('purchase') ?></a></li>
	            <li class="active"><?php echo display('manage_purchase') ?></li>
	        </ol>
	    </div>
	</section>

	<section class="content">

		<!-- Alert Message -->
	    <?php
	        $message = $this->session->userdata('message');
	        if (isset($message)) {
	    ?>
	    <div class="alert alert-info alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <?php echo $message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('message');
	        }
	        $error_message = $this->session->userdata('error_message');
	        if (isset($error_message)) {
	    ?>
	    <div class="alert alert-danger alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <?php echo $error_message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('error_message');
	        }
	    ?>
	            
			
		        <div class="panel panel-default">
		            <div class="panel-body"> 
		            	<div class="row">
		            	<div class="col-sm-7">
		             	<form action="" class="form-inline" method="post" accept-charset="utf-8">

		                    <div class="form-group">
		                        <label class="" for="from_date"><?php echo display('from') ?></label>
		                        <input type="text" name="from_date" class="form-control datepicker" id="from_date" value="" placeholder="<?php echo display('start_date') ?>" >
		                    </div> 

		                    <div class="form-group">
		                        <label class="" for="to_date"><?php echo display('to') ?></label>
		                        <input type="text" name="to_date" class="form-control datepicker" id="to_date" placeholder="<?php echo display('end_date') ?>" value="">
		                    </div>  

		                    <button type="button" id="btn-filter" class="btn btn-success"><?php echo display('find') ?></button>
		                  
		              </form>	
		            </div>
		           
		        </div>
		    </div>
		    
		   
		    </div>

	
	<!-- 		
        <div class="row">
            <div class="col-sm-12">
                <div class="column">
                 <?php if($this->permission1->method('add_purchase','create')->access()){ ?>
                  <a href="<?php echo base_url('Cpurchase')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_purchase')?> </a>
                   <?php }?>
                </div>
            </div>
        </div> -->


		<!-- Manage Purchase report -->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                  
		                </div>
		              
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="PurList"> 
								<thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<th><?php echo display('invoice_no') ?></th>
										<th><?php echo display('purchase_id') ?></th>
										<th><?php echo display('manufacturer_name') ?></th>
										<th><?php echo display('purchase_date') ?></th>
										<th><?php echo display('total_ammount') ?></th>
										<th><?php echo display('action') ?></th>
									</tr>
								</thead>
								<tbody>
						
								</tbody>
								<tfoot>
                    <th colspan="5" style="text-align:right">Total:</th>
                
                  <th></th>  
                  <th></th> 
                                </tfoot>
		                    </table>
		                </div>
		               
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Manage Purchase End -->
<!-- Manage Product End -->
<script type="text/javascript">
$(document).ready(function() { 
 var mydatatable = $('#PurList').DataTable({ 
             responsive: true,

             "aaSorting": [[4, "desc" ]],
             "columnDefs": [
                { "bSortable": false, "aTargets": [0,1,2,3,5,6] },

            ],
           'processing': true,
           'serverSide': true,

          
           'lengthMenu':[[10, 25, 50,100,250,500, "<?php echo $total_purhcase;?>"], [10, 25, 50,100,250,500, "All"]],

             dom:"'<'col-sm-4'l><'col-sm-4 text-center'><'col-sm-4'>Bfrtip", buttons:[ {
                extend: "copy",exportOptions: {
                       columns: [ 0,1,2,3,4,5 ] //Your Colume value those you want
                           }, className: "btn-sm prints"
            }
            , {
                extend: "csv", title: "PurchaseLIst",exportOptions: {
                       columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                           }, className: "btn-sm prints"
            }
            , {
                extend: "excel",exportOptions: {
                       columns: [0,1,2,3,4,5 ] //Your Colume value those you want print
                           }, title: "PurchaseLIst", className: "btn-sm prints"
            }
            , {
                extend: "pdf",exportOptions: {
                       columns: [0,1,2,3,4,5] //Your Colume value those you want print
                           }, title: " PurchaseLIst", className: "btn-sm prints"
            }
            , {
                extend: "print",exportOptions: {
                       columns: [ 0,1,2,3,4,5] //Your Colume value those you want print
                           },title: "PurchaseLIst</center>", className: "btn-sm prints"
            }
            ],

            
            'serverMethod': 'post',
            'ajax': {
               'url':'<?=base_url()?>Cpurchase/CheckPurchaseList',
                 "data": function ( data) {
         data.fromdate = $('#from_date').val();
         data.todate = $('#to_date').val();

//data.status = $('#status').val();
}
            },
          'columns': [
             { data: 'sl' },
             { data: 'chalan_no'},
             { data: 'purchase_id'},
             { data: 'manufacturer_name'},
             { data: 'purchase_date' },
             { data: 'total_amount',class:"total_sale"},
             { data: 'button'},
          ],

  "footerCallback": function(row, data, start, end, display) {
  var api = this.api();
   api.columns('.total_sale', {
    page: 'current'
  }).every(function() {
    var sum = this
      .data()
      .reduce(function(a, b) {
        var x = parseFloat(a) || 0;
        var y = parseFloat(b) || 0;
        return x + y;
      }, 0);
    $(this.footer()).html(sum.toFixed(2, 2));
  });
}


    });


$('#btn-filter').click(function(){ 
mydatatable.ajax.reload();  
});

});


 

</script>