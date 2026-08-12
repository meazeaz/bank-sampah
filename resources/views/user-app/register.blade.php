<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | TPST GBC</title>
    
    {{-- Modern Typography --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    {{-- Template Stylesheet --}}
    <link href="{{ asset('we-cycle-app/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('we-cycle-app/bootstrap/css/by-silmy/register.css') }}" rel="stylesheet" />
    
    <!-- Font awesome Icon CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <main class="loginscreen">
        <!-- Modern Organic Blurred Background Elements -->
        <div class="blob-1"></div>
        <div class="blob-2"></div>

        <div class="boxlogin">
            <!-- Register Header -->
            <div class="login-header">
                <img class="logodark" src="{{ asset('images/logo-dark.png') }}" alt="TPST GBC Logo">
                <h2>Buat Akun</h2>
                <p>Mulai kelola sampah dengan mudah hari ini</p>
            </div>

            <!-- Register Form -->
            <div class="ikonkon">
                <form action="/register" method="post" style="max-width:327px;margin:auto">
                    @csrf
                    @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all('<div class="font-sm"><i class="fa fa-exclamation-circle me-1"></i> :message</div>')) !!}
                    </div>
                    @endif
                    
                    <div class="input-icons">
                        <i class="fa fa-user"></i>
                        <input class="input-field" id="username" name="username" type="text"
                            placeholder="Username" required>
                    </div>
                    <div class="input-icons">
                        <i class="fa fa-envelope"></i>
                        <input class="input-field" id="email" name="email" type="email" 
                            placeholder="Email" required>
                    </div>
                    <div class="input-icons">
                        <i class="fa fa-lock"></i>
                        <input class="input-field" id="password" name="password" type="password" 
                            placeholder="Password" required>
                    </div>
                    <div class="input-icons">
                        <i class="fa fa-lock"></i>
                        <input class="input-field" id="password_confirmation" name="password_confirmation" 
                            type="password" placeholder="Konfirmasi Password" required>
                    </div>
                    
                    <div class="tombol">
                        <button type="submit" class="btn1">DAFTAR</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="loakun">
            <p>Sudah Punya Akun? 
                <a href="/login" class="linkregis">Masuk Disini</a>
            </p>
        </div>
    </main>
</body>

</html>
