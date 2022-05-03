@extends('adm.masteradmin')
@section('title', 'Blog Application')

@section('style')
<style>
.mce-notification-warning {display: none;}
</style>
@endsection

@section('contentadmin')

<div class="container"style="margin-left:50px;">
   <div class="row">
   	<div class="col-md-6">
        <button  ><a href="/admin-cat">Catagory</a></button>
    </div>
     	<div class="col-md-6">
        <button ><a href="/admin-blog">Blog</a></button>
    </div>
   
</div>

@endsection

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
<script>
tinymce.init({
    selector:'textarea.content',
    width: 900,
    height: 300,
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
});

    $(document).ready(function(e){
    $('.leftMenu .intr').addClass('selected');
    });
    
</script>