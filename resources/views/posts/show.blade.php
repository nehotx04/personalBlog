@extends('template')
@section('title')
    {{ $post->name }}
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

    {{-- Start Delete modal --}}
    <div id="popup-modal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                        this product?</h3>
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @csrf
                        @method('delete')
                        <button data-modal-hide="popup-modal" type="submit"
                            class="text-white bg-red-700 hover:bg-red-600 px-3 py-2 rounded-lg">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                            cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}


    <!-- Modal toggle -->
    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white">Editar publicacion</h3>
                    <form class="space-y-6" action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*Titulo</label>
                            <input type="text" value="{{ old('body',$post->title) }}" name="title"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Titulo" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*Contenido</label>
                                <textarea name="body" rows="5"
                                class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light" placeholder="Contenido" required>{{ old('body',$post->body) }}</textarea>
                        </div>
                        <div>
                          <input type="file" accept="image/*" name="image" class="file:bg-teal-600 file:text-white file:py-3 file:px-4 file:hover:bg-teal-700 file:hover:cursor-pointer file:mr-4 file:rounded-l-lg file:border-none w-full bg-gray-700 rounded-lg text-white/80 mb-4 border focus:outline-none border-gray-600 hover:cursor-pointer placeholder-gray-400 text-gray-900">  
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="flex justify-end">
        <a href="{{ route('posts.index') }}"
            class="bg-black px-5 py-2.5 mr-8 mb-2 text-lg text-white font-bold rounded-lg magic-button">Volver</a>
    </div>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">

            @if (Auth::user()->id == $post->user_id)
            <div class="flex flex-row justify-between md:grid md:grid-cols-2 md:w-1/2">
              
              <div class="col-span-9 md:col-span-1">
                  <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                  class="text-white bg-red-700 hover:bg-red-600 px-6 py-3 md:px-5 md:py-2 rounded-lg" type="button">
                    Eliminar
                  </button>
              </div>

              <div class="col-span-1 md:col-span-1">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                class="text-white bg-green-700 hover:bg-green-600 px-6 py-3 md:px-5 md:py-2 rounded-lg"
                type="button">
                  Editar
                </button>
              </div>
            </div>
            @endif


            <div class="grid md:grid-cols-2 gap-8 mt-5 lg:gap-12">
                <div>
                    <div class="h-auto bg-transparent overflow-hidden rounded-lg">

                        @if ($post->image == null)
                            <div class="w-full py-24 sm:py-48 md:py-72 object-cover text-center object-center bg-teal-500">
                                <span class="text-white text-5xl">
                                    {{ Str::limit($post->title, 10) }}
                                </span>
                            </div>
                        @else
                            <img src="{{ $post->image }}" loading="lazy" alt="{{ $post->slug }} image"
                                class="w-full h-full bg-transparent object-cover object-center" />
                        @endif
                    </div>
                </div>

                <div class="md:pt-8">
                    <h1 class="text-gray-400 text-2xl sm:text-3xl font-bold text-center md:text-left mb-4 md:mb-6">
                        {{ $post->title }}</h1>
                    <p class="text-gray-500 sm:text-lg mb-6 md:mb-8">
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4">

        <form action="{{route('comment')}}" method="post" class="py-4 my-4 bg-gray-800 rounded-lg w-full px-4">
            @csrf
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                <div class="flex justify-between items-center mx-0 p-0">
                    Deja un comentario 
                    <button type="submit" title="subir comentario" class="bg-teal-700 text-white px-3 py-2 mt-2 rounded-full hover:bg-teal-800 hover:cursor-pointer"><i class="fa-solid fa-paper-plane"></i></button>  
                </div>
            </label>
            <input type="text" class="hidden" name="post_id" value="{{$post->id}}">
            <textarea id="message" name="comment" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escribe tu comentario aqui"></textarea> 
        </form>
        <h2 class="text-xl text-white text-center mb-4">Comentarios</h2>
        @foreach ($comments as $comment)
        <div class="w-3/4 mx-auto bg-gray-800 rounded-lg px-4 py-2">
            <p class="text-white">{{$comment->comment}}</p>
        </div>
        @endforeach

    </div>
@endsection
