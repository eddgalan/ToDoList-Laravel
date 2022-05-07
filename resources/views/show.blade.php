@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('TodosUpdate', ['id' => $todo->id]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if( session('success') )
                <h6 class="alert alert-success"> {{ session('success') }} </h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger"> {{ $message }} </h6>
            @enderror
            <div class="mb-3">
                <label  class="form-label" for="title"> Nombre de la tarea </label>
                <input class="form-control" type="text" name="title" value="{{ $todo->title }}" >
            </div>
            <button class="btn btn-primary w-100" type="submit" > Actualizar </button>
        </form>
    </div>
@endsection
