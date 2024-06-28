
@extends('layouts.app')
@section('page')

<?php
echo Page::header(["title"=>"Manage Purchase"]);
echo Page::body_open();
echo Page::content_open(["button"=>"Purchase","route"=>"Purchases"]);
?>

<?php

echo Table::get_array_table($purchases,["id","supplier",  "Total Amount","Paid", "discount","vat","shipping Address","date"],"purchases");

?>

 

<?php
echo Page::content_close();
echo Page::body_close();
?>

@endsection