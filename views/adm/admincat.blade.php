@extends('adm.masteradmin')
@section('title', 'Blog Application')
@section('contentadmin')

	<div class="container-fluid" style="margin-left:50px;">
		<div class="row">
                <div class="col-md-6"><h3>Categories:</h3></div>
                <div class="col-md-6"><a href="admin-quizz/create-category" class=""><button type="button" class="btn btn-primary">Add New Catagory</button></a></div>
            </div><h4>
            <div class="categoryItem">
            <div class="row">
            <div class="col-md-4">Catagory Name</div><div class="col-md-4">Catagory Description</div>
            <div class="col-md-2 text-center">Edit</div>
            <div class="col-md-2 text-center">
                Delete</div>
            </div>
            </div>
           </h4>
            @foreach($categories as $d)
            <div class="categoryItem">
            <div class="row">
            <div class="col-md-4">{{ $d->categoryname }}</div><div class="col-md-4">{{ $d->categorydesc }}</div>
            <div class="col-md-2 text-center"><a href="admin-quizz/edit-category/{{ $d->id }}"><button type="button" class="btn btn-primary">Edit</button></a></div>
            <div class="col-md-2 text-center">
                <div class="deletecat" catvar="{{ $d->id }}" catname="{{ $d->categoryname }}"><button type="button" class="btn btn-primary">Delete</button></div>
            </div>
            </div>
            </div>
            @endforeach
        </div>
        @endsection
        
  


