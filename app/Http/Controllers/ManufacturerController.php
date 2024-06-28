<?php
namespace App\Http\Controllers;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 


class ManufacturerController extends Controller{

   public function __construct()
   {
       $this->middleware('auth');
   }


   public function index(){
      
      //print_r(Role::all());
     return view("pages.manufacturer.index",["manufacturers"=>Manufacturer::all()]);
      
   }

   public function create(){
     
    return view("pages.manufacturer.create"); 
 }

 public function store(Request $request,Manufacturer $manufacturer){
    //echo $request->name;
    $r=new Manufacturer();
    $r->name=$request->name;
    $r->save();

    return redirect()->route("manufacturers.index")->with('success','Success.');

 }

 
 public function edit(Manufacturer $manufacturer){     
  
    return view("pages.manufacturer.edit",["manufacturer"=>$manufacturer]); 
 }

 public function update(Request $request,Manufacturer $manufacturer){       
    //$role=Role::find($id);
    $manufacturer->name=$request->name;
  
    $manufacturer->update();
    return redirect()->route("manufacturers.index")->with('success','Success.');
  
}  


 public function show(Manufacturer $manufacturer){
    
    return view("pages.manufacturer.show",["manufacturer"=>$manufacturer]);
 }

 public function delete($id){
   $manufacturer=Manufacturer::find($id);
   return view("pages.manufacturer.delete",["manufacturer"=>$manufacturer]);
 }

   public function destroy(Manufacturer $manufacturer){
    $manufacturer->delete();
    return redirect()->route("manufacturers.index")->with('success','Success.');
    
 }



}