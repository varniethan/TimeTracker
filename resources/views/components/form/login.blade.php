<form method="POST" action="{{ route('login') }}">
    @csrf
    <h1>Sign-In </h1>
    <div>
        <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
        <span class="color: red" >@error('email'){{$message}}@enderror</span>
    </div>
    <br>
    <div>
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="color: red" >@error('password'){{$message}}@enderror</span>
    </div>
    <button type="submit" class="btn btn-lg btn-success font-size-16 mt-xlg-4 mt-md-3 mb-2">Login</button>
</form>
