@extends('Layout.index')

@section('title')
Add Category
@endsection

@section('content')

<style>
.category-container{
    max-width:700px;
    margin:40px auto;
}

.category-card{
    background:white;
    padding:35px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.category-card h2{
    font-size:26px;
    font-weight:600;
    margin-bottom:25px;
    color:#374151;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    font-weight:500;
    margin-bottom:6px;
    color:#374151;
}

.form-control{
    width:100%;
    padding:10px 12px;
    border:1px solid #d1d5db;
    border-radius:6px;
    font-size:14px;
}

.form-control:focus{
    outline:none;
    border-color:#6366f1;
    box-shadow:0 0 0 2px rgba(99,102,241,0.15);
}

.image-preview{
    width:150px;
    height:150px;
    border:2px dashed #d1d5db;
    border-radius:10px;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    margin-top:10px;
}

.image-preview img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.btn-submit{
    background:#4f46e5;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:6px;
    font-size:14px;
    cursor:pointer;
}

.btn-submit:hover{
    background:#4338ca;
}

.btn-back{
    margin-left:10px;
    background:#e5e7eb;
    color:#374151;
    padding:10px 18px;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
}

.btn-back:hover{
    background:#d1d5db;
}
</style>

<div class="category-container">

<div class="category-card">

<h2>Add Category</h2>

<form action="/admin/category/store" method="POST" enctype="multipart/form-data">

@csrf

<div class="form-group">
<label>Category Name</label>
<input type="text" name="category_name" class="form-control" placeholder="Enter category name">
</div>

<div class="form-group">
<label>Category Slug</label>
<input type="text" name="slug" class="form-control" placeholder="category-slug">
</div>

<div class="form-group">
<label>Category Image</label>
<input type="file" name="photo" class="form-control" onchange="previewImage(event)">

<div class="image-preview">
<img id="preview" src="" style="display:none;">
<span id="placeholder">Preview</span>
</div>
</div>

<div class="form-group">
<label>Status</label>
<select name="status" class="form-control">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>

<button type="submit" class="btn-submit">
<i class="fa-solid fa-plus"></i> Add Category
</button>

<a href="/admin/products" class="btn-back">
<i class="fa-solid fa-arrow-left"></i> Back
</a>

</form>

</div>

</div>

<script>
function previewImage(event){
    const reader = new FileReader();
    reader.onload = function(){
        const img = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');

        img.src = reader.result;
        img.style.display = 'block';
        placeholder.style.display = 'none';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
