@extends('layouts.layoutAdmin')

@section('content')
<!-- hero -->
<header class="hero">
    <div class="banner">
        <form method="post" enctype="multipart/form-data" action="/admin/{{ $car->id }}">
            @csrf
            @method('put')
            
            <h1 class="banner-title">Edit {{ $car->car_name }}</h1>
            <div>
                <h3>Name</h3> <input type="text" name="car_name" value="{{ $car->car_name }}" required>
            </div>
            <br>
            <div>
                <h3>Manufacturer</h3> <input type="text" name="car_type" value="{{ $car->car_type }}" required>
            </div>
            <br>
            <div>
                <h3>Image</h3> <input type="file" name="image" value="{{ $car->image }}">
            </div>
            <br>
            <div>
                <h3>Hire Cost</h3> <input type="text" name="hire_cost" value="{{ $car->hire_cost }}" required>
            </div>
            <br>
            <div>
                <h3>Capacity</h3> <input type="text" name="capacity" value="{{ $car->capacity }}" required>
            </div>
            <br>
            <div>
                <h3>Year</h3> <input type="text" name="year" value="{{ $car->year }}" required>
            </div>
            <br>
            <div>
                <h3>Color</h3> <input type="text" name="color" value="{{ $car->color }}" required>
            </div>
            <br>
            <div>
                <h3>Chassis</h3> <input type="text" name="chassis" value="{{ $car->chassis }}" required>
            </div>
            <br>
            <div>
                <h3>Status</h3> <input type="text" name="status" value="{{ $car->status }}" required>
            </div>
            <br>
            <div>
                <input type="submit" name="save" value="Submit">
            </div>
        </form>
        
    </div>
</header>
<!-- end of hero -->
@endsection
