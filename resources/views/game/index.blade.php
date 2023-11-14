@extends('app.base')

@section('title', 'game game List')

@section('content')

<div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">creator</th>
          <th scope="col">Year</th>
          <th scope="col">Genre</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($game as $game)
            <tr>
                <td>{{ $mgame->id }}</td>
                <td>{{ $game->title }}</td>
                <td>{{ $game->director }}</td>
                <td>{{ $game->year }}</td>
                <td>{{ $game->genre }}</td>
                <td>
                    <a class="btn-primary btn" href="{{ url('game/' . $game->id) }}">link to show</a>
                    <a class="btn-danger btn" href="{{ url('game/' . $game->id . '/edit') }}">link to edit</a>
                    <form class="formDelete" action="{{ url('game/' . $game->id) }}" method="post" style="display: inline-block">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-warning">link to delete</button>
                    </form>
                    <a data-url="{{url('game/'. $game->id) }}" class="btn-secondary btn hrefDelete" href="  " style="display:inline-block" >link to delete</a>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
    <a class="btn-info btn" href="{{ url('game/create') }}">link to create</a>
    <form id="formDelete" action="" method="post" style="display: inline-block">
         @csrf
         @method('delete')
    </form>
</div>

<script>
  const forms = document.querySelectorAll(".formDelete");
  forms.forEach(function(form) {
      form.onsubmit = (event) => {
          return confirm('¿Seguro?');
      };
  });
  const ahrefs = document.querySelectorAll(".hrefDelete");
  const formDelete = document.getElementById('formDelete');
  orms.forEach(function(ahref) {
      ahref.onclick = (event) => {
          let url = event.target.dataset.url;
          if(confirm( 'Seguro?' )){
            form.action = url;
            form.submit();
          }
          
          //return confirm('Seguro?');
      };
  });
</script>
@endsection
