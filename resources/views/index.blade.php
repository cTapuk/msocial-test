@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h3>Наши зарегистрированые пользователи</h3>
    </div>
    
    <div class="row justify-content-center">
        @guest
            <a href="{{route('register')}}" class="btn btn-primary">Присоединяйтесь</a>
        @endguest
    </div>

    <div class="row justify-content-center">
        
            @foreach ($users as $user)
                @if(!($loop->index % 4))
                    @if(!$loop->first)
                        </div>
                    @endif
                    <div class="card-deck mt-4">                        
                @endif

                @include('card')

            @endforeach
    </div>
</div>
@endsection