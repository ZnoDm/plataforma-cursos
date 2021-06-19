<div>
    <article class="card" x-data="{open:false}">
        <div class="px-6 py-3 bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full"></textarea>
                        @error('description.name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="destroy" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer ml-2">Eliminar</button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer ml-2">Actualizar</button>
                        </div>
                    </form>
                @else                   
                    <div>
                        <textarea wire:model="name" class="form-input w-full" placeholder="Agrege una descripción..."></textarea>
                        @error('name')
                        <span class="text-xs text-red-600">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer ml-2">Agregar</button>
                        </div>
                    </div>  
                @endif    


            </div>
        </div>

    </article>
</div>
