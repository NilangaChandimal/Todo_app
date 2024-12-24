@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">ToDo List</h1>
            </div>
        </div>
        <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Enter the Task"
                                aria-label="default input example">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Task</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task->done == 0)
                                    <span class="badge bg-warning">Not Complete</span>
                                @else
                                    <span class="badge bg-success">Complete</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i
                                        class="far fa-trash-alt"></i></a>
                                <a href="{{ route('todo.done', $task->id) }}" class="btn btn-success"><i
                                        class="far fa-check-circle"></i></a>
                                <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-pencil"
                                        data-bs-toggle="modal" data-bs-target="#taskEdit"></i></a>
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
