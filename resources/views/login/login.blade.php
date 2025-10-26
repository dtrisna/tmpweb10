<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login - Kopi Kenongo</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
  <h1>Login ke Website Kopi Kenongo</h1>

  @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

  <form method="POST" action="{{ route('login.process') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama" required><br><br>
    <input type="text" name="nohp" placeholder="Nomor HP" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    
    <button type="submit">Login</button>
</form>
</body>
</html>
