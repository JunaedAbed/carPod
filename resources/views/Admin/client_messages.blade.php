@extends('layouts.layoutAdmin')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">Client Messages</h1>
            <h1 class="banner-title">{{ session('msg') }}</h1>
        </div>
        
    </header>
    <!-- end of hero -->
    
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>Messages</h2>
        </div>
        <div class="products-center">
                      
            <!-- single product -->
            <article class="product">
                
                @foreach ($messages as $message)
                <h4>Message ID: {{ $message->msg_id }}</h4>            
                <h4>Client ID: {{ $message->client_id }}</h4>            
                <h3>Message: <h4>{{ $message->message }}</h4></h3>
                <h3>Time: {{ $message->time }}</h3>               
                 
                
                <form action="/admin/client_messages/{{ $message->msg_id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" name="delete" value="Delete">
                </form><br><br>
                @endforeach
                
            </article>
            <!-- end of single product -->
            
            
        </div>
    </section>
    <!-- end of products -->
@endsection

    
