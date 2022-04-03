<style>
    textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    input[type=text] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
    }

    label {
        font-size: 30px;
        font-weight: bold;
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .form-group {
        margin: 60px;
    }

    .button {
        background-color: #233876;
        /* Green */
        border: none;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    button {
        margin-left: 202px !important
    }

    .button3 {
        padding: 14px 40px;
    }
</style>


@extends('layouts.app')

@section('content')
<div class="form-group">


    <form method="post" action="/blog/edit/{{$post->slug}}" enctype="multipart/form-data"> @csrf
       
    <label for="title">Title</label>
        <input type="text" id="title" name="title" value ="{{$post->title}}">
        <label for="description">Description</label>
        <textarea type="text"  name='description'>{{$post->description}}</textarea>
        
        <button class="button button3">Submit</button>
    </form>
</div>
@endsection