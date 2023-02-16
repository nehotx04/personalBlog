@extends('template')
@section('title')
    Buscando...
@endsection

@section('body')

<div class="container mx-auto px-4">

@include('partials.search')
<div class="mt-2">
    @if (!empty($search))
    <h1 class="text-gray-100 text-center text-2xl">Resultados para: {{$search}}</h1>    
    @else
    <h1 class="text-gray-100 text-center text-2xl">Realiza una busqueda desde aqui!</h1>    
    @endif
    
    @if (!empty($users))

      <div class="w-full py-6 px-8 rounded">
        @foreach ($users as $user)
          <div class="w-full rounded-lg bg-gray-800 py-4 px-4 mb-5 grid grid-cols-6">
            <div class="col-span-5 inline-flex">

              <a href="{{route('profile',$user)}}" title="{{$user->name}} {{$user->lastname}}">
                <div class="rounded-full w-24 bg-gray-900 mr-6">
                  <img src="{{$user->photo}}" loading="lazy" alt="{{$user->username}} photo"/>
                </div>
              </a>
              
              <div class="my-4">
                <a href="{{route('profile',$user)}}">
                  <span class="text-white text-xl hover:underline">{{$user->name}} {{$user->lastname}}</span>
                </a>
                <p class="text-gray-300">{{$user->followers}} Seguidores</p>
                @if (!empty($user->description))
                <p class="text-gray-300">{{Str::limit($user->description,30)}}</p>
                @else
                <p class="text-gray-300">PrivBloger</p>
                @endif
              </div>
              
            </div>
          </div>
        @endforeach
      </div>
      </div>
    @else
        <h1 class="text-white text-center mt-36 opacity-50">Aqui apareceran tus resultados de busqueda</h1>
    @endif
</div>


</div>

@endsection