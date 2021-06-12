@if($questionsAnswers['user_id'] ==  auth()->id())
    <h1 align='center'>Тест пройдено</h1>
    @else
        <br><h1 style="color:blue" align='center'>Тест: {{ $tests->name }}</h1><br><br>
        <h2  align='center'>Питання</h2><br><br>
        <div class="container light-style flex-grow-1 container-p-y">

            <form method="get" action="{{ route('/test/testresult',[$tests->id]) }}">
                @foreach($question as $question)
                    <h2>{{$question->name}}</h2><br>
                    @foreach($question->answers as $answer)
                        <div class="col-auto">
                            <div class="form-check">
                                <h4>
                                    <input name='answer[{{$question->id}}][{{$answer->id}}]' class="form-check-input" value="1" type="radio" >
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$answer->name}}
                                    </label>
                                </h4>
                            </div>
                        </div>
                    @endforeach <br>
                @endforeach
        <div align='center' class="mb-3">
            <button type="submit" class="btn btn-success"> Здати тест</button>
        </div>
            </form>
        </div>
    @endif
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
