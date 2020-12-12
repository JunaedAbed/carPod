<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Car;
use App\Models\User;

class CarController extends Controller
{
    public function index(){
        
        $cars = Car::all();
        
        return view('Cars.index', [
            'cars' => $cars,
        ]);
    }
    
    public function show($id){
        
        $car = Car::findOrFail($id);
        
        return view('Cars.show', [
            'car' => $car,
        ]);
    }
    
    public function showPay(){
        return view('User.pay');
    }
    
    public function pay($id){
        
        $car = Car::findOrFail($id);
        

        // Check for correct user
        if(auth()->user()->status == 'Pending'){
            return redirect('/cars')->with('msg', 'Wait for the previous Approval');
        }

        return view('User.pay')->with('car', $car);
    }
    
    public function updatePay(Request $request, $id) {
        
        //edit
        $user = User::findOrFail(auth()->user()->id);
        $user->car_id = $id;
        $user->status = "Pending";
        $user->creditCardNo = request('creditCardNo');
        $user->save();
        
        return redirect('/cars')->with('msg', 'Payment Successfull. Wait For confirmation');
    }
    
    public function showStatus(){
        
        
        $user = User::findOrFail(auth()->user()->id);
        
        return view('User.status');
    }
}
