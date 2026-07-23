<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
        }

        .product-image{
            width:70px;
            height:70px;
            object-fit:cover;
            border-radius:8px;
        }

        .table tbody tr:hover{
            background:#f8f9fa;
        }

        .badge{
            font-size:13px;
            margin:2px;
        }
    </style>

</head>

<body>

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Product Management
            </h4>

            <a href="{{ route('product.add') }}" class="btn btn-light">
                + Add Product
            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sizes</th>
                            <th>Colors</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="220">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($products as $product)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <img
                                    src="{{ asset('uploads/products/'.$product->image) }}"
                                    class="product-image"
                                    alt="Product">

                            </td>

                            <td>
                                <strong>{{ $product->name }}</strong>
                            </td>

                            <td>
                                ₹ {{ number_format($product->price,2) }}
                            </td>

                            {{-- Sizes --}}
                            <td>

                                @foreach(explode(',', $product->sizes) as $size)
                                  <span class="badge bg-secondary me-1">
                                      {{ trim($size) }}
                                  </span>
                              @endforeach

                            </td>

                            {{-- Colors --}}
                            <td>


                              @foreach($product->colors as $color)
                                <span class="badge bg-primary me-1">
                                    {{ $color }}
                                </span>
                            @endforeach
                               
                             


                            </td>

                            <td>

                                {{ $product->category }}

                            </td>

                            <td>

                                {{ $product->brand }}

                            </td>

                            <td>

                                {{ \Illuminate\Support\Str::limit($product->description,40) }}

                            </td>

                            <td>

                                @if($product->status)

                                    <span class="badge bg-success">

                                        Active

                                    </span>

                                @else

                                    <span class="badge bg-danger">

                                        Inactive

                                    </span>

                                @endif

                            </td>

                            <td>

                                <a href=""
                                   class="btn btn-info btn-sm">

                                    View

                                </a>

                                <a href="{{ route('product.edit',$product->id) }}"
                                   class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('product.destroy',$product->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this product?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="11" class="text-center text-danger">

                                <h5>No Product Found</h5>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
    <div class="">
        {{ $products->links() }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>