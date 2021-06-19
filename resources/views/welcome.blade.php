<x-app-layout>

    <!-- Cover Page -->
    <section class="bg-cover" style="background-image: url({{asset('img/home/people-2557396_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <!-- Title -->
                <h1 class="text-white font-bold text-4xl">Home</h1>
                <p class="text-white text-lg mt-2 mb-4">lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe.</p>

                @livewire('search')
            </div>
        </div>    
    </section>

    <!-- Content -->
    <section class="mt-24">
        <h1 class="text-gray-600 text-center font-bold text-3xl mb-6">Contenido</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/board-453758_640.jpg')}}" alt="img1">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contenido 1</h1>
                </header>
                <p class="text-gray-500 text-sm">lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/cell-phone-1245663_640.jpg')}}" alt="img2">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contenido 2</h1>
                </header>
                <p class="text-gray-500 text-sm">lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/laptop-1148958_640.jpg')}}" alt="img3">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contenido 3</h1>
                </header>
                <p class="text-gray-500 text-sm">lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/programming-1873854_640.jpg')}}" alt="img4">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contenido 4</h1>
                </header>
                <p class="text-gray-500 text-sm">lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe lorem qweqweqwe.</p>
            </article>

        </div>
        
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-white text-center font-bold text-3xl mb-1">¿No sabes qué curso llevar?</h1>
        <p class="text-center text-white"> Dirigite al catalago de cursos para mayor informacion</p>
        
        <!-- Button -->
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}} " class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                Catalago de cursos
            </a>
        </div>
    </section>

    <!-- Courses -->
    <section class="py-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-600 text-sm mb-6"> Nuevo video cada semana! </p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach

        </div>
    </section>

</x-app-layout>
