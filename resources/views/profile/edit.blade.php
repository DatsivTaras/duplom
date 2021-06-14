@extends('layouts.app')

@section('content')

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Додати Товар') }}</div>
                    <div class="card-body">

                        <form method="get" action="{{ route('/profile/update',[$profile->id]) }}">
                            <div class="mb-3">
                                <label class="form-label">Прізвище</label>
                                <input value="{{$profile->first_name}}" name='first_name' type="text" class="form-control"  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Імя</label>
                                <input value="{{$profile->name}}" name='name' type="text" class="form-control"  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Побатькові</label>
                                <input value="{{$profile->surname}}" name='surname' type="text" class="form-control"  >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Електронна пошта</label>
                                <input value="{{$profile->email}}" name='email' type="text" class="form-control"  >
                            </div>

                            <select id="framework" name="subjects[]" multiple class="form-control" >
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                @endforeach
                            </select>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Редагувати') }}
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
<script>
$(document).ready(function(){
    $('#framework').multiselect({
        nonSelectedText: 'Select Framework',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth:'400px'
    });
});
</script>

@endsection
