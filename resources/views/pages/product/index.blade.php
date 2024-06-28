
@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Product"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Create Product","button"=>"Product","route"=>"products"]);
?>

<!-- @foreach($products as $product)
   <div>{{$product->id}} | {{$product->name}}</div>
@endforeach -->

<?php

echo Table::get_array_table($products,["id","name","category","regular_price","photo","barcode"],"products");




?>

{{$products->links("pagination::bootstrap-4")}}

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection