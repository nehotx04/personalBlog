@extends('template')
@section('title')
    Iniciar sesion
@endsection

@section('body')

<div class="py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
        <h2 class="text-gray-300 text-2xl px-2 py-2 lg:text-3xl font-bold text-center mb-4 md:mb-8">Iniciar sesion</h2>
        <form action="{{route('auth.signin')}}" method="post" class="max-w-lg border border-gray-500 rounded-lg mx-auto">
            @csrf
            
            @error('message')
              <div id="message" class="p-4 mx-8 mt-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{$message}}</span>
              </div>
            @enderror
            @if (session('info'))
            
                <div id="message" class="p-4 mx-8 mt-4 text-sm text-blue-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-medium">{{session('info')}}</span>
                </div>
            
            @endif
            <div class="flex flex-col gap-4 p-4 md:p-8">

                <div class="mb-3">
                    <label for="email" class="inline-block text-gray-300 text-sm sm:text-base mb-2">Correo electronico</label>
                    <input name="email"
                        class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                </div>

                <div class="mb-3">
                    <label for="password" class="inline-block text-gray-300 text-sm sm:text-base mb-2">Contraseña</label>
                    <input name="password" type="password"
                        class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                </div>

                <button class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
                    Iniciar sesion
                </button>

                <div class="flex justify-center items-center relative">
                    <span class="h-px bg-gray-300 absolute inset-x-0"></span>
                    {{-- <span class="bg-white text-gray-400 text-sm relative px-4">Log in with social</span> --}}
                </div>

                <div class="flex justify-center items-center bg-gray-800 mt-6 rounded-lg p-4">
                    <p class="text-gray-500 text-sm text-center">No tienes cuenta? <a href="{{route('auth.register')}}"
                            class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 transition duration-100">Registrate</a>
                    </p>
                </div>
        </form>
    </div>
</div>

@endsection
