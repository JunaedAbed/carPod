@extends('layouts.layout')

@section('content')
<!-- hero -->
<header class="hero">
    <div class="banner">
        <form method="post" enctype="multipart/form-data" action="/cars/{{ $car->id }}">
            @csrf
            @method('put')
            
            <h1 class="banner-title">Make Payments</h1>
            <div>
                <input type="text" name="creditCardNo" placeholder="Credit Card Number" required>
            </div>
            <br>
            <div>
                <input type="submit" name="pay" value="Pay">
            </div>
        </form>
        
    </div>
</header>
<!-- end of hero -->
@endsection
