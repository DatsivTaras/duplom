@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ваш акаунт не підтвержено') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Акаунт в адміністрації на розгляді. За більш детальною інформацію звертайтеся до адміністрації вашої школи') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

