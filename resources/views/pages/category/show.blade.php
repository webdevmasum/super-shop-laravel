@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Product Category"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Product Category"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$category->id</td></tr>";
 echo "<tr><th>Name</th><td>$category->name</td></tr>";
 
 echo "</table>";
 echo Html::link(["route"=>url("categories"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection