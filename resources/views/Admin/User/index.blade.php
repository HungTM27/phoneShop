@extends('Admin.layouts.Home')
@section('title', 'Danh sách Tài Khoản')
@section('content')
    <div class="row">
        <div class="col-md-4">
            @if (Session::has('success'))
                <p class="alert alert-success text-center ">{{ Session::get('success') }} </p>
            @endif

            @if (Session::has('error'))
                <p class="alert alert-danger text-center ">{{ Session::get('error') }} </p>
            @endif
        </div>
    </div>
    <form action="" method="GET">
        <div class="row">
            <div class="col-4">
                <div class="input-group">
                    <div class="form-outline">
                    <input type="search" id="form1" name="keyword" class="form-control" value="" placeholder="Search..." />
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
            </div>  
        </div>
        <a href="" class="btn btn-success" style="float: right;"><i
            class="fa fa-plus" aria-hidden="true"></i></a>
    </form>
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table" id="data-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                <img src="" alt="">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info "><i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-sm btn-danger btn-remove"><i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
        <div class="d-flex justify-content-left">
            {{ $users->links() }}
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).ready(function() {
            $('.btn-remove').on('click', function() {
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: "Bạn chắc chắn muốn xóa sản phẩm này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).attr('href');
                        window.location.href = url;
                    }
                })
                return false;
            });
        });
    </script>
@endsection
