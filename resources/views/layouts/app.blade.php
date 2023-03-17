<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between">
                <div class="flex">
                    <a href="/" class="flex items-center py-4 px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-yellow-600 h-6 w-6 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path fill-rule="evenodd" d="M17.293 10.293a1 1 0 00-1.414 0L10 16.586l-5.879-5.88a1 1 0 00-1.414 1.414l6.586 6.586a1 1 0 001.414 0l6.586-6.586a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-yellow-600 font-semibold text-xl tracking-tight">Topics</span>
                    </a>
                    <div class="flex items-center ml-4">
                        @if(Auth::user()->isStudent())
                        <a class="text-yellow-600 hover:text-yellow-900 px-3 py-2 rounded-md text-sm font-medium" href="/admin">Dashboard</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-4">
        @yield('content')
    </main>

</body>

</html>


