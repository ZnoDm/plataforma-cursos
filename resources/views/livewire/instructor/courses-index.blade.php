<div class="container py-8">

    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input class="flex-1 bg-white border-gray-300 h-10 px-5 rounded-lg focus:outline-none" wire:keydown="limpiar_page" wire:model="search" placeholder="Ingrese el nombre de un curso..." >

            <a class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" href="{{route('instructor.courses.create')}}">Crear nuevo curso</a>
        </div>
        @if ($courses->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificacion
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($courses as $course)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img id="picture" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="h-10 w-10 rounded-full object-cover object-center" alt="Foto de pueba">
                                            
                                        @endisset
                                        
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$course->title}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{$course->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$course->students->count()}}</div>
                                <div class="text-sm text-gray-500">Alumnos matriculados</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">                                
                                    <ul class="flex text-sm pr-1">
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating>=1?'yellow':'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating>=1?'yellow':'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating>=1?'yellow':'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating>=1?'yellow':'gray'}}-400"></i></li>
                                        <li class="mr-1"><i class="fas fa-star text-{{$course->rating>=1?'yellow':'gray'}}-400"></i></li>
                                    </ul>
                                    ({{$course->rating}})
                                </div>
                                <div class="text-sm text-gray-500">Valoración del curso</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revision
                                        </span>
                                        @break
                                    @case(3)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break
                                    @default
                                        
                                @endswitch
                                
                            </td>
                            
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('instructor.courses.edit',$course)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">Editar</a>
                            </td>
                        </tr>                    
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No existen coincidencias
            </div>
        @endif

        

        <div class="px-6 py-4">
            {{$courses->links()}}
        </div>
    </x-table-responsive>
    
        
</div>
  