<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    " rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ URL::to('/images/favicon.jpeg')}}">
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

    h1 , h2, h3{
      text-align: center;
      margin:20px;
      margin-top:20px;
    }
    h2{
      text-decoration: underline;
    }
    </style>
</head>
<body>
    <h1>Carrito</h1>
    <!--Si el carrito tiene productos lo recorremos-->
    @if(session()->has('cart') && count(session('cart')) > 0)
        <h2 class="mt-4">Tu carrito</h2>
        <ul class="list-group">
            @foreach(session('cart') as $item => $detalles)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>Nombre:</strong> {{ $detalles['nombre'] }}<br>
                        <strong>Precio:</strong> {{ $detalles['precio'] }}€<br>
                        <img src="{{ $detalles['imagen'] }}" height="100" width="200" alt="Producto" class="img-thumbnail mt-2">
                    </div>
                    <a href="{{ route('eliminar', $item) }}">
                        <button type="button" class="btn btn-danger">Eliminar</button>
                    </a>
                </li>
            @endforeach
        </ul>
        <h3 class="mt-4">Total: {{ session('total') }}€</h3>
    @else
        <h2 class="text-center" id="mensaje1">Tu carrito está vacío</h2>
    @endif

    <!--Si el usuario tiene iniciada la sesión no tendrá que autenticarse y irá directamente al pago-->
  @if (Route::has('login'))
  @auth
      <div class="d-flex justify-content-center">
          <a id="registrar" href="{{ route('pagoficticio') }}">
              <button type="button" class="btn btn-lg btn-block btn btn-outline-secondary">Pagar pedido</button>
          </a>
      </div>

      <br><br>
  @else
      <div class="d-flex justify-content-center">
          <a id="registrar" href="{{ route('register') }}">
              <button type="button" class="btn btn-lg btn-block btn btn-outline-secondary">Pagar pedido</button>
          </a>
      </div>

      <br><br>
  @endauth
@endif

  
<div class="d-flex justify-content-center">
    <a href="{{ route('Inicio') }}">
        <button id="button" type="button" class="btn btn-lg btn-dark" style="max-width: 400px; width: 100%;">
            Volver
        </button>
    </a>
</div>

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

</table>
<script>
    //Si el carrito está vacío mostrará el mensaje, "tu carrito esta vacío"
  var carritovacio = document.getElementById("mensaje1");
  var registrar = document.getElementById("registrar");
  if(carritovacio.innerHTML = "Tu carrito está vacío"){
    registrar.style.display = "none";
  }
</script>
</body>
</html>