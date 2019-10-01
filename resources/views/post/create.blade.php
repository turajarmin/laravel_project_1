@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3 p-2">
        <form action="{{route('Post.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <input type="text" name="title" class="form-control">
            </section>
            <section class="form-group">
                <input type="file" name="image" class="form-control">
            </section>
            <section class="form-group">
                <textarea name="text" class="form-control"></textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-info form-control">
            </section>
        </form>
    </section>
@endsection
