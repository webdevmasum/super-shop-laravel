@extends('layouts.app')
@section('page')

<?php
 echo Page::header(["title"=>"Delete Customer"]); 
 echo Page::body_open();
 echo Page::content_open(["title"=>"Are you sure to delete?"]);
 echo "<table class='table'>";
 echo "<tr><th>ID</th><td>$customer->id</td></tr>";
 echo "<tr><th>Name</th><td>$customer->name</td></tr>";
 echo "<tr><th>Mobile</th><td>$customer->mobile</td></tr>";
 echo "<tr><th>Email</th><td>$customer->Email</td></tr>";
 
 echo "</table>";
 echo Form::open_laravel(["route"=>"customers/$customer->id","method"=>"DELETE"]); 
 echo "<div class='btn-group'>";
 echo Form::button(["name"=>"btnSubmit","type"=>"submit","value"=>"Delete","class"=>"btn btn-danger"]);
 echo Html::link(["route"=>url("customers"),"text"=>"Manage"]);
 echo "</div>";
 echo Form::close();

 echo Page::content_close();
 echo Page::body_close();

?>

@endsection