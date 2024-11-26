<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .back-button {
            align-self: flex-start;
            margin-bottom: 10px;
            text-decoration: none;
            color: #1f2937;
            font-size: 16px;
            margin-left: 10px;
        }

        .back-button:hover {
            color: #1f2937;
        }

        .content {
            text-align: center;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .logo {
            margin-bottom: 20px;
        }

.logo-img {
    width: 150px; /* Lebar gambar */
    height: 150px; /* Tinggi gambar sama dengan lebar agar proporsinya persegi */
    object-fit: cover; /* Membuat gambar menjadi cover */
    object-position: center; /* Memastikan gambar terpusat */
    border-radius: 50%; /* Membuat gambar bulat sempurna */
    overflow: hidden; /* Menghindari elemen overflow */
}

        .app-name {
            font-size: 24px;
            color: #1f2937;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
            width: 100%;
        }

        label {
            display: block;
            font-size: 14px;
            color: #1f2937;
            margin-bottom: 5px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #1f2937;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            color: white;
            background-color: #1f2937;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #38323d;
        }

        /* Responsive Design */
        @media (min-width: 768px) {
            .container {
                max-width: 600px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 800px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <a href="{{ url('/')}}" class="back-button">← Kembali</a>
        <div class="content">
            <div class="logo">
                <img src="{{ asset('assets/img/main-image.jpg') }}" alt="Logo" class="logo-img">
            </div>
            <h1 class="app-name">Pemilihan Velg Matic Menggunakan Metode SAW</h1>
            <form action="{{ route('login') }}" method="POST" class="login-form">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="btn-submit">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>
