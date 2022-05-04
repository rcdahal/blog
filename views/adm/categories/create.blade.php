@extends('adm.masteradmin')
@section('title', 'Blog Application | Create Category')
@section('contentadmin')
 


    <h3>Create New Categories</h3>
    @if($errors->has())
  @foreach ($errors->all() as $error)
  <p class="yellow-text">{{ $error }}</p>
  @endforeach
  @endif

    <form method="POST" action="/create-category-action">
 
        {{ csrf_field() }}
 
       <div>
       	<label for="categoryname">Category Title</label><br>
          <input type="text" name="categoryname" placeholder="Category Name">
          <label for="categorydesc">Category Description</label><br>
          <input type="text" name="categorydesc" placeholder="Category Des">
            <label for="image">Upload Image</label><br>
          <input type="file" name="image" required><br>
      </div>
      <div>
        <input type="submit" name="action" value="Cancel">
        <input type="submit" name="action" value="Create">
 
      </div>
 
    </form>  
   
@endsection
