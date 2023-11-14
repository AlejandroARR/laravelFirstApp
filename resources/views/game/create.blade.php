@extends('app.base')

@section('title', 'game Create Movie')

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <form action="{{ url('movie') }}" method="post">
            
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label><br>
                <input type="text" class="form-control" id="title" name="title" maxlength="60" required value="{{ old('title') }}"><br>
            </div>
            
            <div class="mb-3">
                <label for="creator" class="form-label">creator</label><br>
                <input type="text" class="form-control" id="creator" name="creator" maxlength="110" required value="{{ old('creator') }}"><br>
            </div>
            
            <div class="mb-3">
                <label for="year" class="form-label">Year:</label><br>
                <input type="number" class="form-control" id="year" name="year" min="1896" max="9999" required value="{{ old('year') }}" ><br>
            </div>
            
            <div class="mb-3">
                <label for="genre" class="form-label">Genre:</label><br>
                <input type="text" class="form-control" id="genre" name="genre" maxlength="50" value="{{ old('genre') }}"><br>
            </div>
            
            <input type="submit">
            
        </form>
    </table>
</div>

@endsection