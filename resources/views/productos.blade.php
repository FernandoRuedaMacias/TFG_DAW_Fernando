<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    " rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ URL::to('/images/favicon.jpeg')}}">
    <title>Productos</title>
    <style>

h1{
  text-align: center;
   margin:20px;

}

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


    </style>
</head>
<body>
    <h1>Productos</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><img  src="{{ URL::to('/images/logo.jpeg') }}" width="200px" height="100px"></a>
    
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('Inicio') }}">Bicicletas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('cascos') }}">Cascos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Productos</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="{{ route('carrito') }}" class="nav-link">
              <button class="btn btn-outline-secondary">Mi carrito</button>
            </a>
          </li>
              <!--Si el usuario tiene iniciada la sesión podrá ver su cuenta, si no podrá iniciarla-->
          @if (Route::has('login'))
            @auth
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                  <button class="btn btn-outline-secondary" id="botoncuenta">Mi Cuenta</button>
                </a>
              </li>
          @else
          <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">
              <button class="btn btn-outline-secondary" id="loginsec">Iniciar Sesión</button>
            </a>
          </li>
            @endauth
          @endif
        </ul>
      </div>
    </nav>
    <br><br>
   @csrf
    <table width="100%"  class="table table-striped">
        <tr>
            <th scope="col">Tipo</th>
            <th scope="col">Color</th>
            <th scope="col">Precio</th>
            <th scope="col">Comprar</th>
            
        </tr>
    @foreach($productos as $producto)
    <tr>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->color}}</td>
        <td>{{$producto->precio}}€</td>

        <td><a href="{{ route('almacenarproducto', ['id' => $producto->id, 'tipo' => 'producto']) }}"><button id="boton" type="button" class="btn btn-dark">Añadir al Carrito</button></a></td>
    </tr>
    @endforeach
</table>

<div >{{$productos->links()}}</div>

<br><br>
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