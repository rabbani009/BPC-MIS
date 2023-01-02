@extends('auth.auth')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            @include('.auth.partials._page_title')
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                @include('.auth.messages.info')
                @include('.auth.messages.warning')
                @include('.auth.messages.success')
                @include('.auth.messages.failed')

                <form action="{{ route('get.login') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Email">

                        @if($errors->has('email'))
                        <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Password">

                        @if($errors->has('password'))
                            <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember_me" @if(old('remember_me')) checked @endif>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                {{--
                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->
                --}}

                <p class="mb-1">
                    {{-- {{ route('get.forgot.password') }} --}}
                    <a href= {{ route('get.forgot.password') }}>I forgot my password</a>
                </p>
               
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
