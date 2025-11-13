@extends('layouts.body')
@section('content')
    <div class="container grey-text">
        <div class="white row">
            <div class="card-header">
                <h4 class="center">Registered User</h4>
                </div>
                    @if($user)
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Your Name is</label>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label>Your Email is</label>
                            <p>{{ $user->email }}</p> 
                        </div>
                        <div class="mb-3">
                            <label>Your page is Created at</label>
                            <p>{{ $user->created_at->format('d-m-Y H:i') }}</p>
                        </div>
                </div>
                <div class="buttons">
                   <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>     
                <a href="{{ route('user.edit') }}" class="btn1 btn">Update profile</a>  
                </div>
            </div>
            @else
                <p>No user data available.</p>
            @endif
        </div>
    </div>
@endsection