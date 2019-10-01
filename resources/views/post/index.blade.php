@extends('layouts.master')
@section('content')
    <section class="col-6 offset-3">
        <h2 class="text-center">
            {{\Illuminate\Support\Facades\Auth::user()->name.__(' is login') }}</h2>
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th>id</th>
                <th>title</th>
                <th>image</th>
                <th>show</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($post as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td><img src="{{asset("images/post/".$item->image)}}" width="50px" height="50px" alt=""></td>
                    <td><a href="{{route('Post.show',$item->id)}}">show</a></td>
                    <td><a href="{{route('Post.edit',$item->id)}}">update</a></td>
                    <td>
                        <form action="{{route('Post.destroy',$item->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="delete" class="btn btn-danger form-control">
                        </form>
                    </td>
                    <td>
                        {{$item->user->name}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@endsection
