@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Stock"]);
echo Page::body_open();
echo Page::content_open(["title"=>"Manage Stock","button"=>"Stock","route"=>"stocks"]);
?>

<?php
echo get_array_table($stocks,["id","product","quantity","transaction","remark"],"stocks");
 

?>

{{$stocks->links("pagination::bootstrap-4")}}

<?php 
 
echo Page::content_close();
echo Page::body_close();
?>

@endsection