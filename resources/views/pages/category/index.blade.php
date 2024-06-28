@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Product Category"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Manage Product Category","button"=>"Product Category","route"=>"categories"]);

echo get_array_table($categories,["id","name"],"categories");

echo Page::content_close();
echo Page::body_close();
?>

@endsection