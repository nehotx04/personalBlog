@extends('template')
@section('title')
    Publicaciones
@endsection

@section('body')
<style>
  .magic-button{
    position: relative;


  }
  .magic-button::before{
    content:"";
    position: absolute;
    top: 0;
    left: 0;
    z-index:-1;
    width:100%;
    height:100%;
    background: linear-gradient(
      45deg,
      rgb(255, 255, 0),rgb(0, 162, 255),rgb(0, 255, 0),rgb(0, 162, 255),
        rgb(255, 255, 0),rgb(0, 162, 255),rgb(0, 255, 0),rgb(0, 162, 255)
    );
    background-size: 800%;
    border-radius:10px;
    filter:blur(8px);
    animation: glowing 20s linear infinite;
  }
  @keyframes glowing{
    0%{
      background-position: 0,0;
    }
    50%{
      background-position: 400%,0;
    }
    100%{
      background-position: 0,0;
    }
  }
</style>
<div class="flex justify-end">
  <a href="{{route('posts.create')}}" class="bg-black px-5 py-2.5 mr-8 mb-2 text-lg text-white font-bold rounded-lg magic-button">Hacer publicacion</a>
  {{-- <a href="{{route('posts.create')}}" class="focus:outline-none text-white bg-teal-700 hover:bg-teal-800 focus:ring-4 focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Crear uno nuevo</a> --}}
</div>
  
  <div class="max-w-screen-2xl px-4 md:px-8 mx-auto">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="text-gray-300 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">Mis publicaciones</h2>
      
      <p class="max-w-screen-md text-gray-400 md:text-lg text-center mx-auto">Aqui encontraras todas las publicaciones que hallas realizado</p>
    </div>
    <!-- text - end -->
    
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 md:gap-6 xl:gap-8">
        @foreach ($posts as $post)
        <!-- article - start -->
        <div class="flex flex-col rounded-lg overflow-hidden">
          <a href="{{route('posts.show',$post)}}" class="group h-48 md:h-64 block bg-gray-100 overflow-hidden relative">
            @if (empty($post->image))
            <div class="w-full h-full text-4xl text-white text-center group-hover:scale-110 transition bg-teal-700 duration-200 active:text-gray-500 transition duration-100">
              <p class="pt-24">
                {{Str::limit($post->title,10)}}
              </p>
            </div>
            @else
            <img src="{{$post->image}}" loading="lazy" alt="{{$post->image}} image" class="w-full h-full object-cover group-hover:scale-110 transition duration-200 transition duration-100">
            @endif
          </a>
  
          <div class="flex flex-col flex-1 p-4 sm:p-6 bg-teal-600">
            <h2 class="text-white text-xl font-semibold mb-2 text-center">
              <a href="{{route('posts.show',$post)}}" class="hover:underline active:text-gray-300 transition duration-100">{{Str::limit($post->title,30)}}</a>
            </h2>
  
            <p class="text-white mb-8 text-lg text-center">{{Str::limit($post->body,50)}}</p>
  
            <div class="flex justify-between items-end mt-auto">
              <div class="flex items-center gap-2">

              </div>

            </div>
          </div>

        </div>
        <!-- article - end -->
        @endforeach
  

      </div>
    </div>
    
    <div class="flex flex-col items-center my-12">
      <!-- Help text -->
      <span class="text-sm text-gray-700 dark:text-gray-400">
          Mostrando de <span class="font-semibold text-white dark:text-white">{{$posts->firstItem()}}</span> a <span class="font-semibold text-white dark:text-white">{{$posts->lastItem()}}</span> de <span class="font-semibold text-white dark:text-white">{{$posts->total()}}</span> publicaciones
      </span>
      <div class="inline-flex mt-2 xs:mt-0">
        <!-- Buttons -->
        <a href="{{ $posts->previousPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
            Prev
        </a>
        <a href="{{ $posts->nextPageUrl() }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
            Next
            <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
      </div>
    </div>

    {{-- @include('partials/footer') --}}

@endsection