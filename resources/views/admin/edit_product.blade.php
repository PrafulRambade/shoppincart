@extends('admin_layout.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->


      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              {{ Form::open(array('url' => '/updateProduct','enctype'=>'multipart/form-data')) }}
                <div class="card-body">
                  <div class="form-group">
                    {{Form::hidden('id', $single_product->id, ['class' => 'form-control','id'=>'exampleInputProductId','placeholder'=>'Enter Id'])}}
                    {{Form::label('', 'Product Name', ['for' => 'exampleInputProductName'])}}
                    {{Form::text('product_name', $single_product->product_name, ['class' => 'form-control','id'=>'exampleInputProductName','placeholder'=>'Enter Product'])}}
                    @if($errors->has('product_name'))
                        <div class="error danger">{{ $errors->first('product_name') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    {{Form::label('', 'Product Description', ['for' => 'ProductDescription'])}}
                    {{Form::textarea('product_desc', $single_product->product_description, ['class' => 'form-control','id'=>'ProductDescription','placeholder'=>'Enter Product Description','rows'=>2])}}
                    @if($errors->has('product_desc'))
                        <div class="error danger">{{ $errors->first('product_desc') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    {{Form::label('', 'Product Price', ['for' => 'exampleInputProductPrice'])}}
                    {{Form::text('product_price', $single_product->product_price, ['class' => 'form-control','id'=>'exampleInputProductPrice','placeholder'=>'Enter Product Price'])}}
                    @if($errors->has('product_price'))
                        <div class="error danger">{{ $errors->first('product_price') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    {{Form::label('', 'Product Category', ['for' => 'exampleInputProductCat'])}}
                    {{Form::select('product_category', $category, $single_product->product_category, array('class'=>'form-control','id'=>'exampleInputProductCat', 'placeholder'=>'Please Select Category')) }}
                    @if($errors->has('product_category'))
                        <div class="error danger">{{ $errors->first('product_category') }}</div>
                    @endif
                  </div>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::label('', 'Product Image', ['for' => 'exampleInputProdcutImage'])}}
                            {{ Form::file('product_image',array('class'=>'form-control','id'=>'exampleInputProdcutImage')) }}
                        </div>
                        <div class="col-md-6">
                            <img style="text-align:center" src="/storage/product_images/{{$single_product->product_image}}" width='200'>
                        </div>
                    </div>
                </div>
                  @if($errors->has('product_image'))
                        <div class="error danger">{{ $errors->first('product_image') }}</div>
                    @endif
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              {{ Form::close() }}
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </section>
  </div>
@endsection