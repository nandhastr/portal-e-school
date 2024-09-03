<x-guest-layout>
    <div class="row mb-4 mt-4 ">
        <div class="mb-2">
            <x-application-logo class=" fill-current text-gray-50" />
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h2 class="mb-4" style="font-size: 3rem">Login</h2>
            <h6 class="mb-2">Masuk Ke Dashboard Admin</h6>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" placeholder="Enter Email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full form-control" type="password" name="password"
                        required autocomplete="current-password" placeholder="Enter Password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-900 dark:text-gray-800">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-center mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-800 dark:text-gray-900 hover:text-gray-1000 dark:hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    @endif
                    <button class="btn btn-sm mx-2 btn-primary">
                        {{ __('Log in') }}
                    </button>

                </div>
            </form>

        </div>
    </div>
</x-guest-layout>