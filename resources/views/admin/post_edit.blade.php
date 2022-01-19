@extends('admin.dashboard')
@section('admin_content')

    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            @foreach ($post_data as $key => $value)
            <form action="{{ URL::to('/post/update/' . $value->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                {{ csrf_field() }}
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <li style="color: red"> {{ $error }}</li>
                    @endforeach
                @endif
                @if (session('status'))
                    <li style="color: red"> {{ session('status') }}</li>
                @endif
                <div class="form-group">
                    <label for="txtTitle">Title</label>
                    <textarea name="txtTitle" id="ckeditor2" placeholder="Enter Title" class="form-control"
                            required>{{$value->title}}</textarea>
                </div>
                <div class="form-group">
                    <label for="txtContent">Content</label>
                    <textarea name="txtContent" id="ckeditor3" placeholder="Enter Content" class="form-control"
                            required>{{$value->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Posted By</label>
                    <select class="select2-single-placeholder form-control" name="listUser" id="select2SinglePlaceholder">
                        @foreach ($user_data as $key => $user)
                            <option value="">Select</option>
                            @if($value->user_id == $user->id)
                                <option value="{{$user->id}}"selected>{{$user->name}}</option>
                            @else
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endif    
                        @endforeach        
                    </select>
                </div>
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Status</label>
                    <select class="select2-single-placeholder form-control" name="listStatus">
                        <option value="">Select</option>
                        @if ($value->status == 'draft')
                            <option value="draft" selected>Draft</option>
                            <option value="published">Published</option>
                        @else
                            <option value="draft">Draft</option>
                            <option value="published" selected>Published</option>
                        @endif
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                        <div class="text-center" id="profile-container">
                            <img style="width: 300px; height: 300px;" id="profileImage" src="{{ asset('upload/post/' . $value->image) }}"
                                class="rounded mx-auto d-block">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageUpload" name="imgPost"
                                placeholder="Image Post">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                  </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @endforeach
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                $("#profileImage").click(function(e) {
                    $("#imageUpload").click();
                });

                function fasterPreview(uploader) {
                    if (uploader.files && uploader.files[0]) {
                        $('#profileImage').attr('src',
                            window.URL.createObjectURL(uploader.files[0]));
                    }
                }

                $("#imageUpload").change(function() {
                    fasterPreview(this);
                });
            </script>
        </div>
    </div>
@endsection
