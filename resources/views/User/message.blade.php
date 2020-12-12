@extends('layouts.layout')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <form method="post" action="/cars/message">
                @csrf
                               
                <h1 class="banner-title">Contact Us</h1>
                {{-- <h1 class="banner-title">{{ session('msg') }}</h1> --}}
                <div>
                    <textarea class="message" name="message" placeholder="Enter Your Message" ></textarea>
                </div>
                <br>
                
                <div>
                    <input type="submit" name="send" value="Send Message">
                </div>
            </form>
        </div>
        
    </header>
    <!-- end of hero -->

@endsection

    
