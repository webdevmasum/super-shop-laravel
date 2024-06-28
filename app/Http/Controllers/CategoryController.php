<?php
namespace App\Http\Controllers;
use App\Models\ProductCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
 


class CategoryController extends Controller{

   public function __construct()
   {
       $this->middleware('auth');
   }


   public function index(){
      
      //print_r(Role::all());
     return view("pages.category.index",["categories"=>ProductCategories::all()]);
      
   }
   public function create(){
     
      return view("pages.category.create"); 
   }


   public function store(Request $request, ProductCategories $category) {
      $category->name = $request->input('name');
     
      $category->save();
  
      return redirect()->route("categories.index")->with('success', 'Category created successfully.');
  }

   public function edit(ProductCategories $category){     
      //$role=Role::find($id);
      return view("pages.category.edit",["category"=>$category]); 
   }

  public function update(Request $request, ProductCategories $category){       
      //$role=Role::find($id);
      $category->name=$request->name;
    
      $category->update();
      return redirect()->route("categories.index")->with('success','Success.');
    
  }  


   public function show(ProductCategories $category){
      
      return view("pages.category.show",["category"=>$category]);
   }

   public function delete($id){
     $category=ProductCategories::find($id);
     return view("pages.category.delete",["category"=>$category]);
   }

     public function destroy(ProductCategories $category){
      $category->delete();
      return redirect()->route("categories.index")->with('success','Success.');
      
   }
 
 

}