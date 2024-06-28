@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Edit Stock"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Edit Stock"]);
  
 echo Form::open_laravel(["route"=>"stocks/$stock->id","method"=>"PUT"]); 
 echo Form::select(["name"=>"product","label"=>"Product","value"=>"$stock->product_id","table"=>$products]);
 echo Form::text(["name"=>"quantity","label"=>"Quantity","value"=>"$stock->quantity",]);
 echo Form::select(["name"=>"transaction","label"=>"Transaction Type","value"=>"$stock->transaction_type_id","table"=>$transaction]);
 echo Form::text(["name"=>"remark","label"=>"Remark"]);
  
 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Html::link(["route"=>url("stocks"),"text"=>"Manage"]);
 echo "</div>";

 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection