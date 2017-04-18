@extends('auth.auth')

@section('content')

    <div class="login-brand text-center">
        <i class="fa fa-flag m-right-xs"></i> System <strong class="text-skin">LOGIN</strong>
    </div>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-bottom-md">
            {{--<input type="text" class="form-control" placeholder="Email Address">--}}
            <div>
                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{--<input type="password" class="form-control" placeholder="Password">--}}
            <div>
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="custom-checkbox">
                {{--<input type="checkbox" id="chkRemember">--}}
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember"></label>
            </div>
            Remember me
        </div>

        <div class="m-top-md p-top-sm">
            <button type="submit" class="btn btn-success btn-block">
            Sign in
            </button>
        </div>

        <div class="m-top-md p-top-sm">
            <div class="font-12 text-center m-bottom-xs">
                <a href="{{ url('/password/reset') }}" class="font-12">Forgot password ?</a>
            </div>
            <div class="font-12 text-center m-bottom-xs">Do not have an account?</div>
            <a href="{{ url('/register') }}" class="btn btn-default block">Create an accounts</a>
        </div>
    </form>
@endsection
