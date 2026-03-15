<!DOCTYPE html>
<html>
<head>
    <title>User Register</title>
</head>
<body>

<h2>User Register</h2>

@if(session('success'))
<p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('user.register') }}">
    @csrf

    <div>
        <label>Mobile Number</label>
        <input type="text" name="phone" placeholder="Enter Mobile Number">
        @error('phone')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter Password">
        @error('password')
        <p style="color:red">{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
    </div>

    <br>

    <button type="submit">Register</button>

</form>

</body>
</html>