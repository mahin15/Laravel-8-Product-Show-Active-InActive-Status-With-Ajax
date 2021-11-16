@extends('layouts.admin_layout.admin_layout')

@section('libCss')
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/css/froala_editor.pkgd.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/admin/product') }}">Product</a></li>
                            <li class="breadcrumb-item active">Add-Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                <form name="productForm" id="productForm" @if (empty($productData['id']))
                action="{{ url('admin/add-edit-product') }}" @else
                    action="{{ url('admin/add-edit-product/' . $productData['id']) }}" @endif method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name" @if (!empty($productData['name']))
                                        value="{{ $productData['name'] }}"
                                    @else value="{{ old('name') }}" @endif placeholder="Enter Product Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="code">Product Code</label>
                                        <input type="text" class="form-control" id="code" name="code" @if (!empty($productData['code']))
                                        value="{{ $productData['code'] }}"
                                    @else value="{{ old('code') }}" @endif placeholder="Enter Product Code">
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Product Price</label>
                                        <input type="text" class="form-control" id="price" name="price" @if (!empty($productData['price']))
                                        value="{{ $productData['price'] }}"
                                    @else value="{{ old('price') }}" @endif placeholder="Enter Product price">
                                    </div>

                                    <div class="form-group">
                                        <label for="discount_price">Product Discount Price</label>
                                        <input type="text" class="form-control" id="discount_price" name="discount_price"
                                            @if (!empty($productData['discount_price']))
                                        value="{{ $productData['discount_price'] }}"
                                    @else value="{{ old('discount_price') }}" @endif placeholder="Enter Product
                                        Discount price">
                                    </div>

                                    <div class="form-group">
                                        <label for="size">Product Size</label>
                                        <input type="text" class="form-control" id="size" name="size" @if (!empty($productData['size']))
                                        value="{{ $productData['size'] }}"
                                    @else value="{{ old('size') }}" @endif placeholder="Enter Product Size">
                                    </div>

                                    <div class="form-group">
                                        <label for="weight">Product weight</label>
                                        <input type="text" class="form-control" id="weight" name="weight" @if (!empty($productData['weight']))
                                        value="{{ $productData['weight'] }}"
                                    @else value="{{ old('weight') }}" @endif placeholder="Enter Product Weight">
                                    </div>



                                    <div class="form-group">
                                        <label for="description">Product Description</label>
                                        <textarea class="form-control summernote" name="description" id="description"
                                            placeholder="Enter Description Here...">
                          @if (!empty($productData['description'])) {{ $productData['description'] }}
                  @else {{ old('description') }} @endif
                        </textarea>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="exampleInputFile">Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control dropify" data-height="70"
                                                    data-allowed-file-extensions="png jpg jpeg webp" id="image" name="image"
                                                    value="{{ old('image') }}" />
                                                {{-- <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label> --}}
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <p class="fs-6">(Recommended Image Size: WIdth:500px, Height:200px)
                                            </p>
                                        </div>
                                        @if (!empty($productData['image']))
                                            <div>
                                                <img style="width:200px; margin-top:15px; margin-bottom:5px;"
                                                    src="{{ asset('/images/product_images/small/' . $productData['image']) }}">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                                            @if (!empty($productData['meta_title']))
                                        value="{{ $productData['meta_title'] }}"
                                    @else value="{{ old('meta_title') }}" @endif placeholder="Enter Meta Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea class="form-control" rows="3" id="meta_description"
                                            name="meta_description" placeholder="Enter Meta Description Here...">
                             @if (!empty($productData['meta_description'])) {{ $productData['meta_description'] }}
                  @else {{ old('meta_description') }} @endif
                            </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                            @if (!empty($productData['meta_keywords']))
                                        value="{{ $productData['meta_keywords'] }}"
                                    @else value="{{ old('meta_keywords') }}" @endif placeholder="Enter Meta
                                        Keywords">
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" style="float:right;" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                </form>
            </div>
        </section>

    </div>


@endsection

@section('libJs')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js">
    </script>


    <script>
        new FroalaEditor('textarea');
    </script>

@endsection
