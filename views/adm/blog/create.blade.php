@extends('adm.masteradmin')
@section('title', 'Blog Application | Create Category')
@section('contentadmin')
 


    <h3>Create New Categories</h3>

    <form method="POST" action="/create-blog-action">
 
        {{ csrf_field() }}
 		
       <div>
       	<label for="categoryname">Blog Title</label><br>
          <input type="text" name="blogname" placeholder="Blog Name">
          <label for="blogdesc">Blog Content</label><br>
          <input type="text" name="blogdesc" placeholder="Blog Des">
            <br>
            <select name="catagory" id="catagory" multiple>
            	@foreach($cats as $d)
  				<option value="catagoryname">{{$d->categoryname}}</option>
  				@endforeach
			</select>
			
      </div>
      
      <div>
        <input type="submit" name="action" value="Cancel">
        <input type="submit" name="action" value="Create">
 
      </div>
 
    </form>  
   
 
@endsection
