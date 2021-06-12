<br><h3 align='center'>Продукти</h3><br>
@if(!empty($products))
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Імя</th>
      <th scope="col">Кількість</th>
      <th scope="col">Опис</th>
      <th scope="col">Ціна ($)</th>
    </tr>
  </thead>
  <tbody>
@foreach($products as $product)
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td>{{ $product->name }}</td>
      <td>{{ $product->quantity }}</td>
      <td>{{ $product->description }}</td>
      <td>{{ $product->price }}</td>
      <td><a href='edit/{{ $product->id }}'>Редагувати</a></td>
      <td><a href='delete'>Видалити</a></td>
    </tr>
@endforeach
  </tbody>
</table>
@endif
<div class="container">
    <div class="row justify-content-center">


    <a class="flex-sm-fill text-sm-center nav-link active" aria-current="page" href="{{ route('product/create') }}">Додати</a>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
