<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | TPST GBC</title>
    
    {{-- Modern Typography --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Template Stylesheet --}}
    <link href="{{ asset('we-cycle-app/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('we-cycle-app/bootstrap/css/by-silmy/login.css') }}" rel="stylesheet" />
    
    <!-- Font awesome Icon CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main class="loginscreen">
        <!-- Modern Organic Blurred Background Elements -->
        <div class="blob-1"></div>
        <div class="blob-2"></div>

        <div class="boxlogin">
            <!-- Alert Messages -->
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check-circle me-1"></i> {{ session('success') }}
            </div>
            @endif
            @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                <i class="fa fa-exclamation-circle me-1"></i> {{ session('loginError') }}
            </div>
            @endif

            <!-- Login Header -->
            <div class="login-header">
                <img class="logodark" src="{{ asset('images/logo-dark.png') }}" alt="TPST GBC Logo">
                <h2>Selamat Datang</h2>
                <p class="text-primary">Silakan masuk ke akun nasabah Anda</p>
            </div>

            <!-- Login Form -->
            <div class="ikonkon">
                <form action="/login" method="post" style="max-width:327px;margin:auto">
                    @csrf
                    <div class="input-icons">
                        <i class="fa fa-envelope"></i>
                        <input class="input-field" id="email" name="email" type="email"
                            placeholder="tpstgbc@gmail.com" required>
                    </div>
                    <div class="input-icons">
                        <i class="fa fa-lock"></i>
                        <input class="input-field" id="password" name="password" type="password" 
                            placeholder="Password" required>
                    </div>
                    <div class="ingat">
                        <label class="ingat-left" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <span>Ingat saya</span>
                        </label>
                        <a href="#">Lupa Password?</a>
                    </div>
                    <div class="tombol">
                        <button type="submit" class="btn1">MASUK</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="loregister">
            <p>Belum Punya Akun? 
                <a href="/register" class="linkregis">Daftar Sekarang</a>
            </p>
        </div>
    </main>
</body>

</html>
