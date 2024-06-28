@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Supplier"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Manage Supplier","button"=>"Supplier","route"=>"suppliers"]);

echo get_array_table($suppliers,["id","name","mobile","email"],"suppliers");

echo Page::content_close();
echo Page::body_close();
?>

@endsection