<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
        " rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="{{ URL::to('/images/favicon.jpeg')}}">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    h2{
        text-align: center;
        margin:20px;
    }

    .center {
  margin: auto;
  width: 5%;
  padding: 10px;
}

.center2 {
  margin: auto;
  width: 17%;
  padding: 10px;
}

span{
    color:red;
    font-size:12px;
}

        </style>
    </head>
<body>

<h2>Pago</h2>

<form action="{{ route('graciascompra') }}" class="form-signin container mt-5 mb-5 p-4 border rounded shadow">
  <div class="form-label-group mb-3">
      <label for="direccion" class="form-label">Dirección</label>
      <input type="text" id="direccion" name="direccion" class="form-control" required>
  </div>
  <div class="form-label-group mb-3">
      <label for="codigop" class="form-label">Código Postal</label>
      <input type="text" id="codigop" name="codigop" class="form-control" 
             pattern="^\d{5}$" required title="El código postal debe contener exactamente 5 dígitos.">

  </div>
  <div class="form-label-group mb-3">
      <label for="tarjetacred" class="form-label">Tarjeta de Crédito</label>
      <input type="text" id="tarjetacred" name="tarjetacred" class="form-control" 
             pattern="^[6789]\d{8}$" required title="La tarjeta de crédito debe comenzar con 6, 7, 8 o 9 y tener 9 dígitos.">
 
  </div>
  <div class="mb-3">
      <div class="g-recaptcha" data-sitekey="6LccAyorAAAAAC4M1YrV1OaW62Ot8mJh4GFWURuL" required></div>
      <span class="text-danger">Este elemento es obligatorio</span>
  </div>
  <div class="text-center">
      <input class="btn btn-lg btn-block btn-outline-secondary" type="submit" value="Pagar">
  </div>
</form>


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
</body>

<script>
    //https://stackoverflow.com/questions/27706594/how-can-i-make-recaptcha-a-required-field
    //Esto hace que no se puede avanzar si no se ha marcado  le captcha
    window.addEventListener('load', () => {
  const $recaptcha = document.querySelector('#g-recaptcha-response');
  if ($recaptcha) {
    $recaptcha.setAttribute('required', 'required');
  }
})
</script>


</html>
