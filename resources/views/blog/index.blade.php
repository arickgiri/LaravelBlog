<style>
    div.container {
    text-align: center;
    padding: 10px 20px;
  }
  div.blog-card {
   
    
    margin-top: 100px;
    margin-left:50px;
    width: 30%;
    background-color: white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-bottom: 25px;
  }

 
.row {
    margin-top: 50px;
    margin-left: 200px;
    display: flex;
    flex-wrap: wrap;
    
}
.button-row{
    margin-top: 50px;
    margin-left: 250px;
}
.button a {
  background-color: #233876;
  border: none;
  color: white;  
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
.button1 a {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.container a {
    color:blue
}
.container a:hover {
       color: greenyellow;
}
.message {
    font-size: 20px;
    text-align: center;
    color:blue;
    font-weight: bold;
}
.container h1 {
  font-size: 20px;
}
</style>

@extends('layouts.app')
@section('content')

@if(session()->has('message'))
  <div class="message">
       {{session()->get('message')}}
  </div>
@endif
@if(Auth::check())
<div class="button-row"> 
   <button class="button button1"><a href="{{route('create.post')}}"> Create Post</a></button>
</div>
@endif
<div class="row">
  @foreach($posts as $post)
    <div class="blog-card">
        <img src="{{asset('images/' . $post->image_path)}}" alt="5 Terre" style="width:100%">
        <div class="container">
            <h1>{{$post->title}}</h1>
            <p><b>by- {{$post->user->name}}</b></p>
            <span> Created on  {{date ('jS M Y',strtotime($post->created_at))}} </span>
            <p> <i class="fa fa-eye"></i> {{$post->views}} views </p>
            <p>{{$post->description}} </p>
            <a href="/blog/show/{{$post->slug}}"><p>Read More</p></a>
            @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <button><a style="margin-right:150px" href="blog/edit/{{ $post->slug}}">edit</a></button>
            <button><a style="margin-left:150px;  color:red ; padding-bottom:20px;" href="blog/delete/{{$post->id}}">delete</a></button>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection