<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">

    <title>Resgistro</title>
</head>
<body>
    
<div class="container">
    <h1>Registrarse</h1>
    <form method="POST" action="{{ route('registro.store') }}">
        @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <div class="selected">
            <b >*</b>  
           <select name="rol" id="rol">
                <option value="">ROL</option>
                <option value="Estudiante">Estudiante</option>
                <option value="Coach">Coach</option>
                <option value="Administrador">Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <b >*</b>            <input type="text" name="nombre" id="nombre" placeholder="Nombres" class="form-control"
            wire:model="nombre" maxlength="50"
            oninput="this.value = this.value.replace(/[^a-zA-ZZñÑáéíóúÁÉÍÓÚüÜ ]/g, '')" class="form-control">
            @error('nombre') <span role="alert" >{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <b >*</b>
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos"
            wire:model="apellidos" maxlength="50"
            oninput="this.value = this.value.replace(/[^a-zA-ZZñÑáéíóúÁÉÍÓÚüÜ ]/g, '')" class="form-control">
            @error('apellidos') <span role="alert" >{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <b >*</b>            <input type="text" name="ci" id="ci" placeholder="CI" class="form-control"
            wire:model="ci" maxlength="9"
            oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control">
            @error('ci') <span class="error text-red-700 font-anek block">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <b >*</b>            <input type="email" name="email" id="email" placeholder="Email" class="form-control"
            wire:model="ci" maxlength="40"
             class="form-control" >
            @error('email') <span class="error text-red-700 font-anek block">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <b >*</b>            <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña" class="form-control">
            @error('contrasenia') <span class="error text-red-700 font-anek block">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <b >*</b>            <input type="text" name="telefono" placeholder="Telefono" id="telefono" class="form-control"
            wire:model="ci" maxlength="9"
            oninput="this.value = this.value.replace(/[^0-9]/g, '');" class="form-control" >
            @error('telefono') <span class="error text-red-700 font-anek block">{{ $message }}</span> @enderror
        </div>
        
       

        <div class="buttons">
          <button type="reset" class="btn btn-primary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <div class="register">
            @if (session('success'))
              <p>{{session('success')}}</p>
            @endif
        </div>
    </form>
</div>


</body>
</html>