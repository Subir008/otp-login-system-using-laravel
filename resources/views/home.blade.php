@extends('index')

@section('title', 'Home')

@section('main')
    <div class="container">
        <h2 class="text-center text-white">Welcome To Otp Login System</h2>

        <!-- Toaster for warnings -->
        @if(Session::has('success'))
            <div class="toast align-items-center border-0 position-fixed bg-success" id="toast" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{Session::get('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
@endsection