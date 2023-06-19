@extends('layout.base')

@section('title', 'Requiter Dashboard')



@section('body')
    <style>
        .buton {
            background-color: rgb(59, 62, 216);
            color: white;
        }

        .buton:hover {
            background-color: rgb(59, 62, 216);
            color: white;
        }

        .btn {
            border-radius: 2px;
        }

        .btn:hover {
            outline: white;
        }
    </style>

    <div class="modal fade" id="modaladd" tabindex="-1" aria-labelledby="modaladdLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-1">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaladdLabel">Add Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('addjob') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" style="resize: none;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category" required>
                                @foreach ($cat as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Add Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('layout.nav')

    <main class="content py-4">
        <div class="container">
            <button class="btn btn-outline-success" data-toggle="modal" data-target="#modaladd">Add Job</button>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Requiter ID</th>
                        <th>Job Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Salary</th>
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobb as $j)
                        <tr>
                            <td>{{ $j->id }}</td>
                            <td>{{ $j->requiter_id }}</td>
                            <td>{{ $j->job_category->name }}</td>
                            <td>{{ $j->title }}</td>
                            <td>{{ $j->description }}</td>
                            <td>Rp.{{ $j->salary }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('getujob', $j->id)}}" method="GET">
                                        <button class="btn" data-toggle="modal" data-target="#modaledit">
                                            <img src="{{ asset('img/icon/edit.png') }}" alt="edit" width="30px">
                                        </button>
                                    </form>
                                    <form action="{{ route('deljob', $j->id) }}" method="POST">
                                        @csrf
                                        <button class="btn">
                                            <img src="{{ asset('img/icon/del.png') }}" alt="edit" width="30px">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </main>

@endsection
