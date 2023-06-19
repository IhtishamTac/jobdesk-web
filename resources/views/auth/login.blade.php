@extends('layout.base')

@section('title', 'Login Page')

@section('body')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" id="remember" name="remember" class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Remember Me</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" style="border-radius: 2px;">Login</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">Don't have an account? <a href="#">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
