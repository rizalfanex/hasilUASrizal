<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UAS APTEK - 2100519 Mochamad Rizal Fauzan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
            background-color: #f4f7fa;
            margin-top: 40px;
        }
        .header {
            background-color: #ffffff;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header h1 {
            font-size: 26px;
            text-align: center;
            color: #333;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
        }
        .btn-success, .btn-primary, .btn-danger {
            border-radius: 5px;
        }
        .table thead th {
            background-color: #f8f9fa;
            color: #333;
        }
        .table tbody td {
            color: #666;
        }
        .alert {
            border-radius: 5px;
        }
        .sidebar {
            min-height: 100vh;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
        .content {
            margin-left: 220px;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h4>Menu</h4>
    <ul class="nav flex-column">
        <li class="nav-item"><a href="#" class="nav-link text-white">Home</a></li>
        <li class="nav-item"><a href="{{ route('post.index') }}" class="nav-link text-white">Posts</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white">About</a></li>
    </ul>
</div>

<div class="content">
    <div class="container">
        <div class="header">
            <h1>UAS APTEK - 2100519 Mochamad Rizal Fauzan</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Notification using flash session data -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right">New Post</a>
                        <table class="table table-bordered mt-1">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">Pengaturan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->status == 0 ? 'Draft' : 'Publish' }}</td>
                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Are you sure?');"
                                            action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-muted" colspan="4">No data available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
