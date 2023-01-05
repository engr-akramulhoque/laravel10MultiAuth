<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor-login</title>
</head>

<body style="height: 100vh; width:1100px; margin: 5px auto;">

    <div style="width:500px; hight:400px; margin: 10px auto; background: rgb(196, 192, 192)">

        {{-- error --}}
        @if (Session::has('fail'))
            <h5 style="color: red">{{ session::get('fail') }}</h5>
        @endif
        
        <h1>Vendor login here</h1>
        <form action="{{ route('vendor.vendorAuthCheck') }}" method="POST">
            @csrf
            <div class="formgroup">
                <label for="email">Email</label><br>
                <input type="email" name="email" placeholder="Enter email address">
            </div>
            <br>
            <div class="formgroup">
                <label for="password">password</label><br>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <br><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>
