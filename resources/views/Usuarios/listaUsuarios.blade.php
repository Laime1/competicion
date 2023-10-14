<!DOCTYPE html>
<html>
<head>
    <title>Mostrar Datos</title>
    <link rel="stylesheet" href="{{asset('style/lista.css')}}">

</head>
<body>
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    <h1>Datos de Usuarios</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>CI</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datos as $dato)
            <tr>
                <td>{{ $dato->nombre }}</td>
                <td>{{ $dato->apellidos }}</td>
                <td>{{ $dato->CI }}</td>
                <td>{{ $dato->email }}</td>
                <td>{{ $dato->telefono }}</td>
                <td>
                    <button onclick="window.location.href='{{ route('editarUsuario', $dato->CI) }}'" class="btEditar" >Editar</button>
                    <button onclick="mostrarModal('{{ route('eliminarUsuario', $dato->CI) }}')" class="btEditar">Eliminar</button>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="modalEliminar" class="modal" style="display: none;">
        <div class="modal-contenido">
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <button id="confirmarEliminar">Sí</button>
            <button id="cancelarEliminar">No</button>
        </div>
    </div>
    <script src="{{ asset('js/modal.js') }}"></script>
        
    
</body>
</html>
