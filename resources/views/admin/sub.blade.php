@extends('Layout.index')

@section('title')
Add Subcategory
@endsection

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<h2>Add Subcategory</h2>

<form action="{{ route('admin.subcategory.store') }}" method="POST" enctype="multipart/form-data">

@csrf

<div style="margin-bottom:15px;">
<label>Select Category</label>
<br>

<select name="category_id" required style="width:300px;padding:8px;">

<option value="">Select Category</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>

</div>


<div style="margin-bottom:15px;">
<label>Subcategory Name</label>
<br>
<input type="text" name="name" required style="width:300px;padding:8px;">
</div>


<div style="margin-bottom:15px;">
<label>Subcategory Image</label>
<br>
<input type="file" name="image">
</div>


<div style="margin-bottom:15px;">
<label>Status</label>
<br>

<select name="status" style="width:300px;padding:8px;">
<option value="active">Active</option>
<option value="inactive">Inactive</option>
</select>

</div>


<button type="submit" style="
padding:10px 20px;
background:#4f46e5;
color:white;
border:none;
border-radius:6px;
cursor:pointer;
">
Add Subcategory
</button>

</form>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))

<script>

Swal.fire({
icon:'success',
title:'Success',
text:'{{ session('success') }}',
confirmButtonColor:'#4f46e5'
})

</script>

@endif

@endsection