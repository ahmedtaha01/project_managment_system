<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">

    {{-- logo --}}
    <img src="{{ asset('images/management.png') }}" alt="logo here" width="100px" height="100px">

    {{-- this is the form --}}
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
