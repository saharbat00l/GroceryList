<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<body class="bg-dark text-light">

<div class="container mt-8">  
<h1 class="" >Grocery List</h1>


<table class="table text-light">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Item</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>

  <tbody>

  @foreach($products as $product)
   <tr>
    <td>{{ $product ->id }}</td>
    <td>{{ $product ->name }}</td>
    <td>{{ $product ->qty }}</td>
    <td>{{ $product ->price }}</td>
    <td>
        <a href="{{route('product.edit', ['product' => $product]) }}" class="text-info text-decoration-none" >Edit</a></td>
    <td>
       <form action="{{route('product.destroy', ['product'=> $product])}}" method="post">
        @method('DELETE')
        @csrf
        <input type="submit" value="Delete">
       </form>
    </td>
   </tr>
   @endforeach

  </tbody>

</table>

<a class="text-info text-decoration-none" href="/create">Create Product</a>
</div>


</body>
</html>