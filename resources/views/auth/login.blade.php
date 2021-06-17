@extends('layouts.frontend')

@section('content')
<div class="w-full flex flex-wrap">
        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">
            <div  class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32" >
                <p class="text-center text-3xl">{{ __('Connexion') }}</p>
                  <form method="POST" action="{{ route('login') }}" class="flex flex-col pt-3 md:pt-8" >
                        @csrf
                    <div class="flex flex-col pt-4">
                        <input style="border-radius: 30px!important;height: 60px;"  type="email" id="emailaddress" placeholder="your@email.com" class="rounded-2xl shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                     <div class="flex flex-col pt-4">
                        <input style="border-radius: 30px!important;height: 60px;" type="password" id="password" placeholder="Mot de passe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                  
                    <input style="border-radius: 30px!important;height: 60px; background-color:#FFC000;" type="submit" value="{{ __('Connexion') }}" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8" >
                </form>
      
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="{{ asset('img/connexion.png') }}">
        </div>
    </div>

@endsection







