@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row my-4">
        <div class="card broder border-2 border-top border-bottom border-danger">
            <div class="d-flex justify-content-between card-header">
                <h4>Edit Blog</h4>
                <a href="{{route('blog.index')}}" class="btn btn-primary">View Records</a>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{Session::get('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="{{route('blog.update', Crypt::encrypt($blog->id))}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        {{--
                            print all kind of errors in blade..
                            @foreach ($errors->all() as $item)
                                <span class="text-danger">{{$item}}</span>
                            @endforeach 
                        --}}
                        @csrf
                        <div class="col-12 col-md-6 mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" placeholder="Please enter title" value="{{ old('title' ,$blog->title) }}"/>
                            @error('title')
                                <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <label for="author_name" class="form-label">Author Name <span class="text-danger">*</span></label>
                            <input type="text" name="author_name" id="author_name" class="form-control @error('author_name')is-invalid @enderror" placeholder="Please enter author name" value="{{ old('author_name', $blog->author_name) }}"/>
                            @error('author_name')
                                <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                            <div class="">
                                <input type="radio" class="btn-check" name="status" id="success-outlined" autocomplete="off" value="1"  {{  old('status', $blog->status) == 1 ? "checked":"" }}/>
                                <label class="btn btn-outline-success" for="success-outlined">Active</label>
                                <input type="radio" class="btn-check" name="status" id="danger-outlined" autocomplete="off" value="2"   {{  old('status', $blog->status) == 2 ? "checked":"" }}/>
                                <label class="btn btn-outline-danger" for="danger-outlined">Inactive</label>
                            </div>
                            @error('status')
                                <span class="text-danger" >{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="10" rows="10" placeholder="Please enter description">{{ old('description' ,$blog->description) }}</textarea>
                        </div>
                        <div>
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection