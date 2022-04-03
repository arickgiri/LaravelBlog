<style>
    .show {
        text-align: center;
    }
    h1.title{
        font-size: 60px !important;
        margin-top: 20px;
    }
    p.user-name {
        margin-left: 100px;
        margin-top: 20px;

    }
    .views{
        margin-top: 20px;
        margin-left: 325px;
    }
    .description{
        margin-top: 20px;
        font-size: 30px;
    }
</style>


@extends('layouts.app')

@section('content')
        <div class="show">
                 <h1 class="title">{{$post->title}}</h1>
                  <p class="user-name">by- <b>{{$post->user->name}}</b></p>
                  <p class="views "> <i class="fa fa-eye"></i> {{$post->views}} views ,
                 <span> Created on  {{date ('jS M Y',strtotime($post->created_at))}} </span>

                 <p class="description">{{$post->description}}</p>
        </div>
@endsection