@extends('layouts.layoutAdmin')

@section('content')
<!-- hero -->
<header class="hero">
    <div class="banner">
        <form method="post" enctype="multipart/form-data" action="/admin">
            @csrf
            <h1 class="banner-title">Add New Car</h1>
            <div>
                <input type="text" name="car_name" placeholder="Car Name" required>
            </div>
            <br>
            <div>
                <input type="text" name="car_type" placeholder="Manufacturer" required>
            </div>
            <br>
            <div>
                <h3>Image</h3> <input type="file" name="image">
            </div>
            <br>
            <div>
                <input type="text" name="hire_cost" placeholder="Hire Cost" required>
            </div>
            <br>
            <div>
                <input type="text" name="capacity" placeholder="Capacity" required>
            </div>
            <br>
            <div>
                <input type="text" name="year" placeholder="Year" required>
            </div>
            <br>
            <div>
                <input type="text" name="color" placeholder="Color" required>
            </div>
            <br>
            <div>
                <input type="text" name="chassis" placeholder="Chassis" required>
            </div>
            <br>
            <div>
                <input type="text" name="status" placeholder="Status" required>
            </div>
            <br>
            <br>
            <div>
                <input type="submit" name="save" value="Submit">
            </div>
        </form>
        
    </div>
</header>
<!-- end of hero -->
@endsection
