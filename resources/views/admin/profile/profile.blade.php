@extends('admin.layouts.sidebar')
@section('content')
<div class="main-content">
    <div>
        <div class="new-post-button">
            <h1>Your Profile</h1>
           
        </div>
    </div>

    <section>
        <div>
            <form>
                <div>
                    <div>
                        <label for="profile-picture">Profile Picture</label>
                        
                        <input type="file" id="profile-picture" name="profile-picture">
                        
                        <img id="profile-picture-preview" src="#" alt="Profile Picture Preview" style="max-width: 200px; display: none;">
                    </div>
                    <br>
                    <div>
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" placeholder="Name">
                        <p></p>
                    </div>
                    <div>
                        <label for="age">Age</label>
                        <input type="number" name="age" id="age" placeholder="Age">
                        <p></p>
                    </div>
                    <div>
                        <label for="Address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address">
                        <p></p>
                    </div>
                    <div>
                        <label for="gender">Gender</label>
                        <input type="text" name="gender" id="gender" placeholder="Gender">
                        <p></p>
                    </div>
                    <div>
                        <label for="phonenumber">Phone Number</label>
                        <input type="number" name="phonenumber" id="phonenumber" placeholder="Phone Number">
                        <p></p>
                    </div>
                    <div>
                        <label for="email">Personal Email Address</label>
                        <input type="email" name="email" id="email" placeholder="Email">
                        <p></p>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn">Update</button>
                    <a href="{{route('profile.profile')}}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </section>
</div>

<!-- JavaScript for image preview -->
<script>
    // Function to display image preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-picture-preview').attr('src', e.target.result).show();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Trigger image preview when a new file is selected
    $("#profile-picture").change(function(){
        readURL(this);
    });
</script>
@endsection
