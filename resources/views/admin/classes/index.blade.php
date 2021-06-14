@extends('layouts.admin')

@section('content')
    <h3 align='center'>Класи</h3>
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">Імя</th>
                <th scope="col">Опис</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $class)
            <tr>
                <td>{{ $class->name }}</td>
                <td>{{ $class->about }}</td>
                <td>
                    <form id="destroy-form" action="{{ route('admin.classes.destroy', $class->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $classes->links() !!}
    </div>
@endsection
