@extends('layouts.admin')

@section('page-title')
    {{__('Manage Videos')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Dashboard')}}</a></li>
    <li class="breadcrumb-item">{{__('Videos')}}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="m-3">
                    <form action="{{route('add-video')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="url" class="form-control" name="url" placeholder="Enter URL">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3 pt-4">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">URL</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{$video->id}}</td>
                                    <td>{{$video->title}}</td>
                                    <td>{{$video->url}}</td>
                                    <td>
                                        <a href="{{route('delete-video', ['id'=>$video->id])}}"><i class="ti ti-trash" style="color: red"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
