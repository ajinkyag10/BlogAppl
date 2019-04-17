@extends('blogs.layout')
@section('content')
<form method="POST" action="/blogs/{{ $blog->id }}">
   @method('PATCH')
   @csrf
   <div class="field">
      <label for="title" class="label">Title</label>
      <div class="control">
         <input type="text" class="input" placeholder="Enter Title" name="title" value="{{ $blog->title }}">
      </div>
   </div>
   <div class="field">
      <label for="description" class="label">Description</label>
      <div class="control">
         <textarea name="description" class="input" placeholder="Enter Description">{{ $blog->description }}</textarea>
      </div>
   </div>
   <div class="control">
      <button type="submit">Update</button>
   </div>
</form>
<form method="POST" action="/blogs/{{ $blog->id }}">
   @method('DELETE')
   @csrf
   <div class="control">
      <button type="submit">Delete</button>
   </div>
</form>
@endsection