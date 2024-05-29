@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="card broder border-2 border-top border-bottom border-danger">
                <div class="card-header d-flex justify-content-between">
                    <h4>Blog List</h4>
                    <a href="{{route('blog.create')}}" class="btn btn-primary">Add New Records</a>
                </div>
                <div class="card-body">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{Session::get('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Created_At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blog as $key => $item)
                            <tr>
                                <td>{{$key +1}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->slug}}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success f-6">Active</span>
                                    @else
                                        <span class="badge bg-danger f-6">Inactive</span>
                                    @endif
                                </td>
                                <td>{{$item->author_name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" class="btn btn-info">Edit</a>
                                        <form action="{{ route('blog.delete', Crypt::encrypt($item->id)) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
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