@extends('admin.dashboard')
@section('admin_content')
    <div class="row">
        <div style="max-width: 32%;" class="col-lg-6">
            <!-- Form Basic -->
            <div style="width: 500px" class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">CREATE ROLE</h6>
                </div>
                <div class="card-body">
                    <form action="{{ URL::to('/permission/add-role') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Role</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="txtRole"
                                placeholder="Enter Role">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sizing</h6>
                </div>
                <div class="card-body">
                    @foreach ($role_data as $key => $role)
                        <ul>
                            <a href="{{ URL::to('/permission/edit/' . $role->id) }}" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="far fa-edit"></i>
                                </span>
                                <span class="text">{{ $role->name }}</span>
                            </a>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div style="width: 1100px;" class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">PERMISSION SETTING</h6>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="card-body">
                    {{-- <form action=" {{ URL::to('/permission/store') }}" method="POST">
                        {{ csrf_field() }} --}}
                        <div class="form-group">
                            <label for="txtName">Name Role</label>
                        </div>
                        <div class="form-group">
                            <label>List Permission</label>
                            @foreach ($permission_data as $key => $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $permission->id }}"
                                        name="permissionList[]" value="{{ $permission->id }} ">
                                    <label class="custom-control-label"
                                        for="{{ $permission->id }}">{{ $permission->label }}</label> <br>
                                </div>
                            @endforeach
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
