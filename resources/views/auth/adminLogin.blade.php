@extends('layouts.layoutAdmin')

@section('content')
<div class="hero">
    <div class="banner">
        
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            
            <h1 class="banner-title">{{ __('Admin Login') }}</h1>

            <div>
                <label for="uname" style="font-weight: bold">{{ __('Username') }}</label>

                <div>
                    <input id="uname" type="text" class="form-control @error('uname') is-invalid @enderror" name="uname" value="{{ old('uname') }}" required autocomplete="uname" autofocus>

                    @error('uname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" style="font-weight: bold">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>

            <div>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <br>

            <div>
                <div>
                    {{-- <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button> --}}
                    <input type="submit" name="save" value="Login">

                    @if (Route::has('password.request'))
                        <br><br>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
                
                
          
    
</div>
@endsection
