<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SOCA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-sm">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-gray-700 mb-4 transition">
            <span aria-hidden="true">&larr;</span> Kembali ke Blog
        </a>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <div class="text-center mb-6">
                <img src="/images/logo.png" alt="SOCA" class="inline-block w-10 h-10 rounded-xl object-cover mb-3">
                <h1 class="text-xl font-bold text-gray-900">Masuk ke Admin SOCA</h1>
                <p class="text-sm text-gray-500">Kelola artikel blog kamu di sini.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 text-sm text-red-600 bg-red-50 border border-red-100 rounded-lg px-3 py-2">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full rounded-lg border-gray-300 focus:border-blue-600 focus:ring-blue-600 text-sm">
                </div>
                <label class="flex items-center gap-2 text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 accent-blue-600">
                    Ingat saya
                </label>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-lg transition">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</body>
</html>
