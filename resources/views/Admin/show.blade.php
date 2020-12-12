@extends('layouts.layoutAdmin')

@section('content')
    <!-- products -->
    <section class="products">
        <div class="section-title">
            {{-- <h2>vehicle Editor</h2> --}}
        </div>
        <div class="products-center">
            
            <!-- single product -->
            <article class="product">
                
                
                {{-- $id = {{ $car->car_id }}; --}}
                
                
            
                <h2>{{ $car->car_name }}</h2>
                <div class="img-container">
                    <img src="/storage/img/cars/{{ $car->image }}" alt="product" class="product-img">
                    
                    <form action="/admin/{{ $car->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bag-btn"><i class="fas fa-shopping-cart"></i>Delete</button>
                    </form>
                    
                    <form action="/admin/{{ $car->id }}/edit" method="get">
                        <button class="bag-btn-two"><i class="fas fa-shopping-cart"></i>Update</button>
                    </form>
                    
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
                {{-- <h2>Proceed to Buy {{ $car->car_name }}</h2> --}}
                
            </article>
            <!-- end of single product -->
            
        </div>
    </section>
    <!-- end of products -->
@endsection
