
@extends('app.base')

@section('title', 'Argo Movie List')

@section('content')

<!-- Crear 3 select  -->
<select name="pais" id="pais" class="form-select"  >
    <option hidden value="&nbsp">Selecciona el pais</option>
    @foreach ($paises as $value => $label)
        <option value="{{ $value }}" {{ $pais == $value ? 'selected' : ''}} >{{ $label }}</option>
    @endforeach
    
</select>
<br>
<select name="provincia" id="provincia" class="form-select"  >
    <option disable value="">Selecciona la provincia</option>
    @foreach ($provincias as $value => $label)
        <option value="{{ $value }}" {{ $provincia == $value ? 'selected' : ''}}>{{ $label }}</option>
    @endforeach
   
</select>
<br>

<select name="country" id="country" class="form-select"  >
     <option disable value="">Selecciona la country</option>
    @foreach ($countries as $country)
        <option value="{{ $country == Code}}" {{ $selectedCountry ==$country-> code ? 'selected' : ''}}>{{$country->name}}</option>
    @endforeach
    
</select>
<br>
@endsection        
        