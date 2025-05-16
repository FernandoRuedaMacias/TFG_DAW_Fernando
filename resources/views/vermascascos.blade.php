<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bicicleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    " rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ URL::to('/images/favicon.jpeg')}}">
</head>
<style>

footer {
        text-align: center; 
        padding: 20px; 
        background-color: #0f0f0f; 
    }

    footer a , p ,h5{
      color:white;
    }

    .footer-content {
        display: flex; 
        justify-content: center; 
        gap: 50px; 
        margin-bottom: 20px; 
    }

    .contact-info {
        margin: 0 auto; 
        display: inline-block; 
    }
    h1{
      text-align: center
    }

    .center {
  margin: auto;
  width: 20%;
  padding: 10px;
}
#texto1{
  color:black;
}
span{
    color:red;
    font-size:12px;
}

h2{
      margin-left:20px;
    }
</style>
<body>
    <hr>

    <div class="d-flex justify-content-center">
      <a href="{{ route('Inicio') }}">
          <button id="button" type="button" class="btn btn-lg btn-dark" style="max-width: 400px; width: 100%;">
              Volver
          </button>
      </a>
  </div>
  <br><br>
      
      <div class="container">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header">
              <h4 class="my-0 font-weight-normal">{{$casco->id}}</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled mt-3 mb-4">
                <li><strong>Tamaño: </strong>{{$casco->tamanyo}}</li>
                <li><strong>Color: </strong>{{$casco->color}}</li>
                <li><strong>Precio: </strong>{{$casco->precio}} €</li>
                <img src="{{$casco->imagen}}" width=250 height=200>
              </ul>
              <a href="{{ route('almacenarproducto', ['id' => $casco->id, 'tipo' => 'casco'])}}"><button id="boton" type="button" class="btn btn-lg btn-block btn btn-outline-secondary">Añadir al carrito</button></a>
            </a>
            </div>
          </div>
          </div>
        </div>

      @if (Route::has('login'))
      @auth
      <form action="{{ route('almacenaresenya', ['id' => $casco->id, 'tipo' => 'casco']) }}" method="POST" class="container mt-4">
        @csrf
        <h2 class="mb-4">¿Qué te ha parecido este producto?</h2>
        
        <div class="mb-3">
            <label for="estrellas" class="form-label">Valoración (1-5)</label>
            <input type="number" class="form-control" id="estrellas" name="estrellas" min="0" max="5" step="0.1">
            @error('estrellas')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Comentarios:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-lg btn-block btn btn-outline-secondary">Publicar reseña</button>
    </form>
    @else
    <div class="center">
      <p style="color:#0c0d0d">Inicia sesión para publicar una reseña</p>
          <a href="{{ route('login') }}">
            <button class="btn btn-outline-secondary" id="loginsec">Iniciar Sesión</button>
          </a>
      </div>
      @endauth
    @endif

    <h2>Reseñas de los usuarios:</h2>

    @foreach($resenyas as $resenya)
    <div class="card" style="width: 98%; margin-left: 10px; margin-top: 10px; margin-bottom: 10px;">
        <div class="card-body">
          <p class="card-subtitle mb-2 text-muted">{{ $resenya->fecha }} </p>
            <strong>Usuario: </strong> <p class="card-title">{{ $resenya->nombreusuario }}</p>
            <strong>Valoración: </strong> <p class="card-subtitle mb-2 text-muted">{{ $resenya->estrellas }}/5</p>
            <p class="card-text" id="texto1">{{ $resenya->descripcion }}</p>
            
            @auth
                @if (auth()->user()->name == $resenya->nombreusuario)
                    <a href="{{ route('borraresenya', ['id' => $resenya->id, 'tipo' => 'casco']) }}" class="card-link">Eliminar reseña</a>
                @endif
            @endauth
        </div>
    </div>
@endforeach
          <hr>
    <footer>
      <h5>©HIKERCHAMP INC</h5>
    
      <div class="footer-content">
          <ul>
              <p>Documentación</p>
              <li><a href="#">Aviso Legal</a></li>
              <li><a href="#">Cookies</a></li>
              <li><a href="#">Política de privacidad</a></li>
              <li><a href="#">Envíos y Entregas</a></li>
          </ul> 
    
          <ul>
              <p>Síguenos en redes sociales</p>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
          </ul> 
      </div>
    
      <ul class="contact-info">
          <p>Datos de contacto</p>
          <li><a href="#">Dirección: Calle Villalba Nº 5</a></li>
          <li><a href="#">Correo: Hikerchampinc@hotmail.com</a></li>
          <li><a href="#">Número de teléfono: 6782460934</a></li>
      </ul> 
    </footer>

    <script>
      //Avisa si se añade producto al carrito
      const nodeList = document.querySelectorAll("#boton");
      const carrito = document.getElementById("micarrito");
      
      function myFunction() {
          alert("Se ha añadido el producto al carrito");
      }
      
      for (let i = 0; i < nodeList.length; i++) {
          nodeList[i].addEventListener("click", myFunction);
      }   
  
    </script>
</body>
</html>