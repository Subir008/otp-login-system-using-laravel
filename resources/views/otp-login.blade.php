@extends('index')

@section('title', 'Otp Login')

@section('main')
    <div class="container form-con col-6 mt-5">
        <form action="{{ route('generate') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            </div>

            <div class="mb-3" style="direction: rtl">
                <button type="submit" class="btn btn-success">Generate OTP</button>
                <a href="{{ route('login') }}" type="submit" class="btn btn-danger">Login With Password</a>
            </div>
        </form>
    </div>

       <!-- Toaster for input warnings -->
       @if(session('error') )
        <div class="toast align-items-center border-0 position-fixed " id="toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                        {{ session('error')  }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

@endsection