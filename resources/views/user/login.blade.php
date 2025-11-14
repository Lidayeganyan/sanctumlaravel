
@extends('layouts.body')
@section('content')
    <section class="container grey-text">
        <form class="white" action="{{ route('login.store') }}" method="POST">
            @csrf
            <h4 class="center">Login</h4>
            <div class="dv">
                <input type="text" name="email" placeholder="Enter your email" value="{{old('email')}}">
                @error('email') <span class="text-danger">{{ $message  }}</span>@enderror
            </div>
            <div class="dv">
                <input type="password" name="password" placeholder="Enter your password">
                @error('password') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <input type="submit" value='Login'  class="btn"> 
            <p class="issue">Are you haven't a account?
               <a href="{{ url('registration') }}">Sign in</a>
            </p>
        </form>    
    </section>
@endsection