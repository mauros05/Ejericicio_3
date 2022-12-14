<div class="container table-users mt-5">
	<table class="table">
	  <thead>
		<tr class='table-dark'>
		  <th scope="col">Folio</th>
		  <th scope="col">Fecha</th>
		  <th scope="col">Status</th>
		  <th scope="col">Urgencia</th>
          <th scope="col"></th>
          <th scope="col"></th>
		</tr>
	  </thead>
	  <tbody>
        <?php
            for($i=0; $i<count($resSolicitudes['folio']); $i++){
        ?>
            <tr class='table-light'>
                <td><?php echo $resSolicitudes['folio'][$i]; ?></td>
                <td><?php echo $resSolicitudes['fecha'][$i]; ?></td>
                <td id="status<?php echo $resSolicitudes['id_solicitud'][$i] ?>" class="<?php echo $resSolicitudes['color'][$i];?>" ><?php echo $resSolicitudes['status'][$i]; ?></td>
                <td><?php echo $resSolicitudes['urgencia'][$i]; ?></td>
                <td>
                  <button type="button" id="verSolicitud" data-id="<?php echo $resSolicitudes['id_solicitud'][$i] ?>" class="btn btn-primary btn-ver">Ver</button>  
                </td>
                <?php if($resSolicitudes['status'][$i] != "cancelado") { ?>
                  <td>
                    <button type="button" id="cancelarSolicitud<?php echo $resSolicitudes['id_solicitud'][$i] ?>" data-id="<?php echo $resSolicitudes['id_solicitud'][$i] ?>" class="btn btn-danger btn-cancel">Cancelar</button> 
                  </td>
                <?php } else { ?>
                  <td></td>
                <?php }  ?>
            </tr>
        <?php } ?>
	 </tbody>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalCancelarSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="div-message-cancelar">
        ...
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modalVerSolicitud" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="div-message">
			
        <div class="mb-3">
            <label for="folio" class="form-label">Folio:</label>
            <input type="text"  class="form-control" name="folio" id="folio" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="text" name="fecha" class="form-control" id="fecha" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="catidad" class="form-label">Cantidad:</label>
            <input type="text"  class="form-control" id="cantidad" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text"  class="form-control" id="descripcion" value='' readonly='readonly'/>
        </div>
		
        <div class="mb-3">
            <label for="urgencia" class="form-label">Urgencia:</label>
            <input type="text" class="form-control" id="urgencia" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="producto" class="form-label">Producto:</label>
            <input type="text" class="form-control" id="producto" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
            <input type="text" name="codigo-producto" class="form-control" id="codigo-producto" value="" readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" name="categoria" class="form-control" id="categoria" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" name="status-modal" class="form-control" id="status-modal" value='' readonly='readonly'/>
        </div>

        <button type="button" id="verSolicitud" data-id="<?php echo $resSolicitudes['id_solicitud'][$i] ?>" class="btn btn-primary">Aceptar</button>
        <button type="button" id="verSolicitud" data-id="<?php echo $resSolicitudes['id_solicitud'][$i] ?>" class="btn btn-danger">Cancelar</button>

      </div>
    </div>
  </div>
</div>