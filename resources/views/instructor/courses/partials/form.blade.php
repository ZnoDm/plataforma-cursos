<div class="mb-4">
    {!! Form::label('title','Titulo del curso: ') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1' .($errors->has('title')?' border-red-600':'')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso: ') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly','class' => 'form-input block w-full mt-1'.($errors->has('slug')?' border-red-600':'')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle','Subtítulo del curso: ') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1'.($errors->has('subtitle')?' border-red-600':'')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description','Descripción del curso: ') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1'.($errors->has('description')?' border-red-600':'')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>
<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id','Categoría: ') !!}
        {!! Form::select('category_id', $categories,null, ['class'=> 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('level_id','Nivel: ') !!}
        {!! Form::select('level_id', $levels,null, ['class'=> 'form-input block w-full mt-1']) !!}
    </div>
    <div>
        {!! Form::label('price_id','Precio: ') !!}
        {!! Form::select('price_id', $prices,null, ['class'=> 'form-input block w-full mt-1']) !!}
    </div>
</div>

<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" src="{{Storage::url($course->image->url)}}" class="w-full h-64 object-cover object-center" alt="Foto definida">
        @else
        <img id="picture" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" class="w-full h-64 object-cover object-center" alt="Foto de pueba">
        @endisset
    </figure>

    <div>
        <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. At, veritatis provident. Saepe est assumenda atque! Quam ex aspernatur quos ut pariatur nam facilis! Unde adipisci dignissimos vero quasi cupiditate nesciunt.</p>
        <div class="border p-3 rounded-lg">
            {!! Form::file('file', ['class'=>'form-input w-full mt-1'.($errors->has('file')?' border-red-600':''),'id'=>'file','accept'=>'image/*']) !!}            
        </div>
        @error('file')
                <strong class="text-xs text-red-600">{{$message}}</strong>
            @enderror
        
    </div>
</div>