@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <table id="all_prodcts_data" class="table table-bordered table-striped all_prodcts">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Product Image</th>
                      <th>Product Name</th>
                      <th>Product Category</th>
                      <th>Product Price</th>
                      <th colspan="2">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  {{-- Delete Modal --}}
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
              <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
          </div>
          <div class="modal-body">
              <h5>Are you sure want to delete this product ?</h5>
              <input type="hidden" id="deleteing_product_id">
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary close_modal" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary delete_product">Yes Delete</button>
          </div>
      </div>
  </div>
</div>
{{-- End - Delete Modal --}}
  <!-- /.content-wrapper -->

@endsection
@section('scripts')
  <script>
    $(document).ready(function(){

      var table = $('.all_prodcts').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,    
            ajax: "{{ route('products.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // {data: 'product_image', name: 'product_image'},
                {
                  data: 'product_image',
                    "render": function(data, type, row) {
                        return '<img src="/storage/product_images/'+data+'" / width="100">';
                    }
                },
                {data: 'product_name', name: 'product_name'},
                {data: 'category_name', name: 'category_name'},
                {data: 'product_price', name: 'product_price'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
      $(document).on('click', '.btn_delete', function (e) {
          e.preventDefault();
          var product_id = $(this).data('id');
          $('#DeleteModal').modal('show');
          $('#deleteing_product_id').val(product_id);
      });

      $(document).on('click', '.delete_product', function (e) {
            e.preventDefault();

            $(this).text('Deleting..');
            var id = $('#deleteing_product_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/delete-product/" + id,
                dataType: "json",
                success: function (response) {
                  if(response.status == 404){
                      $('#success_message').addClass('alert alert-success');
                      $('#success_message').text(response.message);
                      $('.pending').trigger('click');
                      $('.delete_product').text('Yes Delete');
                  }
                  else{
                      $('#success_message').html("");
                      $('#success_message').addClass('alert alert-success');
                      $('#success_message').text(response.message);
                      $('#all_prodcts_data').DataTable().clear().draw();
                      $('.delete_product').text('Yes Delete');
                      $('#DeleteModal').modal('hide');
                  }
                }
            });

          });

          $(document).on('click', '.close_modal , .btn-close', function (e) {
              $(this).closest('.modal').modal('toggle');
          });
    });
    
  </script>
@endsection;