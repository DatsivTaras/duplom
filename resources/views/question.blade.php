<?php
    $array = ["A)","B)","C)","D)",];
?>
<?php
    $nomber = ["1.","2.","3.","4.","5.","6.","7.","8.","9."];
?>
<br><div class="d-grid gap-2 d-md-flex justify-content-md-end"><a class="btn btn-primary" href='/test/createquestion/{{$id}}'>Додати питання</a></div><br>

<table class="table table-striped">
    <tbody>
    @foreach($questions as $key => $question)
        <tr>
            <th scope="row">{{$nomber[$key]}}</th>
            <td>{{ $question->name }}</td>
            <td><a href='/test/questiondelete/{{$question->id}}/{{$question->id_test}}'>Видалити</a></td>
            <td><a href='/test/editquestion/{{$question->id}}'>Редагувати</a></td>
        </tr>
        <td colspan="4">
        <table class="table table-light table-hover ">
        @foreach($question->answers as $key => $answer)
            <tr>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <td scope="row">{{$array[$key] }}</td>
                    </div>
                    <div class="col-auto">
                        <td scope="row">{{$answer->name }}</td>
                    </div>
                    <div class="col-auto">
                        @if($answer->checkanswer == 1)
                            <td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
                                </svg>
                            </td>
                        @endif
                        @if($answer->checkanswer == 0)
                            <td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                    <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                                </svg>
                            </td>
                        @endif
                    </div>
                </div>
            </tr>
            @endforeach
        </table>
      </td>
    @endforeach
  </tbody>
</table>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
