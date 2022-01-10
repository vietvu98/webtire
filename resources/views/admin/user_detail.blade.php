@extends('admin.dashboard')
@section('admin_content')

        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Simple Tables -->
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            @foreach ($user_detail as $key => $value)
                            <tr>
                                <th>ID</th>
                                <td>{{$value->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$value->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$value->email}}</td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td>{{$value->password}}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{$value->level}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$value->status}}</td>
                            </tr>
                            <tr>
                                <th>Avatar</th>
                                <td><img src="{{ asset('upload/avatar/' . $value->image) }}" class="img-thumbnail"></td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{$value->created_at}}</td>
                            </tr>
                            <tr>
                                <th>Updated at</th>
                                <td>{{$value->updated_at}}</td>
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
