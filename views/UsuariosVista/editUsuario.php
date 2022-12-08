<div class="container">
    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <h1 class="mb-3">Editar Usuario</h1>
			
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text"  class="form-control" name="nombres" id="nombres" value='<?= isset($resObtenerUsuario['nombres'])? $resObtenerUsuario['nombres'] : '' ?>'/>
        </div>
		

        <div class="mb-3">
            <label for="ap_pat" class="form-label">Apellido Paterno:</label>
            <input type="text" name="ap_pat" class="form-control" id="ap_pat" value='<?= isset($resObtenerUsuario['ap_pat'])? $resObtenerUsuario['ap_pat'] : '' ?>'/>
        </div>
		
        
        <div class="mb-3">
            <label for="ap_mat" class="form-label">Apellido Materno:</label>
            <input type="text" name="ap_mat" class="form-control" id="ap_mat" value='<?= isset($resObtenerUsuario['ap_mat'])? $resObtenerUsuario['ap_mat'] : '' ?>'/>
        </div>
		

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" id="email" value='<?= isset($resObtenerUsuario['email'])? $resObtenerUsuario['email'] : '' ?>'/>
        </div>
		

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password" value='<?= isset($resObtenerUsuario['password'])? $resObtenerUsuario['password'] : '' ?>'/>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Satatus:</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="1" <?php if($resObtenerUsuario['status'] == 1) { echo "selected";} ?>>Activo</option>
                <option value="0" <?php if($resObtenerUsuario['status'] == 0) { echo "selected";} ?>>Inactivo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="rol" class="form-label">Rol:</label>
            <select class="form-select" name="rol" aria-label="Default select example">
                <option>Seleccionar</option>
                <?php for ($i=0; $i < count($resCatRol['id_rol']) ; $i++) { ?>
                    <option  <?php if($resObtenerUsuario['id_rol'] == $resCatRol['id_rol'][$i]) { echo "selected";} ?>  value="<?php echo $resCatRol['id_rol'][$i]; ?>"><?php echo $resCatRol['rol'][$i]; ?></option>
                <?php  }?>    
            </select>
        </div>
		
		<?php if(isset($respuesta['mysql_error'])) {?>
			<div class="alert alert-danger d-flex align-items-center" role="alert">
			  <div>
				 <?php echo $respuesta['mysql_error']; ?>
			  </div>
			</div>
		<?php } ?>

		<?php if(isset($respuesta['mysql_success'])) {?>
			<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<?php echo $respuesta['mysql_success']; ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Understood</button>
					</div>
					</div>
				</div>
			</div>
		<?php }?>

        <input type="hidden" name="btnAccion" value="editar">
        <input type="hidden" name="id_usuario" value="<?php echo $resObtenerUsuario['id_usuario']; ?>">
            
        <button type="submit" class="btn btn-primary">Editar</button>
    </form>
</div>
