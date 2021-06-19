<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner/>

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            
            <!-- Page Content -->
            <div class="container py-8 grid grid-cols-5 gap-6">
                
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion del curso</h1>
                    <ul class="text-sm text-gray-600 mb-4">
                        <li class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit', $course)}}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs ('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes</a>
                        </li>

                        @if ($course->observation)
                            <li class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.observation', $course) border-indigo-400 @else border-transparent @endif pl-2">
                                <a href="{{route('instructor.courses.observation', $course)}}">Observaciones</a>
                            </li>                            
                        @endif
                    </ul>

                    @switch($course->status)
                    @case(1)
                        <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">Solicitar revisión</button>
                        </form>
                        @break
                    @case(2)
                        <div class="card"><div class="px-5 py-4 text-gray-500"><p>Este curso se en cuentra en revison</p></div></div>                        
                        @break
                    @case(3)
                        <div class="card"><div class="px-6 py-8 text-gray-500"><p>Este curso se en cuentra publicado</p></div></div>
                        @break
                    @endswitch
                    

                </aside>
                
                <div class="col-span-4 card"><main class="px-6 py-4 text-gray-600">{{$slot}}</main></div>
            </div>
        

        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{ $js }}
        @endisset

    </body>
</html>
