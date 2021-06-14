@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Реєстрація') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Тип юзера') }}</label>
                            <div class="col-md-6">
                                <select id="role" name="role" class="form-control" >
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}">{{ __('roles.names.' . $role )}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Прізвище') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"autocomplete="" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Імя') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Побатькові') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('name2') }}" autocomplete="" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row js-input-teacher">
                            <label for="subjects" class="col-md-4 col-form-label text-md-right">{{ __('Предмети') }}</label>
                            <div class="col-md-6">
                                <select id="framework" name="subjects[]" multiple class="form-control @error('subjects') is-invalid @enderror">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>

                                @error('subjects')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="classes" class="col-md-4 col-form-label text-md-right">{{ __('Клас') }}</label>
                            <div class="col-md-6 js-input-teacher" style="display:none;">
                                <select id="classes" name="classes[]" multiple class="form-control @error('classes') is-invalid @enderror">
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{ $class->name }}</option>
                                    @endforeach
                                </select>

                                @error('classes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 js-input-student" style="display:none;">
                                <select id="clas" name="clas" class="form-control" >
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Електронна пошта') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Повторіть пароль') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    // $('#framework').multiselect({
    //     nonSelectedText: 'Виберіть предмети',
    //     enableFiltering: true,
    //     enableCaseInsensitiveFiltering: true,
    //     buttonWidth:'100%'
    // });

    // $('#classes').multiselect({
    //     nonSelectedText: 'Виберіть класи',
    //     enableFiltering: true,
    //     enableCaseInsensitiveFiltering: true,
    //     buttonWidth:'100%'
    // });

    $(document).on("change", "#role", function() {
        showHideInputs($(this).val());
    })

    showHideInputs($('#role').val())

    function showHideInputs(role) {
        if (role == 'teacher') {
            $('.js-input-teacher').show()
            $('.js-input-student').hide()

            $('.js-input-teacher input, .js-input-teacher select').each(function() {
                $(this).val('');
            });
        } else {
            $('.js-input-teacher').hide()
            $('.js-input-student').show()

            $('.js-input-student input, .js-input-student select').each(function() {
                $(this).val('');
            });
        }

    }
});
</script>

@endsection


