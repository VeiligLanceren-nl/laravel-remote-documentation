<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Documentation</title>

        <!-- TailwindCSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Optional: Tailwind config for customizations -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: '#1E40AF', // You can customize colors if you want
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="bg-gray-100 text-gray-800 antialiased leading-relaxed">
        <div class="min-h-screen flex flex-col">
            <header class="bg-white shadow p-4">
                <h1 class="text-2xl font-bold text-primary">Documentation</h1>
            </header>

            <main class="flex-1 container mx-auto px-4 py-8">
                @yield('content')
            </main>

            <footer class="bg-white text-center p-4 text-sm text-gray-500">
                &copy; {{ date('Y') }} Documentation
            </footer>
        </div>
    </body>
</html>
