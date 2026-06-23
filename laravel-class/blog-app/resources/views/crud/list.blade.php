<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
         @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <h1 class="text-center">Product List</h1>
        <a href="{{ route('product.add') }}" class="btn btn-primary">Add Product</a>
       

       <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Size</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  @php
      $index=1
  @endphp

  @foreach ($products as $product )
  <tbody>
    <tr>
      <th scope="row">{{ $index++ }}</th>
      <td>{{ $product->name }}</td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->sizes }}</td>
      <td>{{ $product->description }}</td>
      <td><img src="{{ asset($product->image) }}" alt="image"></td>
      <td>{{ $product->status }}</td>
      <td>
        <a href="" class="btn btn-success">View</a>
        <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary">Update</a>
        <a href="{{ route('product.destroy',$product->id) }}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
  </tbody>
   @endforeach
</table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>