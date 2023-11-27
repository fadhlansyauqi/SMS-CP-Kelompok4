@extends('auth.master')

@section('content')
<!--begin::Signup-->
<div class="text-center pb-13 pt-lg-0 pt-5">
    <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Hi there!</h3>
    <p class="text-muted font-weight-bold font-size-h4">Seems like you dont have an account?</p>
    <a href="https://wa.me/087775543485" class="text-primary font-weight-bolder" id="kt_login_signup">Contact admin</a>
    <div class="text-center">
        <a href="{{ route('login') }}">
            <button type="button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Back to Login</button>
        </a>
    </div>
    
</div>
@endsection