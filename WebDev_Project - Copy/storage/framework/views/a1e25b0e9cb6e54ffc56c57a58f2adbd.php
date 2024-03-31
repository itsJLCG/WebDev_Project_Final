<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 10 Ajax DataTables CRUD (Create Read Update and Delete) - Cairocoders</title>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" >
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 Ajax DataTables CRUD (Create Read Update and Delete) </h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Product</a>
            </div>
        </div>
    </div>
    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <table class="table table-bordered" id="ajax-crud-datatable">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Description</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<div class="modal fade" id="product-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div><div class="modal-body">
                <form action="javascript:void(0)" id="EmployeeForm" name="EmployeeForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Name" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Product Description</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter Description" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Product Price</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Product Image</label>
                            <div class="col-sm-12">
                            <input type="text" class="form-control" id="product_image" name="product_image" placeholder="Enter Image" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10"><br/>
                        <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
<script type="text/javascript">
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$('#ajax-crud-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(url('ajax-crud-datatable')); ?>",
        columns: [
            { data: 'id_product', name: 'id_product' },
            { data: 'product_name', name: 'product_name' },
            { data: 'product_description', name: 'product_description' },
            { data: 'product_price', name: 'product_price' },
            { data: 'product_image', name: 'product_image' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});

function add(){
    $('#EmployeeForm').trigger("reset");
    $('#ProductModal').html("Add Product");
    $('#product-modal').modal('show');
    $('#id').val('');
}

$('#EmployeeForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "<?php echo e(url('store')); ?>",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#product-modal").modal('hide');
            var oTable = $('#ajax-crud-datatable').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
            console.log(data);
        },
        error: function(data){
            console.log(data);
        }
    });
});
</script>
</body>
</html>
<?php /**PATH C:\xamppss\laravel\WebDev_Project\resources\views/index.blade.php ENDPATH**/ ?>