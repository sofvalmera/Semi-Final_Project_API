
@include('admin.layouts.header')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/css/sidebar.css')}}">
<body>
    <div class="container">
        <nav>
            <h1>Logo123 ni</h1>
            <ul>
                <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('posts.list')}}">Post</a></li>
                <li><a href="{{route('users.list')}}">User</a></li>
                <li><a href="{{route('front.login')}}">Logout</a></li>
            </ul>
        </nav>
        @yield('content')
    </div>
    
</body>




</html>

        