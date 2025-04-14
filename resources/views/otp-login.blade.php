@extends('index')

@section('title','Otp Login')

@section('main')
<div class="container form-con col-6 mt-5">
        <form>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            

            <div class="mb-3" style="direction: rtl">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection