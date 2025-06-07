<html>
    <head>
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

    h2{
        text-align: center;
      }

      .center {
  margin: auto;
  width: 10%;
  padding: 10px;
}

.pagination .page-link {
    background: rgb(255, 253, 253);
    color: rgb(46, 43, 43);
}


        </style>
    </head>
    <body>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Bienvenido {{$nombreusuario}}
    </h2>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tus pedidos:
    </h2>

    <!--Cerrar la sesión-->
    <div class="container my-4">
        <div class="d-flex gap-3 justify-content-center">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-outline-secondary btn-lg" value="Salir" />
          </form>
          <a href="{{ route('Inicio') }}">
           <button class="btn btn-outline-secondary btn-lg"> Volver</button> 
          </a>
        </div>
      </div>
    <hr>
    <table width="100%"  class="table table-striped">
        <tr>
            <th scope="col">Id Bicicleta</th>
            <th scope="col">Nombre Bicicleta</th>
            <th scope="col">Id Casco</th>
            <th scope="col">Id Producto</th>
            <th scope="col">Nombre Producto</th>
            <th scope="col">Nombre Usuario</th>
            <th scope="col">Precio</th>
            <th scope="col">Borrar Pedido</th>
            
        </tr>
    @foreach($pedidos as $pedido)
    <tr>
        <td>{{ $pedido->id_bici }}</td>
        <td>{{ $pedido->nombre_bici }}</td>
        <td>{{ $pedido->id_casco }}</td>
        <td>{{ $pedido->id_producto }}</td>
        <td>{{ $pedido->nombre_producto }}</td>
        <td>{{ $pedido->nombre_usuario }}</td>
        <td>{{ $pedido->precio }} €</td>
        <td><a href=" {{ route('borrarpedido',$pedido->id)}}"><button id="button" class="btn  btn-dark">Eliminar</button></a></td>
    </tr>
    @endforeach
</table>

<div class="center">{{$pedidos->links()}}</div>

<div class="container my-4">
    <div class="d-flex gap-3 justify-content-center">
         <button type = "button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModal"> Borrar Usuario</button> 
      </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Borrar Usuario</h5>
        </div>
        <div class="modal-body">
         Al borrar un usuario todos sus datos serán borrados (pedidos y datos personales) y irrecuperables. 
         ¿Está seguro de que quiere continuar?.
        </div>
        <div class="modal-footer">
            <a href="{{ route('dashboard') }}">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </a>
            <form action="{{ route('destroy') }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Borrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>


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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>

