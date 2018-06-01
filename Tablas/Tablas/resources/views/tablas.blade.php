<!DOCTYPE html>
<html>
<head>
	<title>Gestor de  ventas</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<style type="text/css">
		body{
			/*background-color: rgb(239, 239, 239);*/
		}
		.custom-select{
			width: 20em;
			margin: 0 auto;
			background-color: rgb(226, 226, 226) !important;
			-webkit-box-shadow: 0px 54px 68px -22px rgba(46,74,117,0.59);
			-moz-box-shadow: 0px 54px 68px -22px rgba(46,74,117,0.59);
			box-shadow: 0px 54px 68px -22px rgba(46,74,117,0.59);
		}

		.shadow{
			-webkit-box-shadow: 0px 36px 68px -22px rgba(46,74,117,0.59);
			-moz-box-shadow: 0px 36px 68px -22px rgba(46,74,117,0.59);
			box-shadow: 0px 36px 68px -22px rgba(46,74,117,0.59);
		}

		.mid-hr{
			margin-top: 20px;
			text-align: center;
			width: 50%;
			margin-bottom: 20px;
		}

		.contenedor{
			width: 90% !important;
			margin: 0 auto;
		}
	</style>
	<div>
		<select id="mostrarTabla" class="custom-select browser-default">
			<option value="todos">Todos los pedidos</option>
			<option value="pendientes">Pedidos pendientes</option>
			<option value="pagados">Pedidos pagados</option>
			<option value="cancelados">Pedidos cancelados</option>
		</select>
	</div>

	<div id="tabla-todos">
		<hr class="mid-hr">
		<table class="striped centered  shadow contenedor">
	        <thead>
	          <tr>
	              <th>No. Pedido</th>
	              <th>Nombre del cliente</th>
	              <th>Total</th>
	              <th>Status de la orden</th>
	              <th>Fecha</th>
	          </tr>
	        </thead>
	        <tbody>
						@foreach ($todos as $rows)
				    	<tr>
								<td>{{$rows->numeroPedido}}</td>
								<td>{{$rows->nombreCliente}}</td>
								<td>{{$rows->total}}</td>
								<td>{{$rows->status}}</td>
								<td>{{$rows->fecha}}</td>
							</tr>
						@endforeach
	        </tbody>
      </table>
	</div>
	<div id="tabla-pendientes">
		<hr class="mid-hr">
		<table class="striped centered  shadow contenedor">
	        <thead>
	          <tr>
	              <th>No. Pedido</th>
	              <th>Nombre del cliente</th>
	              <th>Total</th>
	              <th>Método de pago</th>
	              <th>Ingresar comprobante de pago</th>
	              <th>Ingresar guía</th>
	              <th>Status</th>
	          </tr>
	        </thead>
	        <tbody>
						$indice = 1;
						@foreach ($pendientes as $rows)
				    	<tr>
								<td>{{$rows->numeroPedido}}</td>
								<td>{{$rows->nombreCliente}}</td>
								<td>{{$rows->total}}</td>
								<td>{{$rows->metodoPago}}</td>
								<td>
		            	<input type="file" id="file" name="comprobante-pago" accept="image/png, image/jpeg">
		            </td>
								<td><input type="text" id="input-guia" name="numero-guia"></td>
		            <td>Status</td>
								<td>{{$rows->status}}</td>
							</tr>
						@endforeach
	        </tbody>
      </table>
	</div>
	<div id="tabla-pagados">
		<hr class="mid-hr">
		<table class="striped centered  shadow contenedor">
	        <thead>
	          <tr>
	              <th>No. Pedido</th>
	              <th>Nombre del cliente</th>
	              <th>Total</th>
	              <th>Fecha</th>
	              <th>Mostrar método de pago</th>
	              <th>Mostrar comprobante de pago</th>
	              <th>Mostrar guía</th>
	              <th>Status</th>
	          </tr>
	        </thead>
	        <tbody>
						@foreach ($pagados as $rows)
 				    	<tr>
 								<td>{{$rows->numeroPedido}}</td>
 								<td>{{$rows->nombreCliente}}</td>
 								<td>{{$rows->total}}</td>
 								<td>{{$rows->fecha}}</td>
								<td>{{$rows->metodoPago}}</td>
								<td>{{$rows->comprobantePago}}</td>
								<td>{{$rows->guia}}</td>
								<td>{{$rows->status}}</td>
 							</tr>
 						@endforeach
	        </tbody>
      </table>
	</div>
	<div id="tabla-cancelados">
		<hr class="mid-hr">
		<table class="striped centered  shadow contenedor">
	        <thead>
	          <tr>
	              <th>No. Pedido</th>
	              <th>Nombre del cliente</th>
	              <th>Total</th>
	              <th>Fecha</th>
	              <th>Canceló</th>
	              <th>Motivo</th>
	          </tr>
	        </thead>
	        <tbody>
						@foreach ($cancelados as $rows)
							<tr>
								<td>{{$rows->numeroPedido}}</td>
								<td>{{$rows->nombreCliente}}</td>
								<td>{{$rows->total}}</td>
								<td>{{$rows->fecha}}</td>
								<td>{{$rows->nombreCliente}}</td>
								<td>{{$rows->motivoCancelacion}}</td>
							</tr>
						@endforeach
	        </tbody>
      </table>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			//Ocultar todas las tablas
			$("#tabla-todos").show();
			$("#tabla-pendientes").hide();
			$("#tabla-pagados").hide();
			$("#tabla-cancelados").hide();
			$("#mostrarTabla").change(function(){
				$tabla_seleccionada = $("#mostrarTabla").val();
				switch($tabla_seleccionada){
					case 'todos':{
						$("#tabla-todos").show();
						$("#tabla-pendientes").hide();
						$("#tabla-pagados").hide();
						$("#tabla-cancelados").hide();
						break;
					}
					case 'pendientes':{
						$("#tabla-todos").hide();
						$("#tabla-pendientes").show();
						$("#tabla-pagados").hide();
						$("#tabla-cancelados").hide();
						break;
					}

					case 'pagados':{
						$("#tabla-todos").hide();
						$("#tabla-pendientes").hide();
						$("#tabla-pagados").show();
						$("#tabla-cancelados").hide();
						break;
					}

					case 'cancelados':{
						$("#tabla-todos").hide();
						$("#tabla-pendientes").hide();
						$("#tabla-pagados").hide();
						$("#tabla-cancelados").show();
						break;
					}
				}
			});
		});
	</script>
</body>
</html>
