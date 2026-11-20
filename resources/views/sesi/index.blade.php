<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Nada Music Course by Diela</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #faf8ff;
            color: #3b324c;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 390px;
            background-color: #ffffff;
            border: 1px solid #ece5fa;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(138, 108, 224, 0.10);
        }
        .login-header {
            background: linear-gradient(135deg, #9d7bff, #7c5dfa);
            color: #ffffff;
            padding: 22px 20px;
            text-align: center;
        }
        .form-control {
            border-color: #dfd4ff;
            border-radius: 10px;
            padding: 10px 12px;
        }
        .form-control:focus {
            border-color: #8761f5;
            box-shadow: 0 0 0 0.2rem rgba(135, 97, 245, 0.18);
        }
        .btn-login {
            background-color: #9d7bff;
            border-color: #9d7bff;
            color: #ffffff;
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
        }
        .btn-login:hover {
            background-color: #8761f5;
            border-color: #8761f5;
            color: #ffffff;
        }
    </style>
</head>
<body>

    <div class="container px-3">
        <div class="login-card mx-auto">
            <div class="login-header">
                <div class="small fw-medium mb-1">🎶 Nada Music Course by Diela</div>
                <h4 class="fw-bold mb-0">Login Kursus Musik</h4>
            </div>

            <div class="p-4">
                @if(session('error'))
                    <div class="alert alert-danger py-2 small rounded-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger py-2 small rounded-3">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/sesi/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium small">Nama</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            placeholder="Masukkan nama"
                            value="{{ old('name') }}"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium small">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-login w-100">
                        Login
                    </button>
                </form>
            </div>
        </div>

        <div class="text-center text-muted small mt-4">
            Nada Music Course • by Diela
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3 pe-none user-select-none" style="z-index: 1; color: #8761f5; opacity: 0.14; font-size: 1.5rem; letter-spacing: 4px;">
        ♪ ♫
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
