
        
@extends('app.base')

@section('title', 'Argo Movie List')

@section('content')

<form action="{{url('setting')}}" method="post">
  
  @method('put')
  @csrf
  
  <div>
    Behaviour after inserting new movie
  </div>
  <input  class="form-check-input" type="radio" id="showMovie" name="afterInsert" value="show movies" @if(session('afterInsert', 'show movies')=='show movies') checked @endif>
  <label class="form-check-label" for="showMovie">
    Show all movies list
  </label>
  
  <br>
  <input  class="form-check-input" type="radio" id="createMovie" name="afterInsert" value="show create form" @if(session('afterInsert', 'show movies')== 'show create form') checked @endif>
  <label class"form-check-label" for="createMovie">
    Show create new movie form
  </label>
  <br>
  <br>
  
  <!--
  <input  class="form-check-input" type="radio" id="showMovie2" name="createMovie2" value="show create form" {{$checkedList}}>
  <label class"form-check-label" for="createMovie">
    Show all new movie form
  </label>
  <br>
  <br>
  
  <input  class="form-check-input" type="radio" id="createMovie2" name="createMovie2" value="show create form" {{$checkedList}}>
  <label class"form-check-label" for="createMovie">
    Show create new movie form
  </label>
  <br>
  <br>
  -->
  <label for="editMovie">Behaviour after editing new movie</label>
  
  <select  name="editMovie" id="editMovie" class="form-select" aria-label="Default select example">
    
    @foreach ($afterEditOptions as $value => $label)
        <option value="{{ $label }}" {{$selectedEditOptions== $value ? 'selected' : ''}}>{{$label}}/option>
    @endforeach
  </select>
  <br>
  <button type="submit" class="btn btn-primary">Save setting</button>
  
  
</form>

@endsection        
        