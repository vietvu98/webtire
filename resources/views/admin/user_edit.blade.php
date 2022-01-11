@extends('admin.dashboard')
@section('admin_content')

    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
        </div>
        <div class="card-body">
            @foreach ($data_user as $item => $value)
                <form action="{{ URL::to('/user/update/' . $value->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="txtName">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="txtName" value="{{ $value->name }}" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="txtEmail">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="txtEmail" value="{{ $value->email }}" placeholder="Enter Mail">
                    </div>
                    <div class="form-group" id="simple-date1">
                        <label for="simpleDataInput">Birthday</label>
                        <div class="input-group date">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control" value="{{ $value->birthday }}" id="simpleDataInput"
                                name="dtBirthday">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Avatar</label>
                        <div class="text-center" id="profile-container">
                            <img style="width: 300px; height: 300px;" id="profileImage" src="{{ asset('upload/avatar/' . $value->image) }}" class="rounded">
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="imageUpload" name="imgAvatar" placeholder="Avatar">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
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
            @endforeach
        </div>
    </div>

@endsection
