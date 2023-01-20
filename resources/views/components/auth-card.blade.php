<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        @isset($logo)
            {{ $logo }}
        @else
            <div class="flex justify-center">
                <Link href="/">
                    <x-application-logo class="w-20 fill-current text-gray-500" />
                </Link>
            </div>
            <div class="text-center mt-2 text-xl text-gray-900">Sistema de Contribuição de Aprendizado</div>
        @endisset
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
