@extends('layouts.layoutAdmin')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">Customer Info Desk</h1>
            <a href="/admin/requests">
                <button class="banner-btn">See Requests</button>
            </a>
        </div>
        
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Customers</h2>
        </div>
        <div class="products-center">
                      
            <!-- single product -->
            <article class="product">
                
                @foreach ($users as $user)
                <h4>Customer ID: {{ $user->id }}</h4>
                <h3>Name: {{ $user->fname }}</h3>
                <h3>email: {{ $user->email }}</h3>
                <h3>phone: {{ $user->phone }}</h3>
                <h3>location: {{ $user->location }}</h3>
                <h3>gender: {{ $user->gender }}</h3>
                <h3>Ordered Car ID: {{ $user->car_id }}</h3>
                <h3>Status: {{ $user->status }}</h3><br>               
                @endforeach
                
            </article>
            <!-- end of single product -->
            
            
        </div>
    </section>
    <!-- end of products -->
@endsection

    
