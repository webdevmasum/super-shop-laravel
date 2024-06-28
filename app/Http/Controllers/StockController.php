<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Stock;
use App\Models\Product;
use App\Models\TransactionType;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
 

use Illuminate\Support\Facades\Http;

class StockController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }
 
 
    public function index(){
      $stocks = DB::table("stocks as s")
          ->join("products as p", "p.id", "=", "s.product_id")
          ->join("transaction_types as t", "t.id", "=", "s.transaction_type_id")
          ->select("s.id", "p.name as product", "s.quantity", "t.name as transaction", "s.remark")
          ->paginate(10);
  
      return view("pages.stock.index", ["stocks" => $stocks]);
  }
   
        
     public function create(){
        $products=Product::all();
        $transaction=TransactionType::all();
        return view("pages.stock.create",["products"=>$products,"transaction"=>$transaction]); 
     }
  
     public function store(Request $request){
       
        $r=new Stock();
        $r->product_id=$request->product;
        $r->quantity=$request->quantity;
        $r->transaction_type_id=$request->transaction;
        $r->remark=$request->remark;
        $r->save();
  
        return redirect()->route("stocks.index")->with('success','Success.');
  
     }
  
  
     public function edit(Stock $stock){     
      $products=Product::all();
      $transaction=TransactionType::all();
      return view("pages.stock.edit",["stock"=>$stock,"products"=>$products,"transaction"=>$transaction]); 
   }
  
    public function update(Request $request,Stock $stock){       
       
        $stock->product_id=$request->product;
        $stock->quantity=$request->quantity;
        $stock->transaction_type_id=$request->transaction;
        $stock->remark=$request->remark;
        

        $stock->update();
        return redirect()->route("stocks.index")->with('success','Success.');
      
    }  
  
  
     public function show(Stock $stock){
        
        return view("pages.stock.show",["stock"=>$stock]);
     }
  
     public function delete($id){
       $stock=Stock::find($id);
       return view("pages.stock.delete",["stock"=>$stock]);
     }
  
       public function destroy(Stock $stock){
        $stock->delete();
        return redirect()->route("stocks.index")->with('success','Success.');
        
     }
   
   
  }