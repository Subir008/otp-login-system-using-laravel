@extends('index')

@section('title' , 'Login')

@section('main')
    <div class="container form-con col-6 mt-5">
        <form>
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class=" mb-3">
                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            </div>

            <div class="mb-3" style="direction: rtl">
                <a href="{{ route('otplogin') }}" type="submit" class="btn btn-warning">Login With OTP</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>
    </div>
@endsection