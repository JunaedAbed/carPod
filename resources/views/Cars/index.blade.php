@extends('layouts.layout')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">Cars Inventory</h1>
            <h1 class="banner-title">{{ session('msg') }}</h1>
            <a href="/cars/message">
                <button class="banner-btn">Contact Now</button>
            </a>
        </div>
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Cars</h2>
        </div>
        <div class="products-center">
                      
            <!-- single product -->
            <article class="product">
                
                @foreach ($cars as $car)
                <div class="img-container">
                    <img src="storage/img/cars/{{ $car->image }}" alt="product" class="product-img">
                    <a href="/cars/{{ $car->id }}">
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>Buy</button>
                    </a>
                </div>
                <h3>{{ $car->car_name }}</h3>
                <h4>${{ $car->hire_cost }}</h4>
                @endforeach
                
            </article>
            <!-- end of single product -->
            
            
        </div>
    </section>
    <!-- end of products -->
@endsection

    
