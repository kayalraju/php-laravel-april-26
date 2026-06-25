<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
        }

        .card{
            border:none;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        .product-image{
            width:120px;
            height:120px;
            object-fit:cover;
            border-radius:10px;
            border:1px solid #ddd;
        }

    </style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card">

<div class="card-header bg-primary text-white">

<h4>Edit Product</h4>

</div>

<div class="card-body">

@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('product.update',$product->id) }}"method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

    <div class="mb-3">

            <label class="form-label">Product Name</label>

            <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name',$product->name) }}">
        </div>

        <div class="mb-3">

            <label class="form-label">Price</label>

            <input
            type="number"
            step="0.01"
            name="price"
            class="form-control"
            value="{{ old('price',$product->price) }}">

        </div>

        <div class="mb-3">

                <label class="form-label">Category</label>

                <input
                type="text"
                name="category"
                class="form-control"
                value="{{ old('category',$product->category) }}">

        </div>

        <div class="mb-3">

            <label class="form-label">Brand</label>

            <input
            type="text"
            name="brand"
            class="form-control"
            value="{{ old('brand',$product->brand) }}">

        </div>

        <div class="mb-3">

            <label class="form-label">Description</label>

            <textarea
            name="description"
            rows="4"
            class="form-control">{{ old('description',$product->description) }}</textarea>

        </div>

{{-- Sizes --}}

    <div class="mb-3">

        <label class="form-label fw-bold">Product Sizes</label>

            @php
            $sizes=['S','M','L','XL','XXL'];
            $selectedSizes=is_array($product->sizes)? $product->sizes: explode(',',$product->sizes);
            @endphp

        <div class="row">

             @foreach($sizes as $size)

                <div class="col-md-2">

                <div class="form-check">

                <input type="checkbox" class="form-check-input" name="sizes[]" value="{{ $size }}"
                {{ in_array($size,$selectedSizes) ? 'checked' : '' }}>

                <label class="form-check-label">

                {{ $size }}

                </label>

                </div>

                </div>

            @endforeach

    </div>

</div>

{{-- Colors --}}

    <div class="mb-3">

            <label class="form-label fw-bold">Product Colors</label>

            @php
            $colors=['Red','Blue','Green','Black','Yellow'];
            $selectedColors=is_array($product->colors)? $product->colors: json_decode($product->colors,true);
            @endphp

        <div class="row">

            @foreach($colors as $color)
            <div class="col-md-3">
                <div class="form-check">
                    <input
                    type="checkbox"
                    class="form-check-input"
                    name="colors[]"
                    value="{{ $color }}"
                    {{ in_array($color,$selectedColors) ? 'checked' : '' }}>
                    <label class="form-check-label">
                    {{ $color }}
                    </label>
                </div>
            </div>

            @endforeach

        </div>

    </div>

    <div class="mb-3">

    <label>Status</label>
        <select class="form-select" name="status">

        <option value="1"{{ $product->status==1 ? 'selected' : '' }}>Active</option>
        <option value="0"{{ $product->status==0 ? 'selected' : '' }}>Inactive</option>

        </select>

    </div>

    <div class="mb-3">

        <label>Current Image</label>

        <br>

        <img
        src="{{ asset('uploads/products/'.$product->image) }}"
        class="product-image">

    </div>

    <div class="mb-3">

        <label>Change Image</label>

        <input
        type="file"
        name="image"
        class="form-control">

    </div>

    <div class="text-end">

            <a href="{{ route('product.list') }}"
            class="btn btn-secondary">

            Back

            </a>

            <button
            class="btn btn-success">

            Update Product

            </button>

    </div>

</form>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>