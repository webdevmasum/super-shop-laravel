@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Show Manufacturer"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Show Manufacturer"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$manufacturer->id</td></tr>";
 echo "<tr><th>Name</th><td>$manufacturer->name</td></tr>";
  
 echo "</table>";
 echo Html::link(["route"=>url("manufacturers"),"text"=>"Manage"]);
 echo Page::content_close();
 echo Page::body_close();

?>

@endsection