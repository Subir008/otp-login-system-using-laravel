@extends('index')

@section('title', 'Otp Verify')

@section('main')
    <div class="container form-con col-6 mt-5">
        <form action="{{ route('otpVerify') }}" method="post">
            @csrf
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <div class="mb-3">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <label for="otp" class="form-label">OTP</label>
                <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter Your Otp">
            </div>
            <div class="mb-3" style="direction: rtl">
                <button type="submit" class="btn btn-success">Login</button>
            </div>
        </form>

        <!-- Toaster for input warnings -->
        @if(session('error'))
            <div class="toast align-items-center border-0 position-fixed bg-danger " id="toast" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error')  }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif

    </div>
@endsection