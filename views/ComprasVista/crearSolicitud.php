<div class="container">
    <form action="" method="post" enctype="multipart/form-data" class="mt-3" id="crear-solicitud">
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
           
        <div id="contentProducto">
            <div id="dupProdcuto">       
                <div class="mb-3">
                    <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
                    <input type="text" name="codigoProducto[]" class="form-control buscarProductoCod codigoProducto_0" id="codigoProducto" value="<?php echo isset($codigoProducto['codigoProducto'])? $codigoProducto['codigoProducto'] : "" ?>"/>
                    <div id="codigoAlert" style="color: red" hidden></div>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Nombre del Producto:</label>
                    <input type="text" name="nomProducto" class="form-control nomProducto_0" id="nomProducto" value='<?php echo isset($resProducto['producto'])? $resProducto['producto'] : "" ?>' readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" name="categoria" class="form-control categoria_0" id="categoria" value='<?php echo isset($resProducto['categoria'])? $resProducto['categoria'] : "" ?>' readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" name="cantidad[]" class="form-control" id="cantidad" value=''/>
                    <div id="cantidadAlert" style="color: red" hidden></div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="urgencia" class="form-label">Urgencia:</label>
            <select class="form-select" name="urgencia" aria-label="Default select example" id="prioridad">
                <option value="1">Bajo</option>
                <option value="2">Medio</option>
                <option value="3">Alto</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <textarea type="text" name="descripcion" class="form-control" id="descripcion" value=''></textarea>
            <div id="descripcionAlert" style="color: red" hidden></div>
        </div>
            
        <button type="button" class="btn btn-primary mt-3 mb-3" id="crearSolicitud">Crear Solicitud</button>
        <button type="button" class="btn btn-success mt-3 mb-3" id="add-Producto">Add Producto</button>
        
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="div-message">
        ...
      </div>
    </div>
  </div>
</div>