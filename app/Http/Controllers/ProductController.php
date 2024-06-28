<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller{

   public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(){     

         $products=DB::table("products as p")
    
     ->join("product_categories as c","c.id","=","p.product_category_id")
     ->select("p.id","p.name","c.name as category","p.regular_price","p.barcode","p.photo")
     ->paginate(10);

     return view("pages.product.index",["products"=>$products]);
   }

   public function create(){
      $products = DB::table('products')->get();
      $categories=ProductCategory::all();
      return view("pages.product.create",["categories"=>$categories]); 
   }
 
   public function store(Request $request){

      $photoName = time().'.'.$request->photo->extension();
		 $request->photo->move(public_path('img'),$photoName);

      $product=new Product();
      $product->name = $request->name;
      $product->regular_price = $request->regular_price;
      $product->offer_discount = $request->offer_discount;
      $product->product_category_id = $request->category;  
      $product->barcode = $request->barcode; 
      
      $product->photo=$photoName;
      $product->save();
  
      return redirect()->route("products.index")->with('success','Success.');
  }

  public function edit(Product $product){     
   $categories=ProductCategory::all();
   return view("pages.product.edit",["product"=>$product,"categories"=>$categories]); 
}

  public function update(Request $request,Product $product){       
   $product->name = $request->name;
   $product->regular_price = $request->regular_price;
   $product->offer_discount = $request->offer_discount;
   $product->product_category_id = $request->category;
   $product->barcode = $request->barcode;
   
   
 

      if(isset($request->photo)){
		   $product->photo=$request->photo;
		}

      if(isset($request->photo)){
			$photoName = $product->id.'.'.$request->photo->extension();
			$product->photo=$photoName;
			$request->photo->move(public_path('img'),$photoName);
		}

      $product->update();

      return redirect()->route("products.index")->with('success','Success.');
    
  }  


   public function show(Product $product){     
       return view("pages.product.show",["product"=>$product]);
   }

   public function delete($id){ 
      
       $product=Product::find($id);
       //echo $role->id;
       return view("pages.product.delete",["product"=>$product]);
   }

   public function destroy(Product $product){
      $product->delete();
      return redirect()->route("products.index")->with('success','Success.');
      
   }

}