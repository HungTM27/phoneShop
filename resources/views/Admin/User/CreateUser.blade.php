@extends('Admin.layouts.Home')
@section('title', 'Thêm tài khoản User')
@section('content')
    <div class="card-body">
        <form action="{{ route('ShowCreateUser') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên Tài Khoản <span class="text-danger">*</span></label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                    </div>
                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    </div>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="form-group">
                        <label for="">Nhập Lại Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" class="form-control"
                            value="{{ old('password_confirmation') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="kv-avatar">
                        <div class="file-loading">
                            <label for="">Uploads Image</label> <br>
                            <input id="avatar-1" name="avatar" type="file">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Số Điện Thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                    {{-- @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror --}}

                    <div class="form-group">
                        <label for="">Địa Chỉ <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                    </div>
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
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
