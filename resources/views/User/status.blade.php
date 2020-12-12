@extends('layouts.layout')

@section('content')
    <!-- hero -->
    <header class="hero">
        <div class="banner">
            <h1 class="banner-title">{{ auth()->user()->name }}'s Status</h1><br>
            <h1 class="banner-title">{{ auth()->user()->status }}</h1>
        </div>
    </header>
    <!-- end of hero -->
@endsection

    
