<style>
    .main{
        display: flex;
        justify-content: space-between;
    }
    .image-content img {
        height: 580px;
        
       
    }
    .side-content{
        background-color: grey;
        width: 100%;
        color: white;
        
    }
    h1 {
        font-size: 40px !important ;
        text-align: center;
        padding-top : 70px;
        font-weight: bold
    }
</style>
@extends('layouts.app')

@section('content')
      <div class="main" >
          <div class="side-content">
             <h1>Welcome to Blog Post .  You have to login First to Create Post.</h1>
          </div>
          <div class="image-content"> 
               <img src="{{asset('images/laptop.jpg')}}"
          <div>
      </div> 
@endsection