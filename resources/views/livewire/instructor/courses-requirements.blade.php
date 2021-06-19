<section>
    <h1 class="text-2xl font-bold">REQUERIMIENTOS DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->requirements as $item)

        <article class="card mb-4">
            <div class="px-6 py-4 bg-gray-100">
                @if ($requirement->id==$item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="requirement.name" class="form-input block w-full p-2">
                        @error('requirement.name')
                            <span class="text-xs text-red-600">{{$message}}</span>
                        @enderror
                    </form>
                @else
                           
                    <header class="flex justify-between items-center">            
                        <h1>{{$item->name}}</h1>
                        <div>
                            <i wire:click="edit({{$item}})" class="fas fa-edit cursor-pointer text-blue-500"></i>
                            <i wire:click="destroy({{$item}})" class="ml-2 fas fa-eraser cursor-pointer text-red-500"></i>
                        </div>
                            
                    </header>
                @endif 
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="px-6 py-4 bg-gray-100">
            <form wire:submit.prevent="store" >
                <input wire:model="name" class="form-input block w-full p-2" placeholder="Agrega el nombre de un requerimiento">

                @error('name')
                    <span class="text-xs text-red-600">{{$message}}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer ml-2">Agregar requerimiento</button>
                </div>
            </form>
        </div>
    </article>

</section>
