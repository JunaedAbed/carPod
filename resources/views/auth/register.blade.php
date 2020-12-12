@extends('layouts.layout')

@section('content')
<div class="hero">
    <div class="banner">   

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <h1 class="banner-title">{{ __('Signup') }}</h1>
                
            <div>
                <label for="name" style="font-weight: bold">{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="email" style="font-weight: bold">{{ __('E-Mail Address') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password" style="font-weight: bold">{{ __('Password') }}</label>

                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <label for="password-confirm" style="font-weight: bold">{{ __('Confirm Password') }}</label>

                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            
            <div>
                <label for="phone" style="font-weight: bold">{{ __('Phone') }}</label>

                <div>
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div>
                <label for="location" style="font-weight: bold">{{ __('Location') }}</label>

                <div>
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div>
                <label for="gender" style="font-weight: bold">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>

                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <br><strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <br>
            <div>
                {{-- <button type="submit">
                    {{ __('Register') }}
                </button> --}}
                <input type="submit" name="save" value="Register">
            </div>
            
        </form>
        
                
            
        
    </div>
</div>
@endsection
