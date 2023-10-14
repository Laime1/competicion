<!-- resources/views/create.blade.php -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('style/formulario.css')}}">

    <title>Registro de Eventos</title>
</head>
<body>
    
<div class="container">
    @if (session('success'))
    <li>{{session('success')}}</li>
@endif
    <h1>Crear evento</h1>
    <form method="POST" action="{{ route('registro.store') }}">
        @csrf <!-- Agrega el token CSRF para protección contra ataques CSRF -->
        <div class="form-group">
          <label for="event_name">Titulo:</label><br>
          <input type="text" id="event_name" name="event_name"><br>
          <label for="event_date">Fecha:</label><br>
          <input type="date" id="event_date" name="event_date"><br>
          <label for="event_time">Hora:</label><br>
          <input type="time" id="event_time" name="event_time"><br>
          <label for="event_location">Lugar:</label><br>
          <input type="text" id="event_location" name="event_location"><br>
          <label for="">Imagen:</label>
          <input type="file" name="imagen" id="imagen">
          <label for="event_description">Descripción:</label>
          
          <textarea id="event_description" name="event_description">
          </textarea>
        <div class="buttons">
        <button type="reset" class="btn btn-primary">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>


</body>
</html>
<!--<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/style/Registroevento.css">
  <title>Evento</title>
    <h1>CREAR EVENTO</h1>
</head>
<body>
  <div class="container">
    <form method="POST" action="{{ route('events.store') }}">
    
  </form>-->