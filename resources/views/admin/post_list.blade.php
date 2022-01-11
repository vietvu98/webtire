@extends('admin.dashboard')
@section('admin_content')

    <!-- Row -->
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary">Post Managerment</h3>
                    <a class="btn btn-primary" href="{{ URL::to('/post/add') }}">Create Post</a>
                </div>
                @if (Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th data-orderable="false">Menu</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th data-orderable="false">Menu</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($post_list as $key => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{!! nl2br($value->title) !!}</td> 
                                    <td style="width: 100%; display: -webkit-box;
                                    line-height: 25px;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    -webkit-line-clamp: 6;
                                    -webkit-box-orient: vertical;">{!! nl2br($value->content) !!}</td>
                                    <td>{{ $value->status }}</td>
                                    <td><img style="width: 200px; height: 200px;" id="profileImage" src="{{ asset('upload/post/' . $value->image) }}" class="rounded">
                                    </td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu ">
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('/post/show/' . $value->id) }}">Detail</a>
                                                    <a class="dropdown-item"
                                                    href="{{ URL::to('/post/edit/' . $value->id) }}">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{URL::to('/post/delete/' . $value->id)}}">Delete</a>
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
