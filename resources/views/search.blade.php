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
                @if (!empty($user->description))
                <p class="text-gray-300">{{Str::limit($user->description,30)}}</p>
                @else
                <p class="text-gray-300">PrivBloger</p>
                @endif
              </div>
              
            </div>

            <div class="flex items-center">
              @if ($user->id != Auth::user()->id)
                    
              <form action="{{route('follow')}}" method="post">
                @csrf
                <input type="text" name="followed_id" class="hidden" value="{{$user->id}}">
                <button type="submit" class="bg-gray-700 text-white rounded text-sm px-3 py-2">
                  
                  @if($follow->where('follower_id',Auth::user()->id)->where('followed_id',$user->id) == null)
                  Seguir <i class="fa-solid fa-check"></i>
                  @else
                  Dejar de seguir &nbsp<i class="fa-solid fa-xmark"></i>
                  @endif
                </button>
              </form>

              @endif
            </div>
          </div>
        @endforeach


    {{-- <div class="py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
      
          <div class="grid grid-cols-2 md:grid-cols-4 gap-x-4 lg:gap-x-8 gap-y-8 lg:gap-y-12">
            <!-- person - start -->
            @foreach ($users as $user)
                
            <div class="flex flex-col items-center">
              <div class="w-24 md:w-32 h-24 md:h-32 bg-gray-800 rounded-full overflow-hidden shadow-lg mb-2 md:mb-4">
                <img src="{{$user->photo}}" loading="lazy" alt="{{$user->username}} photo" class="w-full h-full hover:scale-110 transition
                duration-200 object-cover object-center" />
              </div>
      
              <div>
                <a href="{{route('profile',$user)}}" class="text-gray-300 md:text-lg font-bold text-center hover:text-teal-200">{{$user->name}} {{$user->lastname}}</a>
                @if (!empty($user->description))
                <p class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">{{Str::limit($user->description,30)}}</p>
                @else
                <p class="text-gray-500 text-sm md:text-base text-center mb-3 md:mb-4">PrivBloger</p>
                @endif

               
              </div>
            </div> 
            
            
            @endforeach
            
            <!-- person - end -->
            
          </div>
        </div>
        --}}
      </div>
      </div>
    @else
        <h1 class="text-white text-center mt-36 opacity-50">Aqui apareceran tus resultados de busqueda</h1>
    @endif
</div>


</div>

@endsection