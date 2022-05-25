<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            
                <x-button class="ml-4 float-right">
                    {{ __('Register') }}
                </x-button>
            </div>
            <div class="icons">
                <div style="float: left;margin-left:6px;margin-right:6px" class="img">
                    <a href="/redirect/facebook">
                        <img src="{{ asset('images/facebook.png') }}" alt="facebook logo" >
                    </a>
                </div>
                <div style="float: left;margin-left:6px;margin-right:6px" class="img">
                    <a  href="/redirect/google">
                        <img class="d-inline" src="{{ asset('images/google.png') }}" alt="google logo" >
                    </a>
                </div>
                <div style="float: left;margin-left:6px;margin-right:6px" class="img">
                    <a  href="#">
                        <img class="d-inline" src="{{ asset('images/twitter.png') }}" alt="twitter logo" >
                    </a>
                </div>
                <div style="float: left;margin-left:6px;margin-right:6px" class="img">
                    <a href="/redirect/github">
                        <img class="d-inline" src="{{ asset('images/github.png') }}" alt="github logo" >
                    </a>
                </div>
            </div>
            
            
            
            
            
            
        </form>
    </x-auth-card>
</x-guest-layout>
