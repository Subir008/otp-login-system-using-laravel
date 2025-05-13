@extends('index')

@section('title' , 'Login')

@section('main')
    <div class="container form-con col-6 mt-5">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}">
                <span class="text-danger">
                    @error('email')
                    {{ $message }}
                    @enderror
                </span>
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpBlock" value="{{ old('password') }}">
                <span class="text-danger">
                    @error('password')
                    {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3" style="direction: rtl">
                <a href="{{ route('otplogin') }}" type="submit" class="btn btn-warning">Login With OTP</a>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

        </form>

         <!-- Toaster for warnings -->
       @if(Session('fail') )
        <div class="toast align-items-center border-0 position-fixed bg-danger" id="toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                        {{ session('fail')  }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    </div>
@endsection