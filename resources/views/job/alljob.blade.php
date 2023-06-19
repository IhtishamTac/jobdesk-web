@extends('layout.base')

@section('title', 'Job List')

<style>
    .badge {
        background-color: rgb(50, 99, 205);
        padding: 4px 8px;
        right: 0;
        bottom: 0;
    }
    .card-body p {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>

@section('body')

    @include('layout.nav')

    <main class="content py-4">
        <div class="container">
            <div class="row">
                @foreach ($jobs as $j)
                <div class="col-6">
                    <div class="card d-flex">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset($j->requiter->company_pic) }}" alt="pt" class="img-fluid">
                            </div>
                            <div class="col-9">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <h3>{{ $j->requiter->company_name }}</h3>
                                    </div>
                                    <p class="text-right">{{ $j->description }}</p>
                                </div>
                            </div>
                        </div>
                        <span class="badge">Salary : Rp. {{ $j->salary }}</span>
                        <form action="{{ route('applyjob') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-success w-100">Apply for the job</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('layout.footer')

@endsection
