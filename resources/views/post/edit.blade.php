@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3 p-2">
        @can('update',$post)
            <form action="{{route('Post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section class="form-group">
                    <input type="text" name="title" class="form-control" value="{{$post->title??old('title')}}">
                </section>
                <section class="form-group">
                    <input type="file" name="image" class="form-control">
                </section>
                <section class="form-group">
                <textarea name="text" class="form-control">
                    {{$post->title??old('title')}}
                </textarea>
                </section>
                <section class="form-group">
                    <input type="submit" value="submit" class="btn btn-info form-control">
                </section>
            </form>
        @endcan
    </section>
@endsection
