@extends('admin.dashboard')
@section('admin_content')

    <!-- Row -->
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">User Managerment</h3>
                    <a class="btn btn-primary" href="{{ URL::to('/user/add') }}">Create User</a>
                </div>
                @if (Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                {{-- <th>Level</th>
                                <th>Status</th> --}}
                                <th data-orderable="false">Menu</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Birthday</th>
                                {{-- <th>Level</th>
                                <th>Status</th> --}}
                                <th data-orderable="false">Menu</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user_list as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->birthday }}</td>
                                    {{-- <td>{{ $value->level }}</td>
                                    <td>{{ $value->status }}</td> --}}
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu ">
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('/user/show/' . $value->id) }}">Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{URL::to('/user/delete/' . $value->id)}}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
