@extends('admin_layout.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {{ Form::open(array('url' => '/updatecategory')) }}
                <div class="card-body">
                  <div class="form-group">
                    {{ Form::hidden('cat_id', $category->id) }}
                    {{Form::label('', 'Category Name', ['for' => 'exampleInputEmail1'])}}
                    {{Form::text('category_name', $category->category_name, ['class' => 'form-control','id'=>'exampleInputEmail1','placeholder'=>'Enter category'])}}
                  </div>
                </div>
                <div class="card-footer">
                  {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                  {{Form::submit('Update',['class' => 'btn btn-primary'])}}
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.card -->

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection