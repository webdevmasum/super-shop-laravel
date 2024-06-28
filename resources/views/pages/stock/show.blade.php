@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Stock"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Stock"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$stock->id</td></tr>";
 echo "<tr><th>Product Id</th><td>$stock->product_id</td></tr>";
 echo "<tr><th>Quantity</th><td>$stock->quantity</td></tr>";
 echo "<tr><th>Transaction Type</th><td>$stock->transaction_type_id</td></tr>";
 echo "</table>";
 echo Html::link(["route"=>url("stocks"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection