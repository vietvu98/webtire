@extends('admin.dashboard')
@section('admin_content')

    <!-- Form Basic -->
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create User</h6>
        </div>
        <div class="card-body">
            <form action="{{ URL::to('/user/store') }}" method="post" enctype="multipart/form-data">
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
                    <label for="txtName">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="txtName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="txtEmail">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="txtEmail" placeholder="Enter Mail">
                </div>
                <div class="form-group">
                    <label for="txtPassword">Password</label>
                    <input type="text" class="form-control" placeholder="Enter Password" name="txtPassword">
                </div>
                <div class="form-group" id="simple-date1">
                    <label for="simpleDataInput">Birthday</label>
                    <div class="input-group date">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="text" class="form-control" value="2002/06/06" id="simpleDataInput" name="dtBirthday">
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="select2SinglePlaceholder">Level</label>
                    <select class="select2-single-placeholder form-control" name="listLevel" id="select2SinglePlaceholder">
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="select2SinglePlaceholder1">Status</label>
                    <select class="select2-single-placeholder form-control" name="listStatus"
                        id="select2SinglePlaceholder1">
                        <option value="">Select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label>Avatar</label>
                        <div class="text-center" id="profile-container">
                            <img style="width: 300px; height: 300px;" id="profileImage" src="{{ asset('upload/avatar/users.png') }}"
                                class="rounded">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imageUpload" name="imgAvatar"
                                placeholder="Avatar">
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
        </div>
    </div>
@endsection
