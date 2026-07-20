<?php $__env->startSection('title', __('Banners')); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" type="text/css" />


<div class="padding website-label">
    <div class="success_message"></div>
    <div id="success_file_popup"></div>
    <div class="box">

        <div class="box-header dker">
            <h3><?php echo e(__('backend.banner_management')); ?></h3>
            <small>
                <a href="<?php echo e(route('adminHome')); ?>"><?php echo e(__('backend.dashboard')); ?></a> /
                <span><?php echo e(__('backend.banner_management')); ?></span>
            </small>
        </div>

        <div class="box-tool">
            <ul class="nav">
                <li class="nav-item inline">
                    <a class="btn btn-fw primary" href="<?php echo e(route('banner.create')); ?>">
                        <i class="material-icons">&#xe02e;</i>
                        &nbsp; New Banner
                    </a>
                </li>
            </ul>
        </div>

        <?php echo e(Form::open(['route'=>'userlistUpdateAll','method'=>'post','id'=>"updateAll"])); ?>

        <div class="bulk-action">
            <div></div>
            <div>
                <select name="action" id="action" class="form-control c-select w-sm inline v-middle" required>
                    <option value="no"><?php echo e(__('backend.bulkAction')); ?></option>
                    <option value="1"><?php echo e(__('backend.activeSelected')); ?></option>
                    <option value="0"><?php echo e(__('backend.blockSelected')); ?></option>
                    <option value="2"><?php echo e(__('backend.deleteSelected')); ?></option>
                </select>
                <button type="submit" id="submit_all" class="btn white"><?php echo e(__('backend.apply')); ?></button>
            </div>
        </div>
        <!--end::Dropdown Menu -->
        <?php echo e(Form::open(['method'=>'post'])); ?>

        <div class="table-responsive">
            <table class="table table-bordered m-a-0" id="label">
                <thead class="dker">
                    <tr>
                        <th class="width20 dker no-sort">
                            <label class="ui-check m-a-0">
                                <input id="checkAll" type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Sr No</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Banner Type</th>
                        <th>Status</th>
                        <th><?php echo e(__('backend.options')); ?></th>
                    </tr>
                </thead>
                <tbody id="bannerTable">
                </tbody>
            </table>

        </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush("after-scripts"); ?>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        load_data();

        function load_data() {

            var action_url = "<?php echo route('banner.data'); ?> ";

            $('#label').DataTable({
                // processing: true,
                // serverSide: true,
                responsive: true,
                "ordering": true,
                // columnDefs: [{
                //     'bSortable': false,
                //     'aTargets': [5, 6]
                // }],
                ajax: {
                    url: action_url,
                    type: 'POST',
                },
                columns: [{
                        data: 'checkbox'
                    },
                    {
                        data: 'id',
                        name: 'id',
                        visible: false
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'photo',
                        name: 'photo'
                    },
                    {
                        data: 'banner_type',
                        name: 'Banner TYpe'
                        
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        orderable: false,
                    }
                ],
                order: ['0', 'DESC']
            });
        }

    });

    $("#filter_btn").click(function() {
        $("#filter_div").slideToggle();
    });

    $("#find_q").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#doctorTypeTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $(document).ready(function() {
        setTimeout(function() {
            $('.validate').hide();
        }, 5000);
    });

    $(document).on('click', '.status_active', function(e) {
        var banner_id = $(this).attr('data-id');
        // $(document).find('#editCustomer').find(".add-customer-data").empty();
        swal({
                title: "Deactive",
                text: "Are you sure you want to deactive this banner?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#BF0A30",
                confirmButtonText: "Deactive",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "<?php echo e(route('banner.status_active')); ?>",
                    type: 'POST',
                    data: 'id=' + banner_id,
                    beforeSend: function() {
                        // $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        $('.loader').css("visibility", "visible");
                        window.location.href = "<?php echo e(route('banner')); ?>";
                    },
                    error: function(response) {
                        alert(response.responseText);
                    }
                });
            }
        );
    });

    $(document).on('click', '.status_inactive', function(e) {
        var banner_id = $(this).attr('data-id');
        // $(document).find('#editCustomer').find(".add-customer-data").empty();
        swal({
                title: "Active",
                text: "Are you sure you want to active this banner?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#002868",
                confirmButtonText: "Active",
                closeOnConfirm: false
            },
            function() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "<?php echo e(route('banner.status_inactive')); ?>",
                    type: 'POST',
                    data: 'id=' + banner_id,
                    beforeSend: function() {
                        // $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        $('.loader').css("visibility", "visible");
                        // return false;
                        window.location.href = "<?php echo e(route('banner')); ?>";
                    },
                    error: function(response) {
                        alert(response.responseText);
                    }
                });
            }
        );
    });
    // single delete
    $('#label').on('click', '#single_label[data-remote]', function(e) {
        e.preventDefault();
        var csrf = "<?php echo e(csrf_token()); ?>";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrf
            },
        });
        var allVals = [];
        var id = $(this).attr('data-id');
        allVals.push(id);
        var msg = "Are you sure you want to delete this banner?";
        var type = 2;
        $(document).find('#default_confirm').modal('show');
        $(document).find('#default_confirm').find('.dynamic_message').text(msg);
        var join_selected_values = allVals.join(",");
        $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
        $(document).find('#default_confirm').find('.checkbox_type').val(type);

        $(document).on('click', '.yes_click', function(e) {
            $(document).find('#default_confirm').modal('hide');

        });
    });
    
    $("#checkAll").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $(document).on('submit', '#updateAll', function(e) {

        e.preventDefault();
        var allVals = [];
        var check = false;

        var select_row = "<?php echo e(__('backend.select_row')); ?>";

        var select_status = "<?php echo e(__('backend.select_status')); ?>";

        var type = $(document).find('#action').val();

        if (type == 'no') {

            $(document).find('#alert_confirm').modal('show');
            $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_status);

        } else {

            $(".has-value:checked").each(function() {

                var idvalue = $(this).attr('data-id');
                if (typeof idvalue === "undefined") {

                } else {
                    allVals.push(idvalue);
                }
            });
            
            if (allVals.length <= 0) {

                $(document).find('#alert_confirm').modal('show');
                $(document).find('#alert_confirm').find('.alert_dynamic_message').text(select_row);
            } else {
                var msg = "";

                if (type == 0) {
                    msg = "Are you sure you want to inactive this banner?";

                } else if (type == 1) {
                    msg = "Are you sure you want to active this banner?";
                } else {
                    msg = "Are you sure you want to delete this banner?";
                }

                $(document).find('#default_confirm').modal('show');
                $(document).find('#default_confirm').find('.dynamic_message').text(msg);
                var join_selected_values = allVals.join(",");
                $(document).find('#default_confirm').find('.checkbox_data').val(join_selected_values);
                $(document).find('#default_confirm').find('.checkbox_type').val(type);

            }

        }
    });
    $(document).on('click', '.yes_click', function(e) {
        var join_selected_values = $(document).find('#default_confirm').find('.checkbox_data').val();
        var type = $(document).find('#default_confirm').find('.checkbox_type').val();
        var csrf = "<?php echo e(csrf_token()); ?>";
        ajaxUpdateAll(csrf, join_selected_values, type);
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

    function ajaxUpdateAll(csrf, join_selected_values, type) {
        // alert(join_selected_values);
        $.ajax({
            url: "<?php echo e(route('bannerUpdateAll')); ?>",
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: 'ids=' + join_selected_values + '&status=' + type,
            success: function(data) {

                if (data.success == true) {
                    $('#success_file_popup').append(messages('alert-success', data.msg));
                    setTimeout(function() {
                        $('#success_file_popup').empty();
                    }, 5000);


                    $(document).find('#default_confirm').modal('hide');
                    var tabe = $('#label').DataTable();
                    $(document).find('#action').prop('selectedIndex', 0);
                    tabe.ajax.reload(null, false);
                    $("#checkAll").prop('checked', false);

                } else {

                    $('#success_file_popup').append(messages('alert-danger', data.error));

                    setTimeout(function() {
                        $('#success_file_popup').empty();
                    }, 5000);
                }
            },
            error: function(data) {

                alert(data.responseText);
            }
        });
    }
    /* $("#action").change(function () {
         

         if (this.value == "delete") {
             $("#submit_all").css("display", "none");
             $("#submit_show_msg").css("display", "inline-block");
         } else {
             $("#submit_all").css("display", "inline-block");
             $("#submit_show_msg").css("display", "none");
         }
     });*/
    function messages(classname, msg) {
        return '<div class="alert ' + classname + ' m-b-0"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>' + msg + '</div>';
    }

    setTimeout(function() {
        $('#topmsgall').hide();
    }, 5000);


    $(document).on('click', '.highlightvalue', function(e) {
        rowid = $(e.target).attr('value');
        isChecked = $(e.target).is(':checked');
        console.log(rowid);
        data = {
            id: rowid,
            active: isChecked
        };
        Swal.fire({
            title: isChecked ? 'Checked?' : 'Unchecked?',
            text: isChecked ? 'Are you sure you want to add banner in highlight?' : ' Are you sure you want to remove this banner from hightlight?',
            cancelButtonText: 'No',
            type: "input",
            confirmButtonColor: "#BF0A30",
            confirmButtonText: isChecked ? 'Yes' : 'Yes',
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo e(route('banner.ischecked')); ?>",
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                        // $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        if (isChecked) {
                            // swal({

                            //     title: 'Checked',
                            //     text: ' The Bestseller is now checked.',
                                
                            //     confirmButtonColor: "#FBB516",
                            // });
                            $('.loader').css("visibility", "visible");
                        // return false;
                            window.location.href = "<?php echo e(route('banner')); ?>";
                        } else {
                            // swal({

                            //     title: 'Unchecked',
                            //     text: 'The Bestseller is unchecked.',
                            //     input :'checkbox',
                            //     icon: 'success',
                            //     confirmButtonColor: "#FBB516",
                            // });
                            $('.loader').css("visibility", "visible");
                        // return false;
                        window.location.href = "<?php echo e(route('banner')); ?>";
                        }
                        
                    },
                    error: function(error) {
                        // Handle AJAX error here
                        console.error(error);
                    },

                });
            } else {
                // User clicked "Cancel," so revert the checkbox state
                $(this).prop('checked', !isChecked);
            }

        });
    });


    $(document).on('click', '.offervalue', function(e) {
        rowid = $(e.target).attr('value');
        console.log(rowid);
        isChecked = $(e.target).is(':checked');
        data = {
            id: rowid,
            active: isChecked
        };
        Swal.fire({
            title: isChecked ? 'Cheked?' : 'Unchecked?',
            text: isChecked ? 'Are you sure you want to add banner in offer?' : 'Are you sure you want to remove this banner from offer?',
            showCancelButton: true,
            type:"input",
            confirmButtonColor: "#BF0A30",
            confirmButtonText: isChecked ? 'Yes' : 'Yes',
            cancelButtonText: 'No',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo e(route('banner.offervalue')); ?>",
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                    beforeSend: function() {
                        // $(".loader").fadeIn();
                        $('.loader').css("visibility", "visible");
                    },
                    success: function(response) {
                        if (isChecked) {
                            // swal({
                            //     title: "Checked",
                            //     type: "warning",
                            //     text: "Offer checked successfully",
                            //     confirmButtonColor: "#FBB516",
                            // });
                            $('.loader').css("visibility", "visible");
                        window.location.href = "<?php echo e(route('banner')); ?>";
                        } else {
                            // swal({
                            //     title: "Unchecked",
                            //     text: "Offer unchecked successfully",
                            //     type: "warning",
                            //     confirmButtonColor: "#FBB516",
                                
                            // });
                            $('.loader').css("visibility", "visible");
                             window.location.href = "<?php echo e(route('banner')); ?>";
                        }
                      
                    },
                    error: function(error) {
                        // Handle AJAX error here
                        console.error(error);
                    },

                });
            } else {
                // User clicked "Cancel," so revert the checkbox state
                $(this).prop('checked', !isChecked);
            }

        });
    });
</script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/liquorjunctiongh/public_html/resources/views/dashboard/banner/list.blade.php ENDPATH**/ ?>