@extends('layouts.admin')

@section('content')
    <h3 align='center'>Класи</h3>
    <a href='/admin/subjects/create'>Додати</a>
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">Імя</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>
                    <form id="destroy-form" action="{{ route('admin.subjects.destroy', $subject->id) }}">
                        @method('DELETE')
                        @csrf
                        <button>Delete</button>
                    </form>

                </td>
                <td>
                    <a href="{{ route('admin.subjects.edit', $subject->id) }}">Режстрація</a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $subjects->links() !!}
    </div>
@endsection
