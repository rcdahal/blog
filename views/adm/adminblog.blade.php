@extends('adm.masteradmin')
@section('title', 'Blog Application')
@section('contentadmin')

            <div class="row">
                <div class="col-md-6"><h3>BLog:</h3></div>
                <div class="col-md-6 text-right"><a href="admin-blog/create-category" class="newcatBtn">Add New Blog</a></div>
            </div>
            
            @foreach($categories as $d)
            <div class="categoryItem">
            <div class="row">
            <div class="col-md-8"><a href="admin-quizz/category/{{ $d->id }}">{{ $d->categoryname }}</a></div>
            <div class="col-md-2 text-center"><a href="admin-quizz/edit-category/{{ $d->id }}">Edit</a></div>
            <div class="col-md-2 text-center">
                <div class="deletecat" catvar="{{ $d->id }}" catname="{{ $d->categoryname }}">Delete</div>
            </div>
            </div>
            </div>
            @endforeach

   
    </script>

@endsection
