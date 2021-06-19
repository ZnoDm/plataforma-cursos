<div>
    <!--Image-->
    <div class="flex max-h-96">
        <img class="max-w-full object-cover" src="{{asset('img/courses/office-381228_1920.jpg')}}" >
    </div>
    
    <!--Filter-->
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg mr-4 focus:outline-none" wire:click="resetFilters">    
                <i class="fas fa-border-all text-xs mr-2"></i>
                Todos los cursos
            </button>

            <!-- Dropdown Categorias -->
            <div class="relative mr-4" x-data="{open:false}">
                <button class="block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fas fa-book-reader text-xs mr-2"></i>
                    Categoria
                    <i class="fas fa-chevron-down text-xs ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute left-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $categorie)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" x-on:click="open=false" wire:click="$set('category_id',{{$categorie->id}})">{{$categorie->name}}</a>
                    @endforeach
                </div>
            </div> 
            
            <!-- Dropdown Niveles-->
            <div class="relative mr-4" x-data="{open:false}">
                <button class="block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow px-4 text-gray-700" x-on:click="open = !open">
                    <i class="fas fa-book-reader text-xs mr-2"></i>
                    Niveles
                    <i class="fas fa-chevron-down text-xs ml-2"></i>
                </button>

                <!-- Dropdown Body -->
                <div class="absolute left-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    @foreach ($levels as $level)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" x-on:click="open=false" wire:click="$set('level_id',{{$level->id}})">{{$level->name}}</a>
                    @endforeach
                </div>
            </div>

        </div>    
    </div>
    <!--Courses-->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach

    </div>
    <!--Pagination-->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        {{$courses->links()}}
    </div>
</div>
