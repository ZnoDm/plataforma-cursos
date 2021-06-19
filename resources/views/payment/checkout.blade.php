<x-app-layout>

    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold mb-2">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="px-4 py-6">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto">US$ {{$course->price->value}}</p>
                </article>

                <div class="flex justify-end my-4">
                    <a href="{{route('payment.pay',$course)}}" class="block text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4">Comprar este curso</a>
                </div>

                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quam dolorem cum repellat enim et, voluptate sequi nemo tenetur, aperiam quas asperiores reiciendis vero omnis facere delectus minima, natus repellendus. <a href="" class="font-bold">Términos y condiciones</a></p>
            </div>
        </div>
    </div>
</x-app-layout>