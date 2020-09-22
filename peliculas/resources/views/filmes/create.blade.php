Seccion  para crear filmes

<form action="{{ url('/filmes')}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}

<label for="Nombre">{{'Nombre'}}</label>
<input type="text" name="Nombre" id="Nombre" value="">
<br/>

<label for="Genero">{{'Genero'}}</label>
<input type="text" name="Genero" id="Genero" value="">
<br/>

<label for="Descripcion">{{'Descripcion'}}</label>
<input type="text" name="Descripcion" id="Descripcion" value="">
<br/>

<label for="Calificacion">{{'Calificacion'}}</label>
<input type="text" name="Calificacion" id="Calificacion" value="">
<br/>

<label for="Duracion">{{'Duracion'}}</label>
<input type="text" name="Duracion" id="Duracion" value="">
<br/>

<label for="Foto">{{'Foto'}}</label>
<input type="file" name="Foto" id="Foto" value="">
<br/>

<input type="submit" value="Agregar">

<a href="{{url('filmes')}}">Regresar</a>

</form>