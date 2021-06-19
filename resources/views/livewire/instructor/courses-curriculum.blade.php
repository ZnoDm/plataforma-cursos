<div>

    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->sections as $item)

        <article class="card mb-6" x-data="{open:true}">
            <div class="px-6 py-4 bg-gray-100">

                @if ($section->id == $item->id)

                <form wire:submit.prevent="update">
                    <input wire:model="section.name" class="form-input block w-full p-2" placeholder="Ingrese el nombre de la sección">

                    @error('section.name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                    @enderror
                </form>
                    
                @else
                    <header class="flex justify-between items-center">                        
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Sección: </strong>{{$item->name}}</h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                            <i class="pl-2 fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                    
                @endif                

            </div>
        </article>

    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer justify-center">
            <i class="far fa-plus-square text-2xl mr-2 text-red-500 "></i>
            Agregar nueva sección
        </a>

        <article class="card" x-show="open">
            <div class="px-6 py-4 bg-gray-100">
                <h1 class="text-xl font-bold">Agregar nueva sección</h1>

                <div class="my-4">
                    <input wire:model="name" type="text" class="form-input block w-full p-2" placeholder="Escriba el nombre de la seccion">
                    @error('name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button x-on:click="open = false" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">Cancelar</button>
                    <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer ml-2">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
