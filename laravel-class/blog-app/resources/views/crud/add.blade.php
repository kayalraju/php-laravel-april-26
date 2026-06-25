<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .card-header{
            background:#0d6efd;
            color:#fff;
            font-size:22px;
            font-weight:600;
        }
    </style>

</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <span>Create Product</span>

                    <a href="{{ route('product.list') }}" class="btn btn-light btn-sm">
                        Back
                    </a>

                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>Please fix the following errors:</strong>

                            <ul class="mb-0 mt-2">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Product Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter product name">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Product Price
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                class="form-control"
                                name="price"
                                value="{{ old('price') }}"
                                placeholder="Enter price">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Product Size
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="sizes"
                                value="{{ old('sizes') }}"
                                placeholder="Example: S,M,L,XL">

                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Colors</label>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="colors[]"
                                            value="Red"
                                            id="red">

                                        <label class="form-check-label" for="red">
                                            Red
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="colors[]"
                                            value="Blue"
                                            id="blue">

                                        <label class="form-check-label" for="blue">
                                            Blue
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="colors[]"
                                            value="Green"
                                            id="green">

                                        <label class="form-check-label" for="green">
                                            Green
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="colors[]"
                                            value="Black"
                                            id="black">

                                        <label class="form-check-label" for="black">
                                            Black
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="category"
                                value="{{ old('category') }}"
                                placeholder="Enter category">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Brand
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                name="brand"
                                value="{{ old('brand') }}"
                                placeholder="Enter brand">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Product Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="4"
                                name="description"
                                placeholder="Write product description">{{ old('description') }}</textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Product Image
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                name="image">

                        </div>

                       

                        <div class="d-flex justify-content-end">

                            <button class="btn btn-success px-4">

                                Save Product

                            </button>

                            <button type="reset"
                                    class="btn btn-secondary ms-2">

                                Reset

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