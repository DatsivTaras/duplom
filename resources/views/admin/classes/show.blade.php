@extends('layouts.admin')

@section('content')
    <h3 align='center'>Класи</h3>
    @if(!empty($classes))
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Імя</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($classes as $class)
                <tr>
                    <td scope="row">{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td><a href='delete'>Видалити</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $employees->links() !!}
        </div>
    @endif
@endsection
