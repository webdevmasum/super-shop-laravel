@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Customer"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Customer"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$customer->id</td></tr>";
 echo "<tr><th>Name</th><td>$customer->name</td></tr>";
 echo "<tr><th>Mobile</th><td>$customer->mobile</td></tr>";
 echo "<tr><th>Email</th><td>$customer->email</td></tr>";
 echo "</table>";
 echo Html::link(["route"=>url("customers"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection