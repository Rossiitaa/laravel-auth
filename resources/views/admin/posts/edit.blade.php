@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container-lg">
        <h2 class="mb-3">Edit Post</h2>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.posts.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection