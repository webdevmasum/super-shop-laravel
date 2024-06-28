@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Edit Manufacturer"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Edit Manufacturer"]);
  
 echo Form::open_laravel(["route"=>"manufacturers/$manufacturer->id","method"=>"PUT"]); 
 echo Form::text(["name"=>"name","label"=>"Name","value"=>"$manufacturer->name"]);
 
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Update"]);
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection