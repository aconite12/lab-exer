<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog App</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-5">

        {{-- Display Success Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Create Post Button --}}
        <div class="mb-4">
            <a href="{{ route('post_blog') }}" class="btn btn-success">
                Create New Post
            </a>
        </div>

        {{-- Logout Button --}}
        <div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>
        </div>

        {{-- Display Blog Posts --}}
        @if ($posts->isEmpty())
            <p>No blog posts available.</p>
        @else
            <div class="mt-4">
                <h1 class="mb-4">All Blog Posts</h1>
                <ul class="list-group">
                    @foreach ($posts as $post)
                        <li class="list-group-item mb-3">
                            <a href="{{ route('blog.index', $post->id) }}" class="h5 text-decoration-none">
                                <strong>{{ $post->title }}</strong>
                            </a>
                            <p>{{ Str::limit($post->content, 150) }}...</p>
                            <small class="text-muted">Posted on: {{ $post->created_at->format('M d, Y') }}</small>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

    <!-- Bootstrap JS and Popper.js (optional, but needed for certain components like dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
