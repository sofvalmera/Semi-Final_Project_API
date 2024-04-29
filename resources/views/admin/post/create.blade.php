
@extends('admin.layouts.sidebar')
@section('content')
 <div class="main-content">

            <div>
                <div class="new-post-button">
                    <h1>Create Post</h1>

                    <a href="{{route('posts.list')}}" class="btn btn-back">Back</a>
                </div>
            </div>


            <section>
                <div>
                    <form>
                        <div>
                            <div>
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Title">
                                <p></p>
                            </div>
                            <div>
                                <label for="name">Author</label>
                                <input type="text" name="name" placeholder="Name">
                                <p></p>
                            </div>
                            <div>
                                <label for="project">Project Name</label>
                                <input type="text" name="project" placeholder="Project Name">
                                <p></p>
                            </div>
                            <div>
                                <label for="date">Published Date</label>
                                <input type="date" name="date" placeholder="Date">
                                <p></p>
                            </div>
                            <div>
                                <label for="description">Description</label>
                                <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn">Create</button>
                            <a-f href="{{route('posts.list')}}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>




@endsection
       
   