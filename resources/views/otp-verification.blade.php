@extends('index')

@section('title' , 'Otp')

@section('main')
<div class="container form-con col-6 mt-5">
        <form action="" method="">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success')}}
                </div>
            @endif
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="number" class="form-control" id="otp" placeholder="Enter Your Otp">
            </div>
            <div class="mb-3" style="direction: rtl">
                <button  type="submit" class="btn btn-success">Login</button>
            </div>

        </form>
    </div>
@endsection