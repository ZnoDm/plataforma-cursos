<form class="mx-auto pt-2 relative text-gray-600" autocomplete="off">
    <input wire:model="search" type="search" name="search" placeholder="Search" class="w-full bg-white border-gray-300 h-10 px-5 rounded-lg text-sm focus:outline-none">

    <button type="submit" class="text-white py-2 px-4 bg-blue-500 hover:bg-blue-700 rounded top-0 mt-2 absolute right-0 font-bold">Search</button>
    
    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white rounded-lg overflow-hidden mt-1">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 cursor-pointer hover:bg-gray-300">
                    <a href="{{route('courses.show',$result)}}">{{$result->title}}</a>
                </li>
            @empty
                <li class="leading-10 px-5 cursor-pointer hover:bg-gray-300">
                    No hay ninguna coincidencia :(
                </li>
            @endforelse
        </ul> 
    @endif
    
</form>
