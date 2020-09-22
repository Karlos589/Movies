Inicio (Despliege de datos)

<a href="{{url('filmes/create')}}" class="btn btn-success">Agregar Pelicula</a>
<br/>
<br/>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Genero</th>
            <th>Descripcion</th>
            <th>Calificacion</th>
            <th>Duracion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filmes as $filme)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
            
            <img src="{{ asset('storage').'/'.$filme->Foto}}" alt="" width="200">
            
            
            </td>
            <td>{{ $filme->Nombre}}</td>
            <td>{{ $filme->Genero}}</td>
            <td>{{ $filme->Descripcion}}</td>
            <td>{{ $filme->Calificacion}}</td>
            <td>{{ $filme->Duracion}}</td>
            <td>

            <a href="{{ url('/filmes/'.$filme->id.'/edit') }}">
            Editar
            </a>
                <form method="post" action="{{ url('/filmes/'.$filme->id) }}"></form>
                {{csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>