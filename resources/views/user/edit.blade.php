<form method="POST" action="{{ route('user.update') }}">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"  autofocus>
        @error('name') <span>{{ $message }}</span> @enderror
    </div>
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}">
        @error('email') <span>{{ $message }}</span> @enderror
    </div>
    <button type="submit">Update Profile</button>
</form>

