@extends('Admin.layouts.Home')
@section('title', 'Sua Tài Khoản')
@section('content')
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên Tài Khoản</label>
                        <input type="text" name="username" class="form-control"
                            value="{{ old('username', $editUser->username) }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control"
                            value="{{ old('email', $editUser->email) }}">
                    </div>

                    <div class="form-group">
                        <label for="">Mật Khẩu</label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập Lại Mật Khẩu</label>
                        <input type="password" name="password_confirmation" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-user">
                        <img src="{{ asset($editUser->avatar) }}" width="100">
                    </div>
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <label for="">Uploads Image</label> <br>
                            <input id="avatar-1" name="avatar" type="file">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="text" name="phone" class="form-control"
                            value="{{ old('phone', $editUser->phone) }}">
                    </div>


                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address', $editUser->address) }}">
                    </div>

                    <div class="form-group">
                        <label for="">Trạng Thái</label>
                        <select name="role" class="form-control">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="col-12 d-flex justify-content">
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
