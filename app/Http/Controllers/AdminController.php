<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){
        
        $cars = Car::all();
        
        return view('Admin.index', [
            'cars' => $cars,
        ]);
    }
    
    public function userShow(){
        
        $users = User::all();
        
        return view('Admin.customers', [
            'users' => $users,
        ]);
    }
    
    public function show($id){
        
        
        $car = Car::findOrFail($id);
        
        return view('Admin.show', [
            'car' => $car,
        ]);
    }
    
    public function showReq(){
        
        
        $users = DB::table('users')->where('status', 'Pending')->get();
        
        return view('Admin.requests', [
            'users' => $users,
        ]);
    }
    
    public function create(){
        
        return view('Admin.create');
    }
    
    public function store(Request $request) {
        
        $this->validate($request, [
            'image' => 'image|nullable|max:1999'
        ]);
        
        //file upload
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/img/cars', $fileNameToStore);
        }else{
            $fileNameToStore = "noimage.jpg";
        }
        
        //create car
        $car = new Car();
        $car->car_name = request('car_name');
        $car->car_type = request('car_type');
        $car->image = $fileNameToStore;
        $car->hire_cost = request('hire_cost');
        $car->capacity = request('capacity');
        $car->year = request('year');
        $car->color = request('color');
        $car->chassis = request('chassis');
        $car->status = request('status');
        $car->timestamps = false;
        $car->save();
        
        return redirect('/admin')->with('msg', 'Added new car Successfully!');
    }
    
    public function edit($id){
        
        $car = Car::find($id);
        
        //Check if car exists before deleting
        if (!isset($car)){
            return redirect('/admin')->with('msg', 'No car Found');
        }

        // Check for correct user
        // if(auth()->user()->id !==$car->admin_id){
        //     return redirect('/admin')->with('msg', 'Unauthorized Page');
        // }

        return view('Admin.edit')->with('car', $car);
    }
    
    public function update(Request $request, $id) {
        
        $this->validate($request, [
            'image' => 'image|nullable|max:1999'
        ]);
        
        //file upload
        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/img/cars', $fileNameToStore);
        }
        
        //edit car
        $car = Car::find($id);
        $car->car_name = request('car_name');
        $car->car_type = request('car_type');
        $car->hire_cost = request('hire_cost');
        $car->capacity = request('capacity');
        $car->year = request('year');
        $car->color = request('color');
        $car->chassis = request('chassis');
        $car->status = request('status');
        $car->timestamps = false;
        
        if ($request->hasFile('image')){
            Storage::delete('public/img/cars' . $car->image);
            $car->image = $fileNameToStore;
        }
        $car->save();
        
        return redirect('/admin')->with('msg', 'Updated car Successfully!');
    }
    
    public function updateReq($id) {
        
        //edit
        $user = User::findOrFail($id);
        $user->status = 'Approved';
        
        $user->save();
        
        return redirect('/admin/requests')->with('msg', 'Approved Successfully!');
    }
    
    public function destroy($id){
        
        $car = Car::findOrFail($id);
        
        if (!isset($car)){
            return redirect('/admin')->with('msg', 'No car Found');
        }
        
        if($car->image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/storage/img/cars'.$car->image);
        }
        
        $car->delete();
        return view('User.message');
        // return redirect('/admin')->with('msg', 'Deleted car Successfully!');
    }
}
