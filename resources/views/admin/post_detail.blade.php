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
                            @foreach ($post_detail as $key => $value)
                            <tr>
                                <th>ID</th>
                                <td>{{$value->id}}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{!! nl2br($value->title) !!}</td>
                            </tr>
                            <tr>
                                <th>Content</th>
                                <td>{!! nl2br($value->content) !!}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{$value->status}}</td>
                            </tr>
                            <tr>
                                <th>Posted By</th>
                                <td>{{$value->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Avatar</th>
                                <td><img style="width: 300px; height: 300px;" src="{{ asset('upload/post/' . $value->image) }}" class="img-thumbnail"></td>
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
