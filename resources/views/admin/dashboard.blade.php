@extends('admin.layouts.sidebar')
@section('content')
<script>
    const token = localStorage.getItem('token');
    if(!token){
      window.location.href = '/';
    }
    </script>
        <div class="main-content-1">
            <div class="new-post-button">
                <h1>Dashboard</h1>
            </div>

            <div class="dashboard-content">


                <div class="dashboard-stats">
                    <div class="user-stats">
                        <h2>Total Users</h2>
                        <!-- <p>200</p>  -->
                        <p>{{$countusers}}</p> 
                        <br>
                        <p><a href="{{route('users.list')}}" class="see-more-link">See More...</a></p>
                    </div>
                    <div class="post-stats">
                        <h2>Total Posts</h2>
                        <!-- <p>200</p> -->
                        <p>{{$countposts}}</p>
                        <br> 
                        <p><a href="{{route('posts.list')}}" class="see-more-link">See More...</a></p>
                    </div>
                </div>
            </div>
        </div>
    
</body>

</html>
@endsection
