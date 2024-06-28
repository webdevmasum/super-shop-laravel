<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;
 


class CustomerController extends Controller{

   public function __construct()
   {
       $this->middleware('auth');
   }


   public function index(){
      
      //print_r(Role::all());
     return view("pages.customer.index",["customers"=>Customer::all()]);
      
   }
   
   public function create(){
      return view("pages.customer.create"); 
   }

   public function store(Customer $customer){
      //echo $request->name;
      $r=new Customer();
      $r->name=$request->name;
      $r->mobile=$request->mobile;
      $r->email=$request->email;
      $r->save();

      return redirect()->route("customers.index")->with('success','Success.');

   }


   public function edit(Customer $customer){     
      //$role=Role::find($id);
      return view("pages.customer.edit",["customer"=>$customer]); 
   }

  public function update(Request $request,Customer $customer){       
      //$role=Role::find($id);
      $customer->name=$request->name;
      $customer->mobile=$request->mobile;
      $customer->email=$request->email;
      $customer->update();
      return redirect()->route("customers.index")->with('success','Success.');
    
  }  


   public function show(Customer $customer){
      
      return view("pages.customer.show",["customer"=>$customer]);
   }

   public function delete($id){
     $customer=Customer::find($id);
     return view("pages.customer.delete",["customer"=>$customer]);
   }

     public function destroy(Customer $customer){
      $customer->delete();
      return redirect()->route("customers.index")->with('success','Success.');
      
   }
 
 
}