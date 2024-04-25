<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-grow: 1;
        }

        nav {
            flex: 0 0 250px;
            background-color: #212529;
            color: #fff;
            padding: 20px;
            order: -1;
        }

        nav h1 {
            margin-bottom: 30px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            margin-bottom: 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
        }

        /* Sidebar CSS (Preserved) */
        /* Replace or adjust as needed */
        /* Add your own sidebar CSS styles here */

        .sidebar {
            background-color: #212529;
            color: #fff;
            padding: 20px;
        }

        .sidebar h1 {
            margin-bottom: 30px;
            text-align: center;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
        }


        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .dashboard-stats {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .user-stats,
        .post-stats {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-right: 30px;
        }

        .user-stats h2,
        .post-stats h2 {
            margin-bottom: 10px;
        }

        .dashboard-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .see-more-link {
            
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>

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
        <div class="main-content">
            <div class="new-post-button">
                <h1>Dashboard</h1>
            </div>
            <div class="dashboard-content">


                <div class="dashboard-stats">
                    <div class="user-stats">
                        <h2>Total Users</h2>
                        <p>200</p> 
                        <br>
                        <p><a href="{{route('users.list')}}" class="see-more-link">See more...</a></p>
                    </div>
                    <div class="post-stats">
                        <h2>Total Posts</h2>
                        <p>200</p><br> 
                        <p><a href="{{route('posts.list')}}" class="see-more-link">See more...</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
