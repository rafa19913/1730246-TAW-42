<?php 
	//Se verifica que exxista una sesión, en caso de que no sea asi se muestra el login.
	if(!isset($_SESSION['validar'])){
		header("location:index.php?action=ingresar");
		exit();
	}

	//Llamada a los controladores para insertar/modificar/eliminar produtos y su stock
	$inventario = new MvcController();
	$inventario -> insertarProductController();
	$inventario -> actualizarProductController();
	$inventario -> actualizar1StockController();
	$inventario -> actualizar2StockController();
	$inventario -> eliminarProductController();

	//Se verifica que el usuario haya pulsado sobre el botón de registrar o editar para mostrarle su respectivo formulario
	if(isset($_GET['registrar'])){
		$inventario->registroProductController();
	}else if(isset($_GET['idProductEditar'])){
		$inventario->editarProductController();
	}else if(isset($_GET['idProductAdd'])){
		$inventario->addProductController();
	}else if(isset($_GET['idProductDel'])){
		$inventario->delProductController();
	}
?>

<div class="full" style="display:flex;">

<div class="container-fluid">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Ventas</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
		
			</div>
			<div class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-bordered table-striped" id="tableAux">
							<thead class="table-success" id="theadAux">
								<tr>
									<th>Producto</th>
									<th>Precio unitario</th>
									<th>Cantidad</th>
									<th>Total</th>
								</tr>	
							</thead>
							<tbody id="tbodyAux">
							
							</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div> <!--/.container-fluid-->
</div>


<div class="container-fluid">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Productos</h3>
		</div>
		<div class="card-body">
			<div class="row mb-4">
		
			</div>
			<div class="dataTables_wrapper dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table id="example1" class="table table-bordered table-striped">
							<thead class="table-success">
								<tr>
                                    <th>Añadir</th>
									<th>Código</th>
									<th>Nombre</th>
									<th>Precio</th>
									<th>Stock</th>
									<th>Categoría</th>
							

								</tr>	
							</thead>
							<tbody>
								<?php 
									//Se llama  al controlador que muestra todos los productos que existen
									$inventario->vistaProductsVentaController();
								?>
							</tbody>
						</table>
					</div> 
				</div>
			</div>
		</div>
	</div> <!--/.container-fluid-->
</div>

</div>



<script>

function agregarProductoATablaAuxiliar(id,precio, codigo, producto){
        //var tbody = document.getElementById("tbodyAux");

        //producto = 124124;
        alert(id);
        alert(codigo);
        alert(precio);
        alert(producto);
        //alert(String(producto));
        
       /*
        var tbody = document.getElementById("tbodyAux");

        var tr = document.createElement("tr"); //Creo un elemento y le asigno un texto

        var td1 = document.createElement("td");
        td1.innerText = "producto1";

        var td2 = document.createElement("td");
        td2.innerText = "1512";

        var td3 = document.createElement("td");
        td3.innerText = "2";

        var td4 = document.createElement("td");
        td4.innerText = "3024";

        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);

        tbody.appendChild(tr);*/

    }


</script>

