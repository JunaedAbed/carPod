@extends('layouts.layout')

@section('content')
<div class="hero">
    <div class="banner">
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <h1 class="banner-title">{{ __('Login') }}</h1>

            <div>
                <label for="email" style="font-weight: bold">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
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
