@extends('auth.auth')

@section('content')
    <div class="login-brand text-center">
        <i class="fa fa-exchange m-right-xs"></i> System <strong class="text-skin">REGISTER</strong>
    </div>

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} m-bottom-md">
            {{--<input type="text" class="form-control" placeholder="Name">--}}
            <div>
                <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} m-bottom-md">
            {{--<input type="text" class="form-control" placeholder="Email Address">--}}
            <div>
                <input id="email" type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>

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
                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {{--<input type="password" class="form-control" placeholder="Confirm Password">--}}
            <div>
                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
            </div>
        </div>
        <div class="form-group">
            <div class="custom-checkbox">
                <input type="checkbox" id="chkAccept">
                <label for="chkAccept"></label>
            </div>
            I accept the agreement
        </div>

        <div class="m-top-md p-top-sm">
            <button type="submit" class="btn btn-success btn-block">Create an accounts</button>
        </div>

        <div class="m-top-md p-top-sm">
            <div class="font-12 text-center m-bottom-xs">Already have an account?</div>
            <a href="{{ url('/login') }}" class="btn btn-default block">Sign In</a>
        </div>
    </form>
@endsection
