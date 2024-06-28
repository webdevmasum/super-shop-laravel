<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
 
    public function index(){
       
       //print_r(Role::all());
      return view("pages.supplier.index",["suppliers"=>Supplier::all()]);
       
    }
    
    public function create(){
       return view("pages.supplier.create"); 
    }
 
    public function store(Request $request){
       //echo $request->name;
       $r=new Supplier();
       $r->name=$request->name;
       $r->mobile=$request->mobile;
       $r->email=$request->email;
       $r->save();
 
       return redirect()->route("suppliers.index")->with('success','Success.');
 
    }
 
 
    public function edit(Supplier $supplier){     
       //$role=Role::find($id);
       return view("pages.supplier.edit",["supplier"=>$supplier]); 
    }
 
   public function update(Request $request,Supplier $supplier){       
       //$role=Role::find($id);
       $supplier->name=$request->name;
       $supplier->mobile=$request->mobile;
       $supplier->email=$request->email;
       $supplier->update();
       return redirect()->route("suppliers.index")->with('success','Success.');
     
   }  
 
 
    public function show(Supplier $supplier){
       
       return view("pages.supplier.show",["supplier"=>$supplier]);
    }
 
    public function delete($id){
      $supplier=Supplier::find($id);
      return view("pages.supplier.delete",["supplier"=>$supplier]);
    }
 
      public function destroy(Supplier $supplier){
       $supplier->delete();
       return redirect()->route("suppliers.index")->with('success','Success.');
       
    }
  
  
 }