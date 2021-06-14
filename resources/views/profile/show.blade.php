
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>Викладач</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Прізвище</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$profile->first_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Імя</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$profile->name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Побатькові</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$profile->surname}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                            <h6 class="mb-0">Електронна пошта</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$profile->email}}
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Предмети</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                @foreach($subjects as $key => $subject)
                                    , {{$subject->name}}
                                @endforeach
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div align='center' class="col-sm-12">
                            <a class="btn btn-info "  href="/profile/edit/{{$profile->id}}">Редагувати</a>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>
@endsection
