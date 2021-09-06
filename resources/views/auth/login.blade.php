<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Studio | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="{{'/admin/assets/css/vendor.min.css'}}" rel="stylesheet" />
    <link href="{{'/admin/assets/css/app.min.css'}}" rel="stylesheet" />
</head>

<body style="background-color: #f3f3fb;">
    <div id="app" class="app app-full-height app-without-header">

        <div class="login">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <img class="img-fluid" src="{{'/bg-admin-login.jpg'}}" alt="">
                    </div>
                    <div class="col-5">
                        <div class="login-content" style="
                                box-shadow: 1px 1px 7px 1px #80808054;
                                padding: 40px 20px;
                            ">
                            <h2 class="text-center mb-5">Admin login</h2>
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('login.custom') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

    </div>
</body>

</html>