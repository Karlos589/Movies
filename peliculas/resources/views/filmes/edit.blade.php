<form action="{{ url('/filmes/' . $filme->id)}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="{{ $filme->Nombre}}">
<br/>

<label for="Genero">{{'Genero'}}</label>
<input type="text" name="Genero" id="Genero" value="{{ $filme->Genero}}">
<br/>

<label for="Descripcion">{{'Descripcion'}}</label>
<input type="text" name="Descripcion" id="Descripcion" value="{{ $filme->Descripcion}}">
<br/>

<label for="Calificacion">{{'Calificacion'}}</label>
<input type="text" name="Calificacion" id="Calificacion" value="{{ $filme->Calificacion}}">
<br/>

<label for="Duracion">{{'Duracion'}}</label>
<input type="text" name="Duracion" id="Duracion" value="{{ $filme->Duracion}}">
<br/>

<label for="Foto">{{'Foto'}}</label>
<br/>
<img src="{{ asset('storage').'/'.$filme->Foto}}" alt="" width="200">
<br/>
<input type="file" name="Foto" id="Foto" value="">
<br/>

<input type="submit" value="Modificar">

<a href="{{url('filmes')}}">Regresar</a>
</form>