<x-app-layout>
    <!--Cover Page-->
    <section class="bg-gray-700 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h1 class="text-xl mb-3">{{$course->subtitle}}</h1>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"> Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="far fa-star"></i> Calificacion: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <!--Description-->
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 my-5">
        <div class="order-2 lg:col-span-2 lg:order-1">

            <section class="card mb-12">
                <div class="px-6 py-4">
                    <h1 class="font-bold text-2xl mb-4">Lo que aprenderás</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">

                        @foreach ($course->goals as $goal)
                            <li class="text-gray text-base"><i class="fas fa-check-circle text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @endforeach

                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-fold text-3xl mb-2 font-bold">Temario</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" @if ($loop->first) x-data="{open: true}" @else x-data="{open: false}" @endif>

                        <header class="border border-gray-200 px-4 cursor-pointer bg-gray-200 py-3" x-on:click="open=!open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-3">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>

                    </article>
                @endforeach

            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl mb-2">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>                        
                    @endforeach
                </ul>
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl mb-2">Descripción</h1>

                <div class="text-gray-700 text-base">
                    {!!$course->description!!}
                </div>
            </section>

            @livewire('courses-reviews', ['course' => $course])
        </div>

        <div class="order-1 lg:order-2">
            <!--Teacher-->
            <section class="card mb-5">
                <div class="px-6 py-4">
                    <div class="flex items-center">
                        <!--Photo Teacher-->
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">

                        <!--Description Teacher-->
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@'. Str::slug($course->teacher->name,'')}}</a>
                        </div>
                    </div>

                    <!--Going to the Course-->
                    @can('enrolled', $course)
                        <a href="{{route('course.status',$course)}}" class="block text-center w-full mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Continuar con el curso</a>
                    @else
                    @if ($course->price->value==0)
                        <p class="mt-3 text-gray-500 font-bold text-2xl">GRATIS</p>
                        <form action="{{route('courses.enrolled',$course)}}" method="POST">
                            @csrf
                            <button type="submit" class="block text-center w-full mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Llevar este curso</button>
                        </form>
                    @else
                        <p class="mt-3 text-gray-500 font-bold text-2xl">US$ {{$course->price->value}}</p>
                        <a href="{{route('payment.checkout',$course)}}" class="block text-center w-full mt-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Comprar este curso</a>
                    @endif
                        
                    @endcan

                </div>
            </section>

            <!--Aside-->
            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img src="{{Storage::url($similar->image->url)}}" alt="" class="h-24 w-32 object-cover shadow-lg">
                        <div class="ml-3">

                            <h1>
                                <a class="font-bold text-gray-500 mb-3 text-sm" href="{{route('courses.show',$similar)}}">{{Str::limit($similar->title,40)}}</a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">
                                <p class="ml-2 text-gray-700 text-xs ">Prof. {{$similar->teacher->name}}</p>
                            </div>
                            <div class="flex">
                                <ul class="flex text-xs">
                                    <li class="mr-1"><i class="fas fa-star text-{{$similar->rating>=1?'yellow':'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$similar->rating>=2?'yellow':'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$similar->rating>=3?'yellow':'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$similar->rating>=4?'yellow':'gray'}}-400"></i></li>
                                    <li class="mr-1"><i class="fas fa-star text-{{$similar->rating==5?'yellow':'gray'}}-400"></i></li>
                                </ul>
                                <p class="text-xs text-gray-500 ml-1">{{$similar->rating}}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>