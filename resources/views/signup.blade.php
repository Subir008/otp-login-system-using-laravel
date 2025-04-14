@extends('index')

@section('title', 'Sign Up')

@section('main')
    <div class="container form-con col-lg-6 mt-5">
        <form action="signup" method="post">
            @csrf
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="tel" class="form-control" name="contact" id="contact" placeholder="Enter Your Contact">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
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

@endsection

@section('js')
    <script >
    
    </script>
@endsection