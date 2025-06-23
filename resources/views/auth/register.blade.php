<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Register</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        @vite(["public/css/app.css", "public/js/app.js"])
    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded shadow-md">
            <h2 class="text-2xl font-bold text-center text-gray-800">
                Create an Account
            </h2>

            @if ($errors->any())
                <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                method="POST"
                action="{{ route("register") }}"
                class="space-y-4"
            >
                @csrf

                <div>
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        required
                        autofocus
                        value="{{ old("name") }}"
                        class="w-full px-3 py-2 mt-1 border rounded shadow-sm focus:ring focus:ring-blue-200"
                    />
                </div>

                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        value="{{ old("email") }}"
                        class="w-full px-3 py-2 mt-1 border rounded shadow-sm focus:ring focus:ring-blue-200"
                    />
                </div>

                <div>
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="w-full px-3 py-2 mt-1 border rounded shadow-sm focus:ring focus:ring-blue-200"
                    />
                </div>

                <div>
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700"
                    >
                        Confirm Password
                    </label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                        class="w-full px-3 py-2 mt-1 border rounded shadow-sm focus:ring focus:ring-blue-200"
                    />
                </div>

                <div>
                    <button
                        type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700"
                    >
                        Register
                    </button>
                </div>
            </form>

            <div class="text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a
                        href="{{ route("login") }}"
                        class="text-blue-600 hover:underline"
                    >
                        Login
                    </a>
                </p>
            </div>
        </div>
    </body>
</html>
