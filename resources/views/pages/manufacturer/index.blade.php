@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Manufacturer"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Manage Manufacturer","button"=>"Manufacturer","route"=>"manufacturers"]);

echo get_array_table($manufacturers,["id","name" ],"manufacturers");

echo Page::content_close();
echo Page::body_close();
?>

@endsection