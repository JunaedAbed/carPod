@extends('layouts.layout')

@section('content')
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Make it yours Now</h2>
        </div>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
                
                
                {{-- $id = {{ $car->car_id }}; --}}
            
                <h2>{{ $car->car_name }}</h2>
                <div class="img-container">
                    <img src="/storage/img/cars/{{ $car->image }}" alt="product" class="product-img">
                </div>
                <div class="pro_details">
                    <h3>Manufacturer: {{ $car->car_type }}</h3>
                    <h3>Cost: ${{ $car->hire_cost }}</h3>
                    <h3>Capacity: {{ $car->capacity }}</h3>
                    <h3>Year: {{ $car->year }}</h3>
                    <h3>Color: {{ $car->color }}</h3>
                    <h3>Chassis: {{ $car->chassis }}</h3>
                    <h3>Status: {{ $car->status }}</h3>
                </div>
                <h2>Proceed to Buy {{ $car->car_name }}</h2>
                
                @if (Route::has('login'))
                
                    @auth
                        
                        <form action="/cars/{{ $car->id }}/pay" method="get">
                            <button class="banner-btn">Buy</button>
                        </form> 
                    
                    @else    
                        <a href="{{ route('login') }}">
                            <button class="banner-btn">Login</button>
                        </a>
                        {{-- have to build -> after login come to this page --}}
                        
                    @endauth
 
                @endif
                
            </article>
            <!-- end of single product -->
            
        </div>
    </section>
    <!-- end of products -->
@endsection
