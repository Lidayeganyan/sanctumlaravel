@extends('layouts.body')
@section('content')
<div class="container grey-text">
    <div class="white row">   
        <h4 class="center">Update your accont:)</h4>
        <div class="card-header">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"  autofocus>
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email', $user->email) }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-danger"> Save</button>
                    <button type="button" class="btn btn1" onclick="window.location='{{ route('account') }}'">Cancel</button>
                </div>  
            </form>
        </div>    
    </div>
</div>
@endsection