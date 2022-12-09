<div class="container">
    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <h1 class="mb-3">Crear Solicitud de Compra</h1>
			
        <div class="mb-3">
            <label for="folio" class="form-label">Folio:</label>
            <input type="text"  class="form-control" name="folio" id="folio" value='<?php echo $folio; ?>' readonly='readonly'/>
        </div>
		

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="text" name="fecha" class="form-control" id="fecha" value='<?php echo date("Y-m-d"); ?>' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="departamento" class="form-label">Usuario:</label>
            <input type="text"  class="form-control" id="departament" value='<?php echo $_SESSION['nombre']; ?>' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="departamento" class="form-label">Departamento:</label>
            <input type="text"  class="form-control" id="departament" value='<?php echo $resUsuario['departamento']; ?>' readonly='readonly'/>
        </div>
		
        <div class="mb-3">
            <label for="lider" class="form-label">Lider:</label>
            <input type="text" class="form-control" id="lider" value='<?php echo $resUsuario['nombre_lider']; ?>' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
            <input type="text" name="codigoProducto" class="form-control" id="codigoProducto" value="<?php echo isset($codigoProducto['codigoProducto'])? $codigoProducto['codigoProducto'] : "" ?>"/>
            <button type="submit" class="btn btn-primary mt-3 mb-3" name="buscar">Buscar</button>
        </div>

        <?php if(isset($resProducto['msg_producto'])) {?>
			<div id="validationServer04Feedback" style="color: red;" class="mb-3">
			  <?php echo $resProducto['msg_producto']; ?>
			</div>
		<?php }?>


        <div class="mb-3">
            <label for="categoria" class="form-label">Nombre del Producto:</label>
            <input type="text" name="nomProducto" class="form-control" id="nomProducto" value='<?php echo isset($resProducto['producto'])? $resProducto['producto'] : "" ?>'/>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" name="categoria" class="form-control" id="categoria" value='<?php echo isset($resProducto['categoria'])? $resProducto['categoria'] : "" ?>'/>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="number" name="cantidad" class="form-control" id="cantidad" value=''/>
        </div>

        <div class="mb-3">
            <label for="urgencia" class="form-label">Urgencia:</label>
            <select class="form-select" name="urgencia" aria-label="Default select example">
                <option value="1">Bajo</option>
                <option value="2">Medio</option>
                <option value="3">Alto</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <textarea type="text" name="descripcion" class="form-control" id="descripcion" value=''></textarea>
        </div>
            
        <button type="submit" class="btn btn-primary mt-3 mb-3">Crear Solicitud</button>
    </form>
</div>
