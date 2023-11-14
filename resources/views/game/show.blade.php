@extends('app.base')

@section('title', 'game game')

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $game->id }}</td>
            </tr>
            <tr>
                <td>Title</td>
                <td>{{ $game->title }}</td>
            </tr>
            <tr>
                <td>Director</td>
                <td>{{ $game->creator }}</td>
            </tr>
            <tr>
                <td>Year</td>
                <td>{{ $game->year }}</td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>{{ $game->genre }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection