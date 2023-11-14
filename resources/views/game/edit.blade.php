@extends('app.base')

@section('title','game edit game')

@section('content')



<form action="{{ url('game/' . $game->id) }}" method="post">

    <!-- Solución de error por CSRF -->
    <!--<input type="hidden" name="_method" value="put">-->
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
    @method('put')
    @csrf

    <!-- Inputs del formulario -->

    <div class="mb-3">

        <label for="title" class="form-label">Game title</label>

        <input type="text" class="form-control" id="title" name="title" maxlength="60" required value="{{old('title', $game->title) }}">

    </div>

    <div class="mb-3">

        <label for="creator" class="form-label">game creator</label>

        <input type="text" class="form-control" id="creator" name="creator" maxlength="110" required value="{{ old('creator', $game->creator) }}">

    </div>

    <div class="mb-3">

        <label for="year" class="form-label">game year</label>

        <input type="number" class="form-control" id="year" name="year" step="1" min="1" max="9999" required value="{{old('year', $game->year) }}">

    </div>

    <div class="mb-3">

        <label for="genre" class="form-label">game genre</label>

        <input type="text" class="form-control" id="genre" name="genre" maxlength="50" value="{{old('genre', $game->genre) }}">

    </div>

    <!--<input type="submit" class="btn btn-success" value="Edit">-->
    <button type="submit" class="btn btn-success">Editar</button>

</form>

@endsection