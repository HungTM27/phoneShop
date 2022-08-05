<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>
    @include('Admin.layouts.style')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đặt lại mật khẩu</p>
                <form action="{{ route('resetPassword') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email_address" class="form-control" placeholder="Email"
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" class="btn btn-primary">
                            Gửi liên kết đặt lại mật khẩu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Admin.layouts.script')
</body>

</html>
