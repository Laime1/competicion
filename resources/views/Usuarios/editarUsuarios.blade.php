<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">

    <title>Editar Usuario</title>
</head>
<body>
    

<div class="container">
    @if (session('success'))
    <li>{{session('success')}}</li>
    @endif
    <h1>Actualizacion de Usuarios</h1>


    <form method="post" action="{{ route('actualizarUsuario',$usuario->CI) }}" >
        @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <div class="form-group1">
            <label for="nombre">Nombres:</label>
            <input type="text" name="nombre" id="nombre" value="{{$usuario->nombre}}"class="form-control">
        </div>
        <div class="form-group1">
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="{{$usuario->apellidos}}" class="form-control">
        </div>
        <div class="form-group1">
            <label for="ci">CI:</label>
            <input type="text" name="ci" id="ci" value="{{$usuario->CI}}" class="form-control">
        </div>
        <div class="form-group1">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{$usuario->email}}" class="form-control">
        </div>
        <div class="form-group1">
            <label for="telefono">Telefono:</label>
            <input type="text" name="telefono" id="telefono" value="{{$usuario->telefono}}" class="form-control">
        </div>
        
        <div class="buttons">
            <button type="submit" name="accion" value="cancelar" class="btn btn-primary">Cancelar</button>
            <button type="submit" name="accion" value="guardar" class="btn btn-primary">Guardar</button>
        </div>
    </form>

    
</div>


</body>
</html>