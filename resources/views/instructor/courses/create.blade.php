<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>
                <hr class="mt-2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store','files'=> true ,'autocomplete'=>'off']) !!}

                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                    
                    @include('instructor.courses.partials.form')
                    
                    <div class="flex justify-end">
                        {!! Form::submit('Crear curso', ['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer']) !!}
                    </div>
                
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/instructor/courses/form.js')}}">           
            
        </script>
    </x-slot>
</x-app-layout>