@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Edit Supplier"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Edit Supplier"]);
  
 echo Form::open_laravel(["route"=>"suppliers/$supplier->id","method"=>"PUT"]); 
 echo Form::text(["name"=>"name","label"=>"Name","value"=>"$supplier->name"]);
 echo Form::text(["name"=>"mobile","label"=>"Mobile","value"=>"$supplier->mobile"]);
 echo Form::text(["name"=>"email","label"=>"Email","value"=>"$supplier->email"]);
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection