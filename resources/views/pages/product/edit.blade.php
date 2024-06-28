@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Edit Product"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Edit Product"]);
  
 echo Form::open_laravel(["route"=>"products/$product->id","method"=>"PUT"]); 
 echo Form::text(["name"=>"name","label"=>"Name","value"=>"$product->name"]);
 echo Form::text(["name"=>"regular_price","label"=>"Regular Price","value"=>"$product->regular_price"]);
 echo Form::text(["name"=>"offer_discount","label"=>"Discount","value"=>"$product->offer_discount"]);
 echo Form::select(["name"=>"category","label"=>"Category","value"=>"$product->product_category_id","table"=>$categories]);
 echo Form::text(["name"=>"barcode","label"=>"Barcode","value"=>"$product->barcode"]);


 echo "<label for='photo'>Current Photo:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>";
 echo "<img src='" . asset('img/' . $product->photo) . "' alt='Product Photo' style='max-width: 200px; max-height: 200px;'><br>";
 echo Form::field(["name"=>"photo","label"=>"Photo","type"=>"file"]);


 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Html::link(["route"=>url("products"),"text"=>"Manage"]);
 echo "</div>";

 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection