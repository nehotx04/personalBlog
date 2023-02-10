@extends('template')
@section('title')
    Publicaciones
@endsection

@section('body')
    <style>
        .magic-button {
            position: relative;


        }

        .magic-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg,
                    rgb(255, 255, 0), rgb(0, 162, 255), rgb(0, 255, 0), rgb(0, 162, 255),
                    rgb(255, 255, 0), rgb(0, 162, 255), rgb(0, 255, 0), rgb(0, 162, 255));
            background-size: 800%;
            border-radius: 10px;
            filter: blur(8px);
            animation: glowing 20s linear infinite;
        }

        @keyframes glowing {
            0% {
                background-position: 0, 0;
            }

            50% {
                background-position: 400%, 0;
            }

            100% {
                background-position: 0, 0;
            }
        }
    </style>
    <div class="flex justify-end">
        <a href="{{ route('posts.index') }}"
            class="bg-black px-5 py-2.5 mr-8 text-lg text-white font-bold rounded-lg magic-button">Volver</a>
    </div>

    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
            <!-- text - start -->
            <div class="mb-10 md:mb-8">
                <h2 class="text-gray-300 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Crea un articulo</h2>

            </div>
            <!-- text - end -->

            <!-- form - start -->
            <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post" class="max-w-screen-md grid sm:grid-cols-2 gap-4 mx-auto">

                @csrf

                <div class="col-span-2">
                    <label for="title" class="inline-block text-gray-400 text-sm sm:text-base mb-2">
                        Titulo*
                    </label>
                    @error('title')
                        <small class="text-white">*{{ $message }}</small>
                        <br>
                    @enderror
                    <input name="title"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-teal-500 focus:border-teal-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light" placeholder="Añade un titulo" />
                </div>

                <div class="col-span-2">
                    <label for="body" class="inline-block text-gray-400 text-sm sm:text-base mb-2">Contenido*</label>
                    @error('body')
                        <small class="text-white">*{{ $message }}</small>
                        <br>
                    @enderror
                    <textarea name="body" rows="9"
                        class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light" placeholder="Añade contenido">{{ old('body') }}</textarea>
                </div>

                <div class="col-span-2">
                    <label for="image" class="inline-block text-gray-400 text-sm sm:text-base mb-2">Image</label><br>
                    @error('image')
                        <small class="text-white">*{{ $message }}</small>
                        <br>
                    @enderror
                    <input type="file" accept="image/*" name="image" class="file:bg-teal-700 file:text-white file:py-3 file:px-4 file:hover:bg-teal-800 file:hover:cursor-pointer file:mr-4 file:rounded-l-lg file:border-none w-full bg-gray-700 rounded-lg text-white/80 mb-4 border focus:outline-none border-gray-600 hover:cursor-pointer placeholder-gray-400 text-gray-900">                
                    
                </div>

                <div class="col-span-2 flex justify-between items-center">
                    <button class="inline-block bg-teal-600 hover:bg-teal-700 active:bg-teal-800 focus-visible:ring ring-teal-300 text-white text-sm md:text-base font-semibold text-center rounded-lg outline-none transition duration-100 w-full px-8 py-3">
                        Crear
                    </button>
                </div>
                      <span class="text-gray-500 text-sm">*Required</span>

            </form>

            <div class="mt-6">
                <p class="max-w-screen-md text-gray-500 md:text-sm text-center mx-auto">Realiza publicaciones desde este
                    formulario sientete libre de expresarte como quieras no hay leyes que te priven de tu liberdad de
                    expresion <small>(Todas tus publicaciones solo podras verlas tu y tus amigos en la red)</small></p>
            </div>
            <!-- form - end -->
        </div>
    </div>
@endsection
