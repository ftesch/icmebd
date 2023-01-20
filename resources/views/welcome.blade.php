<x-guest-layout>
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <Link href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</Link>
            @else
                <Link href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Entrar</Link>

                @if (Route::has('register'))
                    <Link href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrar</Link>
                @endif
            @endauth
        </div>
    @endif
</x-guest-layout>
