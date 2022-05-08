@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <div class="row mx-auto">
            <form action="{{ route('categories.update', ['category'=> $category->id]) }}" method="POST">
                @method('PATCH')
                @csrf
                @if( session('success') )
                    <h6 class="alert alert-success"> {{ session('success') }} </h6>
                @endif
                @error('name')
                    <h6 class="alert alert-danger"> {{ $message }} </h6>
                @enderror
                <div class="mb-3">
                    <label for="name" class="form-label"> Nombre de la categoría </label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label"> Color </label>
                    <input type="color" name="color" class="form-control" value="{{ $category->color }}">
                </div>
                <button type="submit" class="btn btn-primary w-100"> Actualizar categoría </button>
            </form>

            <div>
                @if( $category->todos->count() > 0 )
                    @foreach ( $category->todos as $todo )
                        <div class="row py-1">
                            <div class="col-md-9 d-flex align-items-center">
                                <a href="{{ route('TodosShow', ['id'=> $todo->id]) }}"> {{ $todo->title }} </a>
                            </div>
                            <div class="col-md-3 d-flex justify-content-end">
                                <form action="{{ route('TodosDestroy', [$todo->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger sbn-sm">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p> No hay tareas para esta categoría </p>
                @endif
            </div>
        </div>
    </div>
@endsection
