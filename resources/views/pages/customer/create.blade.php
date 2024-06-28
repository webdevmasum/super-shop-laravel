@extends('layouts.app')
@section('page')
<?php
    echo Page::header(["title"=>"Create Customer"]);
    echo Page::body_open();
    echo Page::content_open(["title"=>"Create Customer"]);

    echo Form::open_laravel(["route"=>"customers"]);
    echo Form::text(["name"=>"name","label"=>"Name"]);
    echo Form::text(["name"=>"mobile","label"=>"Mobile"]);
    echo Form::text(["name"=>"email","label"=>"Email"]);
    echo Form::button(["name"=>"btnSubmit","value"=>"Save","type"=>"submit"]);
    echo Form::close();
    
    echo Page::content_close();
    echo Page::body_close();
?>
@endsection