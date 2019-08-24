<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
            @guest
                <navbar-component
                    :app-name="{{json_encode('LA 24 GNC')}}" 
                    :url="{{json_encode(url('/'))}}" 
                    :route-login="{{ json_encode(route('login')) }}"
                    :asset="{{ json_encode(asset('icons/ic_brand.png'))}}" 
                    :is-guest="{{json_encode(true)}}"
                    :has-register="{{json_encode(false)}}"
                    :user-name="{{json_encode("")}}">
                </navbar-component>
            @else
                <div class="content">
                    <div id="sidebar" class="sidebar-expanded">
                        <sidebar-component></sidebar-component>
                    </div>
                    <navbar-component 
                        :app-name="{{json_encode('LA 24 GNC')}}"
                        :url="{{json_encode(url('/'))}}" 
                        :route-login="{{ json_encode(route('login'))}}"
                        :route-logout="{{ json_encode(route('logout')) }}"
                        :asset="{{ json_encode(asset('icons/ic_brand.png'))}}" 
                        :is-guest="{{json_encode(false)}}"
                        :has-register="{{json_encode(true)}}"
                        :user-name="{{json_encode(Auth::user()->name)}}">
                        @csrf
                    </navbar-component>
                    <router-view></router-view>
                </div>
            @endguest
           
        <div class="mt-5">
            @yield('content')
        </div>
    </div>
</body>
</html>
