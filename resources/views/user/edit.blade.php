@extends('layouts.body')
@section('content')
<div class="container grey-text">
    <h4>If you want you can change your info</h4>

    <div class="white row">   
        <div class="card-header">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"  autofocus>
                    @error('name') <span>{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email" value="{{ old('email', $user->email) }}">
                    @error('email') <span>{{ $message }}</span> @enderror
                </div>
                <div class="buttons">
                    <button type="submit" class="btn btn-danger"> Save</button>
                    <button class="btn btn1">Cancel</button>
                </div>  
            </form>
        </div>    
    </div>
</div>
@endsection