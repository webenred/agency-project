<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First name -->
        <div>
            <x-input-label for="fname" :value="__('Prénom')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Last name -->
        <div class="mt-4">
            <x-input-label for="lname" :value="__('Nom')" />
            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')"
                required autofocus autocomplete="lname" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        {{-- Sex --}}
        <div class="mt-4">
            <x-input-label for="sex" :value="__('sexe')" />
            <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                name="sex" id="sex">
                <option>sexe</option>
                <option {{ old('sex') === "female" ? 'selected' : '' }} value="female">femelle</option>
                <option {{ old('sex') === "male" ? 'selected' : '' }} value="male">mâle</option>
            </select>
            <x-input-error :messages="$errors->get('sex')" class="mt-2" />
        </div>

        <div class="mt-4">
            @php
                $now = new DateTime();
                $numberOfDay = cal_days_in_month(CAL_GREGORIAN, $now->format('m'), $now->format('Y'));
                $months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
            @endphp

            <x-input-label :value="__('Date de naissance')" />
            <div class="flex gap-1">
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/3 "
                    name="dob[day]" id="day">
                    @for ($i = 1; $i <= $numberOfDay; $i++)
                        <option {{ $i == $now->format('d') ? 'selected' : '' }} value="{{ $i }}">
                            {{ $i < 10 ? '0' . $i : $i }}</option>
                    @endfor
                </select>

                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/3 "
                    name="dob[month]" id="month">
                    @foreach ($months as $key => $month)
                        <option value="{{ $key + 1 }}">{{ $month }}</option>
                    @endforeach
                </select>
                <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-1/3"
                    name="dob[year]" id="year">
                    @for ($i = $now->format('Y'); $i > '1950'; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        {{-- Phone --}}
        <div class="mt-4">
            <x-input-label for="phone" :value="__('Numéro de télephone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
