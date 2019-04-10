@extends('blogs.layout')
@section('content')
<form method="POST" action="/blogs">
@csrf
<div class="field">
   <label for="title" class="label">Title</label>
   <div class="control">
      <input type="text" class="input  {{ $errors->has('title') ? 'is-danger':''}}" placeholder="Enter Title" name="title" value="{{ old('title') }}">
   </div>
</div>
<div class="field">
   <label for="description" class="label">Description</label>
   <div class="control">
      <textarea name="description" class="input {{ $errors->has('description') ? 'is-danger':''}}" placeholder="Enter Description">{{ old('title') }}</textarea>
   </div>
</div>
<div class="control">
   <button type="submit">Create Blog</button>
</div>
@if($errors->any())
<div class="notification is-danger">
   <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}
         @endforeach
   </ul>
</div>
@endif
<form>
@endsection