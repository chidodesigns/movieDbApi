@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-96 bg-blue-900 rounded-lg shadow-xl p-6">
        
        <h1 class="text-white w-16 text-center text-3xl">MoviesDbApi</h1>

        <h1 class="text-white text-2xl pt-8">Join Us</h1>
        <h2 class="text-blue-300">Enter your information below</h2>

        <form method="POST" action="{{ route('register') }}" class="pt-8">
            @csrf
            <div class="relative">

                <label for="name" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Name</label>

                <div>
                    <input id="name" type="text" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                    @error('name')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Email Address</label>

                <div class="">
                    <input id="email" type="email" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none  focus:bg-blue-700 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div class="">
                    <input id="password" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none  focus:bg-blue-700 @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                    @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="relative pt-3">
                <label for="password-confirm" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Confirm Password</label>

                <div class="">
                    <input id="password-confirm" type="password" class="pt-8 w-full rounded p-3 bg-blue-800 text-gray-100 outline-none  focus:bg-blue-700" name="password_confirmation"  autocomplete="new-password">
                </div>
            </div>

            <div class="pt-8">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="bg-gray-400 w-full py-2 px-3 text-left uppercase rounded text-blue-800 font-bold">
                        Register
                    </button>
                </div>
            </div>
            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                 <a class="" href="{{ route('password.request') }}">
                    Forgot Your Password?
                 </a>
                 <a class="" href="{{ route('login') }}">
                    Login
                 </a>
             </div>
        </form>
    </div>
</div>
@endsection
