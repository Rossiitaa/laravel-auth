@extends("layouts.app")

@section('content')
    <div class="container">
        @if (session("deleted"))
            <div class="warn delete-warn">
                Post deleted.
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <td>ID</td>
                        <td>Username</td>
                        <td>Title</td>
                        <td>Date</td>
                        <td></td>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td><a href="{{ route("admin.posts.show", $post->id) }}">{{ $post->title }}</a></td>
                                <td>{{ $post->user }}</td>
                                <td>{{ $post->date }}</td>
                                <td class="d-flex">
                                    <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ route("admin.posts.destroy", $post->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm text-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <h2>There are no posts.</h2>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection