@extends('template')
@section('title')
    Perfil
@endsection

@section('body')
    <div class="container mx-auto px-4">

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
                        <h3 class="mb-4 text-xl text-center font-medium text-gray-900 dark:text-white">Editar Perfil</h3>
                        <form class="space-y-6" action="{{ route('profile.edit', $user) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                    @error('name')
                                    <small class="text-white">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Nombre" required>
                            </div>
                            <div>
                                <label for="lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
                                    @error('lastname')
                                    <small class="text-white">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="text" value="{{ old('lastname', $user->lastname) }}" name="lastname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Apellido" required>
                            </div>

                            <div class="grid grid-cols-2">

                                <label for="username"
                                    class="block col-span-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de
                                    usuario</label>
                                @error('username')
                                    <small class="text-white">*{{ $message }}</small>
                                    <br>
                                @enderror

                                <div class="flex col-span-2">

                                    <span
                                        class="inline-flex items-center px-3 text-sm text-gray-200 bg-gray-600 border border-r-0 border-gray-500 rounded-l-lg">
                                        @
                                    </span>
                                    <input type="text" name="username" id="website-admin"
                                        class="rounded-none rounded-r-lg bg-gray-600 border text-gray-100 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-500 p-2.5"
                                        placeholder="@username" value="{{ old('username', ltrim($user->username, '@')) }}"
                                        required>
                                </div>
                            </div>

                            <div>
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                                    @error('description')
                                    <small class="text-white">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <textarea name="description" rows="3"
                                    class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 dark:shadow-sm-light"
                                    placeholder="Descripcion">{{ old('description', $user->description) }}</textarea>
                            </div>

                            <div>
                                <label for="photo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto de
                                    perfil</label>
                                    @error('photo')
                                    <small class="text-white">*{{ $message }}</small>
                                    <br>
                                @enderror
                                <input type="file" accept="image/*" name="photo"
                                    class="file:bg-gray-800 file:text-white file:py-3 file:px-4 file:hover:bg-gray-600 file:hover:cursor-pointer file:mr-4 file:rounded-l-lg file:border-none w-full bg-gray-700 rounded-lg text-white/80 mb-4 border focus:outline-none border-gray-600 hover:cursor-pointer placeholder-gray-400 text-gray-900">
                            </div>

                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_public" class="sr-only peer" @if($user->is_public == 1 )checked @endif>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 dark:bg-gray-500 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600"></div>
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-200">Cuenta publica</span>
                              </label>

                            <button type="submit"
                                class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Descripcion
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-300">
                    @if(!empty($user->description))
                    {{$user->description}}
                    @else
                    Sin descripción
                    @endif
                </p>
            </div>
            <!-- Modal footer -->
            {{-- <div class="flex items-center justify-end p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="defaultModal" type="button" class="text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Cerrar</button>
            </div> --}}
        </div>
    </div>
</div>
<!-- End modal -->


        <div class="w-full grid grid-cols-2 bg-gray-800 w-full rounded py-4 px-4 inline-flex">

            <div class="grid grid-cols-10 grid-rows-6 h-28 sm:grid-cols-10 sm:grid-rows-6 sm:h-28 md:h-36 col-span-1">

                <div class="col-span-2 w-24 h-24 md:w-32 md:h-32 bg-gray-900 rounded-full overflow-hidden shadow-lg mb-4">
                    <img src="{{ $user->photo }}" loading="lazy" alt="{{ $user->username }} photo"
                        class="w-full h-full object-cover object-center" />
                </div>

                <div
                    class="col-span-10 mt-16 sm:mt-0 sm:col-start-5 sm:col-span-5 sm:row-start-2 md:col-start-5 lg:col-start-4 md:col-span-10 row-start-2">
                    <span class="text-gray-200 md:text-lg lg:text-xl">
                        {{ $user->name }} {{ $user->lastname }} <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-3 py-1 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800" type="button">
                            descripción
                          </button>
                          
                    </span>

                    <p
                        class="col-start-3 col-span-2 row-start-1 sm:col-start-5 sm:col-span-5 sm:row-start-2 md:col-start-4 md:row-start-4 text-gray-200 md:text-md lg:text-lg">
                        {{ $user->username }}
                    </p>
                    <p class="text-gray-300">
                        {{$user->followers}} Seguidores
                    </p>
                </div>

            </div>
            <div class="col-span-1 grid grid-cols-6">

            @if (Auth::user()->id == $user->id)

                    <div class="flex items-center col-span-2 col-start-5">
                        <button data-modal-target="authentication-modal" title="Editar perfil"
                            data-modal-toggle="authentication-modal"
                            class="text-white bg-gray-900 hover:bg-gray-700 hover:shadow-xl px-5 py-2 rounded"
                            type="button">
                            Modificar
                        </button>
                    </div>

            @endif

            <div class="flex items-center col-span-2 col-start-5">
                @if ($user->id != Auth::user()->id)
                      
                <form action="{{route('follow')}}" method="post">
                  @csrf
                  <input type="text" name="followed_id" class="hidden" value="{{$user->id}}">
                  <button type="submit" class="bg-gray-700 text-white rounded text-sm px-3 py-2">
                    
                    @if($following == null)
                    Seguir <i class="fa-solid fa-check"></i>
                    @else
                    Dejar de seguir &nbsp<i class="fa-solid fa-xmark"></i>
                    @endif
                  </button>
                </form>
  
                @endif
              </div>
            </div>


        </div>
        <div class="mt-16 mb-16 w-full text-center">
            <span class="text-white text-2xl">Publicaciones de {{ $user->name }}</span>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 mt-5 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
            @foreach ($posts as $post)
                <!-- article - start -->
                <div class="flex flex-col rounded-lg overflow-hidden">
                    <a href="{{ route('posts.show', $post) }}"
                        class="group h-48 md:h-64 block bg-gray-100 overflow-hidden relative">
                        @if (empty($post->image))
                            <div
                                class="w-full h-full text-4xl text-white text-center group-hover:scale-110 transition bg-teal-700 duration-200 active:text-gray-500 transition duration-100">
                                <p class="pt-24">
                                    {{ Str::limit($post->title, 10) }}
                                </p>
                            </div>
                        @else
                            <img src="{{ $post->image }}" loading="lazy" alt="{{ $post->image }} image"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-200 transition duration-100">
                        @endif
                    </a>

                    <div class="flex flex-col flex-1 p-4 sm:p-6 bg-teal-600">
                        <h2 class="text-white text-xl font-semibold mb-2 text-center">
                            <a href="{{ route('posts.show', $post) }}"
                                class="hover:underline active:text-gray-300 transition duration-100">{{ Str::limit($post->title, 30) }}</a>
                        </h2>

                        <p class="text-white mb-8 text-lg text-center">{{ Str::limit($post->body, 50) }}</p>

                        <div class="flex justify-between items-end mt-auto">
                            <div class="flex items-center gap-2">

                            </div>

                        </div>
                    </div>

                </div>
                <!-- article - end -->
            @endforeach
        </div>

        <div class="flex flex-col items-center my-12">
            <!-- Help text -->
            <span class="text-sm text-gray-700 dark:text-gray-400">
                Mostrando de <span class="font-semibold text-white dark:text-white">{{ $posts->firstItem() }}</span> a
                <span class="font-semibold text-white dark:text-white">{{ $posts->lastItem() }}</span> de <span
                    class="font-semibold text-white dark:text-white">{{ $posts->total() }}</span> publicaciones
            </span>

            <div class="inline-flex mt-2 xs:mt-0">
                <!-- Buttons -->
                <a href="{{ $posts->previousPageUrl() }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Prev
                </a>
                <a href="{{ $posts->nextPageUrl() }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>

        </div>

    </div>
@endsection
