@extends('layouts.apphome')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')

@endsection

@section('content')

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
    <div class="contents">
        <div class="registrationtitle">
            <p class="registration_content">Registration</p>
        </div>

        <form class="input" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input_inner">
                <img class="icon" src="{{ asset('storage/icon/user.svg') }}" alt="写真">
                <input class="input_inner-content" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Username"/>
            </div>

            <div class="input_inner">
                <img class="icon" src="{{ asset('storage/icon/email.svg') }}" alt="写真">
                <input class="input_inner-content" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <div class="input_inner">
                <img class="icon" src="{{ asset('storage/icon/lock.svg') }}" alt="写真">
                <input class="input_inner-content" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
            </div>

            
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="input_inner">
                <button class="input_submit">
                    {{ __('登録') }}
                </button>
            </div>
        </form>
    </div>
    </x-jet-authentication-card>



@endsection

