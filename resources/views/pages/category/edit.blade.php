@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Edit Category"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Edit Category"]);
  
 echo Form::open_laravel(["route"=>"categories/$category->id","method"=>"PUT"]); 
 echo Form::text(["name"=>"name","label"=>"Name","value"=>"$category->name"]);
  
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection