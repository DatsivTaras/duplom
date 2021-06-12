
<?php $array = ["A","B","C","D",];?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Додати Питання') }}</div>
                    <div class="card-body">
                        <form method="get" action="{{ route('/test/addquestion') }}">
                                <label class="form-label">Питання</label>
                                <input value='{{$id}}' name='id' type="hidden" class="form-control"  >
                                <input value='{{$id}}' name='id_test' type="hidden" class="form-control"  >
                                <input name='name' type="text" class="form-control"  >
                                <label style='color:blue'class="form-label">* Поставте галочку напроти правильної відповіді </label>
                             @for( $i = 0 ; $i < 4; $i ++)
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            </br><label class="form-label">Відповідь: {{$array[$i]}} </label>
                                        </div>
                                        <div class="col-auto">
                                            <input name='answer[name][{{$i}}]' type="text" class="form-control"  >
                                        </div>
                                        <div class="col-auto">
                                            <input name='answer[check][{{$i}}]' class="form-check-input" value="1" type="checkbox">
                                        </div>
                                    </div>
                                 @endfor
                                    </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Додати') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
