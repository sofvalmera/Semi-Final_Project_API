
    
    <style>
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
            display: flex;
            flex-direction: column;
        }

        .post-list {
            margin-top: 20px;
            flex-grow: 1;
        }

        .post-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .post-list table th,
        .post-list table td {
            padding: 8px;
            border-bottom: 1px solid #ccc;
        }

        .post-list table th {
            text-align: left;
        }

        .post-list table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .post-list table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .icon {
            width: 24px;
            height: 24px;
            fill: #007bff;
            vertical-align: middle;
        }

        .new-post-button {
            margin-top: auto;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        section {
            margin: 20px 0;
            font-family: Arial, sans-serif;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"],
       
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button,
        a-f {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
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
        
    <div>
        <div class="new-post-button">
            <h1>Create User</h1>

            <a href="{{route('users.list')}}" class="btn">Back</a>
        </div>
    </div>


<section>
    <div>
        <form>
            <div>								
               
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Name">	
                    <p></p>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email">	
                    <p></p>
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" placeholder="Phone">	
                    <p></p>
                </div>
                <div>
                    <label for="role">Role</label>
                    <input type="text" name="role" placeholder="Role">	
                    <p></p>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password">	
                    <p></p>
                </div>
                <div>
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password" placeholder="Confirm Password">	
                    <p></p>
                </div>
                
               
            </div>
            <div>
                <button type="submit">Create</button>
                <a-f href="{{route('users.list')}}">Cancel</a>
            </div>
        </form>
    </div>
</section>
        </div>
    </div>
</body>

</html>
