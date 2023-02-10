@extends('template')
@section('title')
    {{$post->name;}}
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
  <a href="{{route('posts.index')}}" class="bg-black px-5 py-2.5 mr-8 mb-2 text-lg text-white font-bold rounded-lg magic-button">Volver</a>
</div>
    <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
          <div class="grid md:grid-cols-2 gap-8 lg:gap-12">
            <div>
              <div class="h-auto bg-gray-100 overflow-hidden rounded-lg">
                @if ($post->image == null)
                
                  <div class="w-full py-24 sm:py-48 md:py-72 object-cover text-center object-center bg-teal-500">
                    <span class="text-white text-5xl">
                      {{Str::limit($post->title,10)}}
                    </span>
                  </div>
                
                  @else
                  <img src="{{$post->image}}" loading="lazy" alt="{{$post->slug}} image" class="w-full h-full object-cover object-center" />
                  @endif
              </div>
            </div>
      
            <div class="md:pt-8">

              <h1 class="text-gray-400 text-2xl sm:text-3xl font-bold text-center md:text-left mb-4 md:mb-6">{{$post->title}}</h1>
      
              <p class="text-gray-500 sm:text-lg mb-6 md:mb-8">
                {{$post->body}}
              </p>
            </div>
          </div>
        </div>
      </div>
@endsection