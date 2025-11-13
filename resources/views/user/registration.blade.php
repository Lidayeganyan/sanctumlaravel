
@extends('layouts.body')
@section('content')
    <section class="container grey-text">
        <form class="white" action="{{ route('registration.store') }}" method="POST">
            @csrf
            <h4 class="center">Registration</h4>

            <div class="dv">
                  <input type="text" name="name" placeholder="Enter your Name" autocomplete="name">
                  @error('name')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="dv">
                <input type="text" name="email" placeholder="Enter your Email" autocomplete="email">
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="dv">
                <input type="password" name="password" placeholder="Enter your Password" autocomplete="new-password">
                @error('password')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="dv">
                <input type="password" name="confirm_password" placeholder="Confirm Password" autocomplete="new-password">
                @error('confirm_password')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <input type="submit" value="Register" class="btn">
            <p class="issue">Are you have a account?
               <a href="{{ url('login') }}">Login</a>
            </p>
        </form>    
    </section>
@endsection