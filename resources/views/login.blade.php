@extends('index')

@section('title' , 'Login')

@section('main')
    <div class="container form-con col-6 mt-5">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
            </div>

            <div class="mb-3" style="direction: rtl">
                <a href="{{ route('otplogin') }}" type="submit" class="btn btn-warning">Login With OTP</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>
    </div>
@endsection