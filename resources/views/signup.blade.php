@extends('index')

@section('title', 'Sign Up')

@section('main')
    <div class="container form-con col-lg-6 mt-5">
        <form action="signup" method="post">
            @csrf
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" name="contact_no" id="contact" placeholder="Enter Your Contact"
                    value="{{ old('contact_no') ?? '' }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                    value="{{ old('email') ?? '' }}">
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    aria-describedby="passwordHelpBlock">
                <div id="passwordHelpBlock" class="form-text">
                    Your password must be 8-20 characters long, contain letters and numbers, and must not contain
                    spaces, special characters, or emoji.
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

    <!-- Toaster for input warnings -->
    @if(session('contact') || session('email') || session('password'))
        <div class="toast align-items-center border-0 position-fixed " id="toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    @if (session('contact'))
                        {{ session('contact')  }}
                        <br>
                    @endif

                    @if (session('email'))
                        {{ session('email') }}
                        <br>
                    @endif

                    @if (session('password'))
                        {{ session('password') }}
                        <br>
                    @endif
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif

@endsection

@section('js')
    <script>
        $(document).ready(function () {
            var toast1 = document.getElementById('toast');
            var myToast = new bootstrap.Toast(toast1);

            myToast.show();
        });
    </script>
@endsection