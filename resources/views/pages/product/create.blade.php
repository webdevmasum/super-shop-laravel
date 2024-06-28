@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Product"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Product"]);

    echo Form::open_laravel(["route"=>"products"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
    echo Form::text(["name"=>"regular_price","label"=>"Regular Price"]);
    echo Form::text(["name"=>"offer_discount","label"=>"Discount"]);
    echo Form::select(["name"=>"category","label"=>"Category","table"=>$categories]);
    echo Form::text(["name"=>"photo","label"=>"Photo","type"=>"file"]);
    echo Form::text(["name"=>"barcode","label"=>"Barcode"]);
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection