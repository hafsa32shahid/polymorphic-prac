<h1>hello world</h1> {{-- this is new line --}}

<form action="{{ route('posts.destroy', 1) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Post</button>
</form>

