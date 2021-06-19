<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">                
                {{$current->name}}
            </h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif

            <div class="flex justify-between mt-4">
                {{--Marcar como culminado--}}
                <div class="flex items-center cursor-pointer" wire:click="completed">

                    @if ($current->completed)
                        <i class="fas fa-toggle-on text-2xl text-blue-600 mr-2"></i>
                    @else
                        <i class="fas fa-toggle-off text-2xl text-gray-600 mr-2"></i>
                    @endif
                    
                    <p class="text-sm ">Marcar esta unidad como culminada</p>
                </div>
                @if ($current->resource)
                    <div class="flex item-center text-gray-600 cursor-pointer" wire:click="download">
                        <i class="fas fa-download text-lg text-gray-600 mr-2"></i>
                        <p class="text-sm">Descargar recurso</p>
                    </div>
                @endif
            </div>
            

            <div class="card mt-4">
                <div class="px-6 py-4 flex text-gray-500 font-bold">
                    @if ($this->previous)<a class="cursor-pointer" wire:click="changeLesson({{$this->previous}})">Tema anterior</a>@endif
                    @if ($this->next)<a class="cursor-pointer ml-auto" wire:click="changeLesson({{$this->next}})">Siguiente Tema</a>@endif
                    
                </div>
            </div>
        </div>

        <div class="card">
            <div class="px-6 py-4">
                <h1 class="text-2xl leading-8 text-center mb-4 font-bold">{{$course->title}}</h1>

                <div class="flex ">
                    <div class="ml-auto text-right mr-2">
                        <p class="font-bold">{{$course->teacher->name}}</p>
                        <a class="text-blue-400 text-sm font-bold" href="">{{'@'. Str::slug($course->teacher->name,'')}}</a>
                    </div>
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                    </figure>
                </div>

                <p></p>

                <div class="relative pt-1 mt-2">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                        <span class="text-xs font-semibold inline-block py-1 px-2 rounded-fulblue-600 text-gray-600">
                            Tu Progreso
                        </span>
                        </div>
                        <div class="text-right">
                        <span class="text-xs font-semibold inline-block text-gray-600">
                            {{$this->advance.'%'}}
                        </span>
                        </div>
                    </div>
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                        <div style="width:{{$this->advance.'%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-3">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                        <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                        <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                            
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">
                                            {{$lesson->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
