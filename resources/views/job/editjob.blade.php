@extends('layout.base')

@section('title', 'Edit Job')

@section('body')

@include('layout.nav')

<main class="content py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Job</div>

                    <div class="card-body">
                        <form action="{{ route('editjob', $j->id) }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $j->title }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" style="resize: none;" required>{{ $j->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary" value="{{ $j->salary }}" required>
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    @foreach ($cat as $category)
                                        <option value="{{ $category->id }}" {{ $j->job_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 rounded-1">Update Job</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('layout.footer')

@endsection
