@extends('layouts.admin_layout.admin_layout')
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
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('error_message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center" style="color: #dc3545">{{ Session::get('error_message') }}</h4>
            </div>
            <?php Session::forget('error_message'); ?>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="text-center" style="color: #0a9634">{{ Session::get('success_message') }}</h4>
            </div>
            <?php Session::forget('success_message'); ?>
        @endif

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products</h3>
                                <a href="{{ url('admin/add-edit-product') }}"
                                    style="max-width: 150px; float:right; display:inline-block;"
                                    class="btn btn-block btn-success">Add Product</a>
                            </div>
                            <!-- /.card-header -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Products</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Discount Price</th>
                                            <th colspan="3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <?php $product_image_path = 'images/product_images/small/' . $product->image; ?>
                                                    @if (!empty($product->image))
                                                        <img style="width: 100px;"
                                                            src="{{ asset('/images/product_images/small/' . $product['image']) }}"
                                                            alt="">
                                                    @else
                                                        <img style="width: 100px;"
                                                            src="{{ asset('/images/product_images/no-image.jpg') }}"
                                                            alt="">
                                                    @endif
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->code }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->discount_price }}</td>
                                                <td>
                                                    <a title="Edit Product"
                                                        href="{{ url('admin/add-edit-product/' . $product->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                </td>
                                                <td>
                                                    <a title="Delete Product" href="javascript:void(0)"
                                                        class="confirmDelete" record="product"
                                                        recordid="{{ $product->id }}"><i class="fas fa-trash"></i></a>
                                                </td>
                                                <td>
                                                    @if ($product['status'] == 1)
                                                        <a class="updateProductStatus" onclick="updateProductStatus()"
                                                            href="javascript:void(0)" id="product-{{ $product['id'] }}"
                                                            product_id="{{ $product['id'] }}"><i class="fas fa-toggle-on"
                                                                aria-hidden="true" status="Active"></i></a>
                                                    @else
                                                        <a class="updateProductStatus" onclick="updateProductStatus()"
                                                            href="javascript:void(0)" id="product-{{ $product['id'] }}"
                                                            product_id="{{ $product['id'] }}"><i
                                                                class="fas fa-toggle-off" aria-hidden="false"
                                                                status="Inactive"></i></a>
                                                    @endif
                                                </td>

                                            </tr>
                                        @endforeach
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
    <!-- /.content-wrapper -->

@endsection
