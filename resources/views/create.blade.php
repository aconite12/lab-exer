
<form action="{{ route('blog.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required minlength="10">
        @error('title')<span>{{ $message }}</span>@enderror
    </div>

    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content" required minlength="100"></textarea>
        @error('content')<span>{{ $message }}</span>@enderror
    </div>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif


    <button type="submit">Create Post</button>
</form>