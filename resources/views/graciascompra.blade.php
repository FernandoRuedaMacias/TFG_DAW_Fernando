<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Muchas gracias!</title>
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

    h1{
        text-align: center;
    }

    .container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    height: 100vh; 
}

a {
    margin: 10px; 
}

button {
    padding: 10px 20px; 
    font-size: 16px;
}

    </style>
</head>
<body>
    <hr>
    <div class="container my-5 text-center">
        <h1 class="display-4 fw-bold mb-4">¡Muchas gracias por su compra!</h1>
        <hr class="mb-4" />
        <div class="d-flex justify-content-center gap-3 flex-wrap">
          <a href="{{route('Inicio')}}" class="btn btn-dark btn-lg px-4">Bicicletas</a>
          <a href="{{route('cascos')}}" class="btn btn-dark btn-lg px-4">Cascos</a>
          <a href="{{route('productos')}}" class="btn btn-dark btn-lg px-4">Productos</a>
        </div>
        <hr class="mt-4" />
      </div>
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
</body>
</html>