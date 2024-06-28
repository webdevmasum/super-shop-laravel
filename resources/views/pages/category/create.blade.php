@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Product Category"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Product Category"]);

    echo Form::open_laravel(["route"=>"categories"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
   
    
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection