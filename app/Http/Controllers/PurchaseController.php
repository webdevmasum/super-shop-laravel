<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Supplier;
use App\Models\Purchases;
use App\Models\Product;
use App\Models\PurchaseDetail;

use Illuminate\Support\Facades\Http;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
     
       // return view("pages.purchase.index",["purchases"=>Purchases::all()]);

       $purchases = DB::table("purchases as p")  
       ->join("suppliers as s", "s.id", "=", "p.supplier_id")
       ->select("p.id", "s.name as supplier", "p.purchase_date as date", "P.discount","p.vat", "p.purchase_total as Total Amount", "p.paid_amount as Paid","p.shipping_address as shipping Address", "p.remark")
       ->paginate(10);
   return view("pages.purchase.index", ["purchases" => $purchases]);
    }
 

    public function create()
    {   $purchases = DB::table('purchases')->get();
        $suppliers= Supplier::all();
        $products=Product::all();

       // print_r($customers);
        return view("pages.purchase.create", compact('purchases','suppliers','products'));
    }

    public function store(Request $request)
    {
         
               
          //print_r($products);
        //Order
         $order=new Order;
         
        // print_r($order);

           $purchase->customer_id=$request->cmbCustomer;
           $purchase->order_date=date("Y-m-d",strtotime($request->txtOrderDate));
           $purchase->delivery_date=date("Y-m-d",strtotime($request->txtDueDate));
           $purchase->shipping_address=isset($request->txtShippingAddress)?$request->txtShippingAddress:"NA";
           $purchase->discount=isset($request->txtDiscount)?$request->txtDiscount:0;
           $purchase->vat=isset($request->txtVat)?$request->txtVat:"90";
           $purchase->paid_amount=0;
           $purchase->order_total=isset($request->txtOrderTotal)?$request->txtOrderTotal:"80";
           $purchase->status_id=1;         
           
           $purchase->save();        
         

        //  //Order Details
        $products=$request->txtProducts; 
        
       // print_r($products);
       
        foreach($products as $product){         
           
            $order_detail=new OrderDetail;         

            $order_detail->order_id=$order->id;
            $order_detail->product_id=$product["item_id"];
            $order_detail->qty=$product["qty"];
            $order_detail->price=$product["price"];            
            $order_detail->discount=isset($product["discount"])?$product["discount"]:0;
            $order_detail->vat=0;

            $order_detail->save();
      }


         //Stock




    }

}
