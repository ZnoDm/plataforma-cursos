<div>
    @foreach ($section->lessons as $item)

        <article class="card mt-4" x-data="{open: false}">
            <div class="px-6 py-3">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex items-center">
                            <label class="w-32">Nombre: </label>
                            <input type="text" wire:model="lesson.name" class="form-input block w-full p-2">
                        </div>

                        @error('lesson.name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                        @enderror

                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="lesson.platform_id" class="w-full">
                                @foreach ($platforms as $platform)
                                    <option value={{$platform->id}}>{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center mt-4">
                            <label class="w-32">URL: </label>
                            <input type="text" wire:model="lesson.url" class="form-input block w-full p-2">
                        </div>

                        @error('lesson.url')
                        <span class="text-xs text-red-600">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button wire:click="cancel" type="button" class="text-sm font-bold bg-red-500 hover:bg-red-700 text-white py-2 px-3 rounded cursor-pointer">Cancelar</button>
                            <button type="submit" class="text-sm font-bold bg-blue-500 hover:bg-blue-700 text-white py-2 px-3 rounded cursor-pointer ml-2">Actualizar</button>
                            
                        </div>

                    </form>
                @else
                    <header>
                        <h1 x-on:click="open=!open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i>Lección: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">

                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a href="{{$item->url}}" class="text-blue-600" target="_blank">{{$item->url}}</a></p>

                        <div class="my-2">
                            <button wire:click="edit({{$item}})" class="text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-2 px-3 rounded cursor-pointer ml-2">Editar</button>
                            <button  wire:click="destroy({{$item}})" class="text-sm font-bold bg-red-500 hover:bg-red-700 text-white py-2 px-3 rounded cursor-pointer">Eliminar</button>
                            
                        </div>

                        <div>
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-'.$item->id))
                        </div>

                        <div class="my-3">
                            @livewire('instructor.lesson-resource', ['lesson' => $item], key('lesson-resource-'.$item->id))
                        </div>

                    </div>
                @endif
            </div>
        </article>
        
    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer justify-center">
            <i class="far fa-plus-square text-2xl mr-2 text-red-500 "></i>
            Agregar nueva lección
        </a>

        <article class="card" x-show="open">
            <div class="px-6 py-4">
                <h1 class="text-xl font-bold">Agregar nueva lección</h1>

                <div class="my-4">
                    <div class="flex items-center">
                        <label class="w-32">Nombre: </label>
                        <input type="text" wire:model="name" class="form-input block w-full p-2">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">

                        <label class="w-32">Plataforma: </label>
                        <select wire:model="platform_id" class="w-full">
                            @foreach ($platforms as $platform)
                                <option value={{$platform->id}}>{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL: </label>
                        <input type="text" wire:model="url" class="form-input block w-full p-2">
                    </div>

                    @error('url')
                        <span class="text-xs text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button x-on:click="open = !open" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">Cancelar</button>
                    <button wire:click="store" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer ml-2">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
