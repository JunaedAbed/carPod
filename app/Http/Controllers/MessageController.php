<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Car;
use App\Models\Admin;
use App\Models\Message;

class MessageController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }
    
    public function index(){
        
        $messages = Message::all();
        
        return view('Admin.client_messages', [
            'messages' => $messages,
        ]);
    }
    
    public function destroy($msg_id){
        
        $message = Message::findOrFail($msg_id);
        
        if (!isset($message)){
            return redirect('/admin/client_messages')->with('msg', 'No message Found');
        }
        
        $message->delete();
        return redirect('/admin/client_messages')->with('msg', 'Deleted message Successfully!');
    }
    
    public function sendMessage(Request $request){
        
        $message = new Message();
        $message->client_id = auth()->user()->id;
        $message->message = request('message');
        $message->status = 'Unread';
        $message->time = date('Y-m-d H:i:s');
        $message->timestamps = false;
        $message->save();
        return redirect('/cars')->with('msg', 'Message Sent Successfully!');
    }
    
    public function create(){
        
        return view('User.message');
    }
}
