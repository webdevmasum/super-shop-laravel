@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Stock"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Stock"]);

    echo Form::open_laravel(["route"=>"stocks"]);
    echo Form::select(["name"=>"product","label"=>"Product","table"=>$products]);
    echo Form::text(["name"=>"quantity","label"=>"Quantity"]);
    echo Form::select(["name"=>"transaction","label"=>"Transaction Type","table"=>$transaction]);
    echo Form::text(["name"=>"remark","label"=>"remark"]);
   
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection