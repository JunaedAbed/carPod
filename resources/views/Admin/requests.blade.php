@extends('layouts.layoutAdmin')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">Client Requests</h1>
            <h1 class="banner-title">{{ session('msg') }}</h1>
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
                <h3>Name: {{ $user->name }}</h3>
                <h3>email: {{ $user->email }}</h3>
                <h3>phone: {{ $user->phone }}</h3>
                <h3>location: {{ $user->location }}</h3>
                <h3>Ordered Car ID: {{ $user->car_id }}</h3>
                <h3>Credit Card No.: {{ $user->creditCardNo }}</h3>
                <h3>Status: {{ $user->status }}</h3><br>  
                
                <form action="/admin/requests/{{ $user->id }}" method="post">
                    @csrf
                    @method('put')
                    <input type="submit" name="delete" value="Approve">
                </form><br><br>
                @endforeach
                
            </article>
            <!-- end of single product -->
            
            
        </div>
    </section>
    <!-- end of products -->
@endsection

    
