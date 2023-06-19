@extends('layout.base')

@section('title', 'Dashboard')

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

    @include('layout.nav')

    <main class="content py-4">
        <div class="container">
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
                                        <button class="btn">
                                            <img src="{{ asset('img/icon/edit.png') }}" alt="edit" width="30px">
                                        </button>
                                    </form>

                                    <form action="{{ route('deljob', $j->id) }}" method="POST">
                                        @csrf
                                        <button class="btn">
                                            <img src="{{ asset('img/icon/del.png') }}" alt="delete" width="30px">
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
