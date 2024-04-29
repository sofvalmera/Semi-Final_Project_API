
@extends('admin.layouts.sidebar')
@section('content')
     
     
     <div class="main-content">
        
    <div>
        <div class="new-post-button">
            <h1>Edit User</h1>

            <a href="{{route('users.list')}}" class="btn btn-back">Back</a>
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
                <button type="submit" class="btn">Update</button>
                <a-f href="{{route('users.list')}}" class="btn btn-cancel">Cancel</a>
            </div>
        </form>
    </div>
</section>
        </div>
  @endsection