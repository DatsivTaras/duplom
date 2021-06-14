@extends('layouts.admin')

@section('content')
    <h3 align='center'>Користувачі</h3>
    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-success">
                <th scope="col">Імя</th>
                <th scope="col">Email</th>
                <th scope="col">Дата реєстрації</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->surname . ' ' . $user->name . ' ' . $user->first_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    @if (!$user->approved())
                        <a class="btn btn-sm btn-success js-approve-user" data-id="{{ $user->id }}">Підтвердити</a>
                    @endif


                    <form id="destroy-form" action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".js-approve-user", function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Ви дійсно хочете підтвердити цього користувача?',
                    icon: 'question',
                    confirmButtonText: 'Так',
                    cancelButtonText: 'Ні',
                    showCancelButton: true,
                    showCloseButton: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        jQuery.get("/admin/users/approve/" + id)
                            .done(function( data ) {
                                if (data.status) {
                                    location.reload()
                                }
                            });
                    }
                })
            });
        });
    </script>
@endsection
