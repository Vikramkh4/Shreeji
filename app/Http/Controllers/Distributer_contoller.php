<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Distributer;

class Distributer_contoller extends Controller
{
    public function distributers(Request $request)
{
      $title  = "Distributer";
      
      

    return view('frontend.distributer_retailer',compact('title'));
}
    public function retailers(Request $request)
{
      $title  = "Retailer";
      
      

    return view('frontend.distributer_retailer',compact('title'));
}
    public function add_distributer(Request $request)
{
    
     $validated = $request->validate([
        'name' => 'required',
        'mob' => 'required',
    ]);
      
      
      
      $dist  = new  Distributer();
      $dist->name  = $request->name;
      $dist->email = $request->email;
      $dist->mob  =  $request->mob;
      $dist->address  = $request->address;
      $dist->message  = $request->message;
      $dist->role  =   $request->role;
      $dist->status  =    0;
     $dist->save();
    
   return redirect()->route('distributer')->with('success', 'successfully Sent.');
}


    public function view_distributer(){
        
        $distributers = Distributer::all(); // Fetch all distributers from the database
    return view("distributer", compact('distributers'));
        return view("distributer");
    }



}
