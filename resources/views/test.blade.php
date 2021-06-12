

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<br><div class="d-grid gap-2 d-md-flex justify-content-md-end">
<a class="btn btn-primary" aria-current="page" href="{{ route('/profile') }}">Профіль</a>
<a class="btn btn-primary" aria-current="page" href="{{ route('/test/create') }}">Створити Тест</a>
</div>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Імя</th>
      <th scope="col">Предмет</th>
      <th scope="col">Вчитель</th>
      <th scope="col">Видалити</th>
      <th scope="col">Редагувати</th>
      <th scope="col">Питання</th>
      <th scope="col">Пройти</th>
    </tr>
  </thead>
  <tbody>
@foreach($tests as $test)
    <tr>
      <th scope="row">{{ $test->id }}</th>
      <td>{{ $test->name }}</td>
      <td>{{ $test->subject->name }}</td>
      <td>{{ $test->testss->name }}</td>
      <td><a href='test/delete/{{$test->id}}'>Видалити</a></td>
      <td><a href='test/edit/{{$test->id}}'>Редагувати</a></td>
      <td><a href='test/question/{{$test->id}}'>Питання</a></td>
      <td><a href='test/passtest/{{$test->id}}'>Пройти</a></td>
    </tr>
@endforeach
</tbody><br>

</table>




