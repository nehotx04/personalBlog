@extends('template')
@section('title')
    Registro
@endsection

@section('body')
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <h2 class="text-gray-300 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-8">Registrarse</h2>

            <form action="{{route('auth.signup')}}" class="max-w-lg border border-gray-500 rounded-lg mx-auto" method="post">
                @csrf
                <div class="flex flex-col gap-4 p-4 md:p-8">

                    <div class="grid grid-cols-9">

                        <div class="col-span-4">
                            <label for="name" class="inline-block text-gray-300 text-sm sm:text-base mb-2">
                                Nombre
                            </label>
                            @error('name')
                                <small class="text-white">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input name="name"
                                class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />

                        </div>
                        <div class="col-span-1">

                        </div>
                        <div class="col-span-4">

                            <label for="lastname" class="inline-block text-gray-300 text-sm sm:text-base mb-2">
                                Apellido
                            </label>
                            @error('lastname')
                                <small class="text-white">*{{ $message }}</small>
                                <br>
                            @enderror
                            <input name="lastname"
                                class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                        </div>

                    </div>


                    <div class="my-3">
                        <label for="email" class="inline-block text-gray-300 text-sm sm:text-base mb-2">Correo electronico</label>
                        @error('email')
                                <small class="text-white">*{{ $message }}</small>
                                <br>
                        @enderror
                        <input name="email"
                            class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block text-gray-300 text-sm sm:text-base mb-2">Contraseña</label>
                        @error('password')
                            <small class="text-white">*{{ $message }}</small>
                            <br>
                        @enderror
                        <input name="password" type="password"
                            class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="inline-block text-gray-300 text-sm sm:text-base mb-2">Confirme su contraseña</label>
                        <input name="password_confirmation" type="password"
                            class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" />
                    </div>

                    <button class="block bg-gray-800 hover:bg-gray-700 active:bg-gray-600 focus-visible:ring ring-gray-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 px-8 py-3">
                        Registrarse
                    </button>

                    <div class="flex justify-center items-center relative">
                        <span class="h-px bg-gray-300 absolute inset-x-0"></span>
                        {{-- <span class="bg-white text-gray-400 text-sm relative px-4">Log in with social</span> --}}
                    </div>


                    <div class="flex justify-center items-center bg-gray-800 mt-6 rounded-lg p-4">
                        <p class="text-gray-500 text-sm text-center">Ya tienes cuenta? <a href="{{route('auth.login')}}"
                                class="text-indigo-500 hover:text-indigo-600 active:text-indigo-700 transition duration-100">Inicia sesión</a>
                        </p>
                    </div>
            </form>
        </div>
    </div>
    
@endsection
