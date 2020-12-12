@extends('layouts.layoutAdmin')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">{{ session('msg') }}</h1>
            <h1 class="banner-title">Manage Cars</h1>
            <a href="/admin/create">
                <button class="banner-btn">Add a New Car</button>
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
                    <img src="/storage/img/cars/{{ $car->image }}" alt="product" class="product-img">
                    <a href="/admin/{{ $car->id }}">
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>More Information</button>
                    </a>
                </div>
                 
                <h3>{{ $car->car_name }}</h3>
                <h4>{{ $car->status }}</h4>
                @endforeach
                
            </article>
            <!-- end of single product -->
            
            
        </div>
    </section>
    <!-- end of products -->
@endsection

    
