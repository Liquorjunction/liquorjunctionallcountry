<?php $__env->startSection('title','User Report | Admin Panel'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style type="text/css">
   .padding .box form .bulk-action{
    display: flex !important;
    justify-content: space-between !important;
    padding: 15px 25px 50px !important;
   }
   .clear_button{
        margin-top: 30px;
   }
   .dker {
    padding-top: 0px !important;
    padding-bottom: 15px !important;
}
</style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css" /> 
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
    <div class="loader" id="loader"></div> 
    <div class="padding website-label">
        <div class="success_message" style="margin-bottom: 10px;"></div>
        <div id="success_file_popup" style="margin-bottom: 10px;"></div>
        <div class="box">
           
            <div class="box-header dker">
                <h3><?php echo e(__('backend.UserReport')); ?></h3>
                <small>
                    <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                    <span><?php echo e(__('backend.UserReport')); ?></span>
                </small>
            </div>

            <div class="box-tool">
                <ul class="nav">
                       
                            <li class="nav-item inline">
                                <?php echo e(Form::open(['route'=>'export_userreport','method'=>'post','style="background :none !important;"','id'=>'export'])); ?>

             
                        <input type="hidden" name="startdate" value="<?php echo e(isset($startdate) ? $startdate : ''); ?>" id="export_start_date">
                        <input type="hidden" name="enddate" value="<?php echo e(isset($enddate) ? $enddate : ''); ?>" id="export_end_date">
                        <div class="col-sm-12">
                            <a style="height:35px; min-width: unset;" class="btn btn-fw primary export-form" href="javascript:void(0)">
                             Export CSV
                            </a>
                        </div>
                <?php echo e(Form::close()); ?>

                            </li>

                            <!-- <li class="nav-item inline">
                                <?php echo e(Form::open(['route'=>'export_userpdf','method'=>'post','style="background :none !important;"','id'=>'exportpdf'])); ?>

             
                        <input type="hidden" name="startdate" value="<?php echo e(isset($startdate) ? $startdate : ''); ?>" id="export_pdf_start_date">
                        <input type="hidden" name="enddate" value="<?php echo e(isset($enddate) ? $enddate : ''); ?>" id="export_pdf_end_date">
                        <div class="col-sm-12">
                            <a style="height:35px; min-width: unset;" class="btn btn-fw primary export-pdfform" href="javascript:void(0)">
                             Export PDF
                            </a>
                        </div>
                <?php echo e(Form::close()); ?>

                            </li> -->
                       
                </ul>

            </div>

            <div class="card-body">
           <div class="form-group">
              <div class="col-md-3">
                <label>Start Date</label>
                <input type="text" class="form-control" name="startdate" id="startdate" placeholder="DD/MM/YYYY">
              </div>
              <div class="col-md-3">
                <label>End Date</label>
                <input type="text" class="form-control" name="enddate" id="enddate" placeholder="DD/MM/YYYY">
              </div>
               <div class="col-md-2 clear_button">
                    <label>&nbsp;</label>
                <a onclick="location.reload();">
                    <button type="button" class="btn btn-danger mr-2 mb-5">Clear</button>
                </a>
               </div>
            </div>
            
        </div>

                <?php echo e(Form::open(['route'=>'customerUpdateAll','method'=>'post','id'=>'updateAll'])); ?>

                <div class="bulk-action">
                    <div></div>
                        
                  </div> 

                <div class="table-responsive">
                    <table class="table table-bordered m-a-0" id="label">
                        <thead class="dker">
                        <tr>
                            
                            <th>Id</th>
                            <th><?php echo e(__('backend.name')); ?></th>
                            <th><?php echo e(__('backend.email')); ?></th>
                            <th><?php echo e(__('backend.phone')); ?></th>
                            <th><?php echo e(__('backend.join_date')); ?></th>
                            <!-- <th><?php echo e(__('backend.status')); ?></th> -->
                            <!-- <th><?php echo e(__('backend.user_type')); ?></th> -->
                        </tr>
                        </thead>
                        <tbody id="bannerTable">

                      

                        </tbody>
                    </table>

                </div>
                <footer class="dker p-a">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs">
                            <!-- .modal -->
                            <div id="m-all" class="modal fade" data-backdrop="true">
                                <div class="modal-dialog" id="animate">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo e(__('backend.confirmation')); ?></h5>
                                        </div>
                                        <div class="modal-body text-center p-lg">
                                            <p>
                                                <?php echo e(__('backend.confirmationDeleteMsg')); ?>

                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn dark-white p-x-md"
                                                    data-dismiss="modal"><?php echo e(__('backend.no')); ?></button>
                                            <button type="submit"
                                                    class="btn danger p-x-md"><?php echo e(__('backend.yes')); ?></button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div>
                            </div>
                            <!-- / .modal -->
                           
                                
                           
                        </div>

                      
                        <div class="col-sm-6 text-right text-center-xs">
                           
                        </div>
                    </div>
                </footer>
                <?php echo e(Form::close()); ?>

        </div>
    </div>
  
  <div class="modal fade" id="editCustomer" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content add-customer-data">
      </div>
    </div>
  </div>

  <div class="modal fade" id="showCustomer" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content show-customer-data">
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush("after-scripts"); ?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script>
        $(document).on('click', '.edit-customer', function(e) {
            $("#editCustomer").modal({backdrop: false});
            var customer_id = $(this).attr('data-id');
            $(document).find('#editCustomer').find(".add-customer-data").empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               url: "<?php echo e(route('customer.edit')); ?>",
               type: 'POST',
               data: 'customer_id='+customer_id,
               success: function (response) {
                    $(document).find('#editCustomer').find(".add-customer-data").append(response.html);
                    $(document).find('#editCustomer').modal('show');
               },
               error: function (response) {
                   alert(response.responseText);
               }
           });
        });

        

         $(document).on('click', '.status_active', function(e) {
            var customer_id = $(this).attr('data-id');
            // $(document).find('#editCustomer').find(".add-customer-data").empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               url: "<?php echo e(route('customer.status_active')); ?>",
               type: 'POST',
               data: 'customer_id='+customer_id,
               beforeSend: function(){
                                    // $(".loader").fadeIn();
                                    $('.loader').css("visibility", "visible");
                                },
               success: function (response) {
                $('.loader').css("visibility", "visible");
                    window.location.href = "<?php echo e(route('customer')); ?>";
               },
               error: function (response) {
                   alert(response.responseText);
               }
           });
        });

         $(document).on('click', '.status_inactive', function(e) {
            var customer_id = $(this).attr('data-id');
            // $(document).find('#editCustomer').find(".add-customer-data").empty();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
               url: "<?php echo e(route('customer.status_inactive')); ?>",
               type: 'POST',
               data: 'customer_id='+customer_id,
               beforeSend: function(){
                                    // $(".loader").fadeIn();
                                    $('.loader').css("visibility", "visible");
                                },
               success: function (response) {
                $('.loader').css("visibility", "visible");
                // return false;
                    window.location.href = "<?php echo e(route('customer')); ?>";
               },
               error: function (response) {
                   alert(response.responseText);
               }
           });
        });
 
    </script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        function isNumberKey(evt){ 
    //var e = evt || window.event;
    var keyCode = (evt.which) ? evt.which : evt.keyCode;
    if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    
    }
        $(function() {
           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           load_data();
           function load_data(startdate, enddate) 
           {
        
              var action_url = "<?php echo route('userreport.anyData'); ?> ";
            
              var dataTable = $('#label').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ordering: true,
                    columnDefs: [{
                       'bSortable': false,
                       'aTargets': []
                    }],
                   ajax: {
                       url : action_url,
                       type: 'POST',
                       data: function(d) {
                            return $.extend({}, d, {
                                "startdate": $("#startdate").val().toLowerCase(),
                                "enddate": $("#enddate").val().toLowerCase(),
                               
                            });
                        }
                   },
                   columns: [
                    {
                       data: 'id',
                       name: 'id',
                       visible : false
                       
                   },
                   {
                       data: 'customer_name',
                       name: 'customer_name',
                       
                   },
                   {
                      data: 'customer_email',
                      name: 'customer_email',
                   },
                   {
                      data: 'customer_phone',
                      name: 'customer_phone',
                   },
                   {
                      data: 'customer_join_date',
                      name: 'customer_join_date',
                   },
                  
                   ],
                   order: ['0', 'DESC']
               });

               $('#startdate, #enddate').change(function() {
                    // 

                    $("#export_start_date").val($("#startdate").val().toLowerCase());
                    $("#export_pdf_start_date").val($("#startdate").val().toLowerCase());
                    $("#export_pdf_end_date").val($("#enddate").val().toLowerCase());
                    $("#export_end_date").val($("#enddate").val().toLowerCase());
                    
                    dataTable.draw();
                });
           }
        
        });


        $( document ).ready(function() {
            if($('.no-sort').hasClass('sorting_disabled')){
                $('.no-sort').removeClass('sorting_asc')
            }
        });

        $(".export-form").click(function () {
            $('#export').submit();          
        });

        $(".export-pdfform").click(function () {
            $('#exportpdf').submit();          
        });


        $("#submit_show_msg").click(function () {
            var numberOfChecked = $('input:checkbox:checked').length;
            if(numberOfChecked == ''){
                alert("Please select row.");
                return false;
            } 
        });

        $("#startdate").datepicker({
                changeMonth: true,
                endDate: '+0d',
                changeYear: true,
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                orientation: "bottom",
                autoclose: true
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#enddate').datepicker('setStartDate', minDate);
            });

            $("#enddate").datepicker({
                changeMonth: true,
                endDate: '+0d',
                changeYear: true,
                format: 'dd-mm-yyyy',
                todayHighlight: true,
                orientation: "bottom",
                autoclose: true
            }).on('changeDate', function(selected) {
                var minDate = new Date(selected.date.valueOf());
                $('#startdate').datepicker('setEndDate', minDate);
            });

        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        


        $("#filter_btn").click(function () {
            $("#filter_div").slideToggle();
        });

        $("#find_q").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#doctorTypeTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('submit', '#updateAll', function(e) {
            e.preventDefault();
            var allVals = [];  
            var check = false;

            var select_row = "<?php echo e(__('backend.select_row')); ?>";
            var select_status = "<?php echo e(__('backend.select_status')); ?>";
            
            var type = $(document).find('#action').val();
            if(type == 'no')
            {
                $(document).find('#alert_confirm').modal('show'); 
                $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_status); 
              
            }
            else
            {
               $(".has-value:checked").each(function() { 
                var idvalue = $(this).attr('data-id');
                if (typeof idvalue === "undefined") {

                }
                else
                {
                    allVals.push(idvalue);
                }
                });  

                if(allVals.length <=0)  
                {  
                   $(document).find('#alert_confirm').modal('show'); 
                   $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_row); 
                }  
                else 
                {  
                   var msg = "";
                   if(type == 0)
                   {
                       msg = "Are you sure you want to deactive this customer?";
                   }
                   else if(type == 1)
                   {
                       msg = "Are you sure you want to active this customer?";
                   }
                   else
                   {
                       msg = "Are you sure you want to delete this customer?";
                   }

                   $(document).find('#default_confirm').modal('show');
                   $(document).find('#default_confirm').find('.dynamic_message').text(msg);
                    var join_selected_values = allVals.join(","); 
                   $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
                   $(document).find('#default_confirm').find('.checkbox_type').val(type);
                   
                }
            
           }  
        });
        $(document).on('click', '.delete-school', function(e) {
            e.preventDefault();
            var package_id = $(this).attr('data-id');
            var allVals = [];
            allVals.push(package_id);
            var type = 2;
            var msg = "Are you sure you want to delete?";

            $(document).find('#default_confirm').modal('show');
            $(document).find('#default_confirm').find('.dynamic_message').text(msg);
            var join_selected_values = allVals.join(","); 
            $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
            $(document).find('#default_confirm').find('.checkbox_type').val(type);
        });

        $(document).on('click','.yes_click',function(e)
        {
           var  join_selected_values = $(document).find('#default_confirm').find('.checkbox_data').val();
           var  type = $(document).find('#default_confirm').find('.checkbox_type').val();
           var csrf = "<?php echo e(csrf_token()); ?>";
            ajaxUpdateAll(csrf,join_selected_values,type,action);
        });
       
        function ajaxUpdateAll(csrf,join_selected_values,type)
        {
            $.ajax({
               url: "<?php echo e(route('customerUpdateAll')); ?>",
               type: 'POST',
               headers: {'X-CSRF-TOKEN':  csrf },                        
               data: 'ids='+join_selected_values+'&status='+type,
               success: function (data) {
               
                   if (data.success == true) {
                       $('#success_file_popup').append( messages('alert-success', data.msg));
                       setTimeout(function() {
                       $('#success_file_popup').empty();
                       }, 5000);
                       
                       
                        $(document).find('#default_confirm').modal('hide');
                        var tabe = $('#label').DataTable();
                        $(document).find('#action').prop('selectedIndex',0);
                        tabe.ajax.reload(null, false);
                        $("#checkAll").prop('checked', false);

                   } else {
                       $('#success_file_popup').append( messages('alert-danger', data.error));

                       setTimeout(function() {
                       $('#success_file_popup').empty();
                       }, 5000);
                   }
               },
               error: function (data) {
                   alert(data.responseText);
               }
            });
        }
        $("#action").change(function () {
            if (this.value == "delete") {
                /*var numberOfChecked = $('input:checkbox:checked').length;
                if(numberOfChecked == ''){
                    alert("Please select row.");
                    return false;
                } */
                $("#submit_all").css("display", "none");
                $("#submit_show_msg").css("display", "inline-block");
            } else {
                $("#submit_all").css("display", "inline-block");
                $("#submit_show_msg").css("display", "none");
            }
        });
         function messages(classname, msg)
        {
           return '<div class="alert '+classname+' m-b-0"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>'  + msg +'</div>';
        }
        setTimeout(function() {
        $('#topmsgall').hide();
         }, 5000);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/userreport/list.blade.php ENDPATH**/ ?>