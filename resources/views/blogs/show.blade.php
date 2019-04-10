@extends('blogs.layout')
@section('content')
<div class="card ">
   <h5 class="card-header">{{ $blogdetails->title}}</h5>
   <div class="card-body">
      <p class="card-text">{{ $blogdetails->description }}</p>
   </div>
</div>
<form method="POST" action="/blogs/{{ $blogdetails->id }}">
@csrf

<div class="field">
   <label for="Name" class="label">Name</label>
   <div class="control">
      <input type="text" class="input {{ $errors->has('name') ? 'is-danger':''}}" placeholder="Enter name" name="name" value="{{ old('name') }}">
   </div>
</div>
<div class="field">
   <label for="Email" class="label">Email</label>
   <div class="control">
      <input type="email" class="input {{ $errors->has('email') ? 'is-danger':''}}" placeholder="Enter email" name="email">
   </div>
</div>
<div class="field">
<label for="comment" class="label">Comment</label>
<div class="control">
   <textarea name="comment" class="input {{ $errors->has('comment') ? 'is-danger':''}}" placeholder="Enter Comment">{{ old('comment') }}</textarea>
</div>
<div class="control">
   <div class="row">
      <div class="col my-3">
      

         <button type="submit" class="btn btn-primary">Submit</button> 
         @if($errors->any())
<div class="notification is-danger">
   <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}
         @endforeach
   </ul>
</div>
@endif
         <div class="container jumbotron  my-3">
            <h3 class="text-info">Comments</h3>
            @foreach( $comments  as $comment)
            <h5><b>{{ $comment->name }}</b></h5>
            <p>{{ $comment->comment }}</p>
            <hr class="border-primary">
            @endforeach
         </div>
      </div>
   </div>
</div>
<form>
@endsection