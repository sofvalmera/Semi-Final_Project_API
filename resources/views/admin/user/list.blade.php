
@extends('admin.layouts.sidebar')
@section('content')
<div class="main-content">

            <div class="new-post-button">
                <h1>Users</h1>
                <a href="{{route('users.create')}}" class="btn btn-back">Add User</a>
            </div>
            <div class="post-list">
                <table>
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th width="100">Action</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <tr>
                            <td>1</td>
                            <td>dgr</td>
                            <td>sfddsfds</td>
                            <td>dfsdfdsf</td>
                            <td>sdadasd</td> -->
                            <!-- <td>Edit</td>
                            <td>Delete</td> -->
                            <!-- <td>
                            <a href="{{route('users.edit')}}">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill="#007bff" d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="#" class="text-danger w-4 h-4 mr-1">
                                    <svg class="icon-d" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill="#ff0000" fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody> -->
                    <tbody id="userstable">
     
                    </tbody>
                </table>
            </div>
        </div>
    <script>
         document.addEventListener('DOMContentLoaded', function(){
    
   
    fetch("http://127.0.0.1:8000/api/getallusers",{
        method: 'GET'
      
    })
    .then((res)=>{
        return res.json();
    })
    .then(data => {
        console.log(data);
        for(var i=0; i< data.length; i++){
            var row = "<tr>" +
             
                "<td>" + data[i].id + "</td>" +
                "<td>" + data[i].name + "</td>" +
                "<td>" + data[i].email + "</td>" +
                "<td>" + data[i].phone + "</td>" +
                "<td>" + data[i].role + "</td>" +
                "<td>" + 
                    `<a href="{{route('users.edit')}}">
                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill="#007bff" d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                    </a>` +
                    `<a href="#" class="text-danger w-4 h-4 mr-1">
                    <svg class="icon-d" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill="#ff0000" fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    </a>` +
                   
                "</td>" +
                "</tr>";
                document.getElementById('userstable').innerHTML += row;
        }
    })
    .catch(error=>{
        console.error('something went wrong!', error);
    })
    

});
    </script>


@endsection
       
   