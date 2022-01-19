@extends('admin.dashboard')
@section('admin_content')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                    <a data-toggle="modal" data-target="#exampleModal" id="#myBtn" class="btn btn-info">
                        <i class="fas fa-user-shield"></i>
                    </a>
                </div>
                @foreach ($user_detail as $key => $value)
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Role Setting</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ URL::to('/user/update-role/' . $value->id) }}" method="POST">
                                        @method('put')
                                        {{ csrf_field() }}
                                        <div class="form-group">

                                            <input type="hidden" class="form-control" name="userId" value="{{ $value->id }}">
                                            <h5>Name:   {{ $value->name }}</h5>
                                        </div>
                                        <div class="form-group">
                                            <label>List Role</label>
                                            @foreach ($roles as $key => $role)
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="{{ $role->id }}" name="roleList[]"
                                                        value="{{ $role->id }} "
                                                        {{ $value->roles->contains('id', $role->id) ? 'checked' : '' }}>
                                                    <label class="custom-control-label"
                                                        for="{{ $role->id }}">{{ $role->name }}</label> <br>
                                                </div>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">

                            <tr>
                                <th>ID</th>
                                <td>{{ $value->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $value->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $value->email }}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>{{ $value->password }}</td>
                            </tr>
                            {{-- <tr>
                                <th>Level</th>
                                <td>{{$value->level}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$value->status}}</td>
                            </tr> --}}
                            <tr>
                                <th>Avatar</th>
                                <td><img style="width: 300px; height: 300px;"
                                        src="{{ asset('upload/avatar/' . $value->image) }}" class="img-thumbnail"></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $value->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated at</th>
                                <td>{{ $value->updated_at }}</td>
                            </tr>
                @endforeach
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    </div>
    <!--Row-->
@endsection
