<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vendor-Dashboard</title>
</head>
<body>
    {{-- error --}}
    @if (Session::has('success'))
        <h5 style="color: rgb(5, 44, 4)">{{ session::get('success') }}</h5>
    @endif

    <div style="width: 900px; hight:100vh; margin: 5px auto;" class="container">
        <nav style="width: 100%; hight:40px; background:cadetblue; display:flex; justify-content:space-between">
            <div style="font-size: 30px; padding: 10px" class="logo">Website</div>
            <div style="display: flex" class="links">

                <h4>username: 
                    <span style="color: #fff">{{ Auth::guard('vendor')->user()->name }}</span>
                </h4>

                {{-- logout link --}}
                <h4 style="padding: 0 10px"><a href="{{ route('vendor.logout') }}">Logout</a></h4>
            </div>
        </nav>
        <h1 style="text-align: center;">Vendor Dashboard</h1>
        <br>
    </div>
</body>
</html>