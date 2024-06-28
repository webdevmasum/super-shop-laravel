<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\PurchaseDetail;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {             
        return response()->json(["purchases"=>Purchase::all()]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
              
        
        //Purchase
           $purchase=new Purchase;         
      
           $purchase->supplier_id=$request->supplier_id;
           $purchase->purchase_date=date("Y-m-d",strtotime($request->purchase_date));
           $purchase->delivery_date=date("Y-m-d",strtotime($request->delivery_date));
           $purchase->shipping_address=isset($request->shipping_address)?$request->shipping_address:"NA";
           $purchase->discount=isset($request->discount)?$request->discount:0;
           $purchase->vat=isset($request->vat)?$request->vat:"0";
           $purchase->paid_amount=0;
           $purchase->purchase_total=0;
           $purchase->status_id=1;     
           $purchase->save();    
           
       
        // Purchase Details
        $products=$request->products; 
        
       // print_r($products);
      
        foreach($products as $product){         
           
            $purchase_detail=new PurchaseDetail;         

            $purchase_detail->purchase_id=$purchase->id;
            $purchase_detail->product_id=$product["product_id"];
            $purchase_detail->qty=$product["qty"];
            $purchase_detail->price=$product["price"];            
            $purchase_detail->discount=isset($product["discount"])?$product["discount"]:0;
            $purchase_detail->vat=0;

            $purchase_detail->save();
      }
   

         //Stock

 
         return json_encode(["data"=>$request->products]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_encode(Purchase::find($id));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {  
        $order->delete();       


        //
    }
}
