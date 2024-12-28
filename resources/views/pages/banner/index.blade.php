@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Banner List</h1>
            </div>
        </div>
        <form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" name="title" type="text" placeholder="Enter Banner Title" required>
                    </div>
                    <div class="mt-5 form-group">
                        <input class="form-control dropify" name="images" type="file"
                            accept="image/jpg, image/jpeg, image/png" required>
                    </div>
                </div>
                <div class="mt-4 text-center col-lg-8">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $key => $banner)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $banner->title }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $banner->Images->name) }}" class="table-img" alt="Image not found" width="50px" height="50px">
                            </td>
                            <td>
                                @if ($banner->status == 0)
                                    <span class="badge bg-warning">Draft</span>
                                @else
                                    <span class="badge bg-success">Published</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('banner.delete', $banner->id) }}" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i></a>
                                <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-success"><i
                                        class="far fa-check-circle"></i></a>
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-pencil"
                                        data-bs-toggle="modal" data-bs-target="#bannerEdit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- <div class="modal fade" id="taskEdit" tabindex="-1" aria-labelledby="taskEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="taskEditLabel">Main Task Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="taskEditContain">
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 2rem;
            color: #d12120;
        }

        .table {
            padding-top: 5vh;
            /* width: 80%; */
        }
    </style>
@endpush
