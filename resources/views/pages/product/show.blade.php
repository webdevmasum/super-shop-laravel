@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Product"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Product"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$product->id</td></tr>";
 echo "<tr><th>Name</th><td>$product->name</td></tr>";
 echo "<tr><th>Offer Price</th><td>$product->offer_price</td></tr>";
 echo "<tr><th>Regular Price</th><td>$product->regular_price</td></tr>";
 echo "<tr><th>Product Category</th><td>$product->product_category_id</td></tr>";

 echo "<tr><th>photo</th><td>
 <img src='" . asset('img/' . $product->photo) . "' alt='product photo' width:'180' height:'80' />
 </td></tr>";

 echo "</table>";
 echo Html::link(["route"=>url("products"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection