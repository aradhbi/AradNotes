<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به وبلاگ شخصی</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 1rem;
        }
        .login-card {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            color: #374151;
            background-color: #ffffff;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .form-input:focus {
            outline: none;
            border-color: #6b7280;
            box-shadow: 0 0 0 3px rgba(107, 114, 128, 0.2);
        }
        .form-button {
            background-color: #1f2937;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .form-button:hover {
            background-color: #000000;
        }
        .link-text {
            color: #4b5563;
            transition: color 0.3s ease;
        }
        .link-text:hover {
            color: #1f2937;
            text-decoration: underline;
        }
    </style>
</head>
<body class="antialiased text-gray-800">

    <div class="login-card">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">ورود به حساب کاربری</h1>

        <form class="space-y-5" method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">نام کاربری یا ایمیل:</label>
                <input type="text" id="email" name="email" class="form-input" placeholder="ایمیل یا نام کاربری خود را وارد کنید" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور:</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="رمز عبور خود را وارد کنید" required>
            </div>

            <button type="submit" class="form-button">ورود</button>
        </form>
    </div>

</body>
</html>
