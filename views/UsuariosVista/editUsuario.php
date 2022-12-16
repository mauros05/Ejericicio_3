<div class="container mb-4">
    <form action="" method="post" enctype="multipart/form-data" class="mt-3">
        <h1 class="mb-3">
            Editar Usuario
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width:30px; height: 30px">
                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
            </svg>
        </h1>
			
        <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text"  class="form-control" name="nombres" id="nombres" value='<?= isset($resObtenerUsuario['nombres'])? $resObtenerUsuario['nombres'] : '' ?>'/>
        </div>
		
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label for="ap_pat" class="form-label">Apellido Paterno:</label>
                    <input type="text" name="ap_pat" class="form-control" id="ap_pat" value='<?= isset($resObtenerUsuario['ap_pat'])? $resObtenerUsuario['ap_pat'] : '' ?>'/>
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <label for="ap_mat" class="form-label">Apellido Materno:</label>
                    <input type="text" name="ap_mat" class="form-control" id="ap_mat" value='<?= isset($resObtenerUsuario['ap_mat'])? $resObtenerUsuario['ap_mat'] : '' ?>'/>
                </div>
            </div>
        </div>
		

        <div class="mb-3">
            <label for="email" class="form-label">Correo:</label>
            <input type="email" name="email" class="form-control" id="email" value='<?= isset($resObtenerUsuario['email'])? $resObtenerUsuario['email'] : '' ?>'/>
        </div>
		

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" id="password" value='<?= isset($resObtenerUsuario['password'])? $resObtenerUsuario['password'] : '' ?>'/>
        </div>
        
        <div class="row mb-4">
            <div class="col">

                <label for="status" class="form-label">Status:</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="1" <?php if($resObtenerUsuario['status'] == 1) { echo "selected";} ?>>Activo</option>
                    <option value="0" <?php if($resObtenerUsuario['status'] == 0) { echo "selected";} ?>>Inactivo</option>
                </select>
            </div>

            <div class="col">
                <label for="rol" class="form-label">Rol:</label>
                <select class="form-select" name="rol" aria-label="Default select example">
                    <option>Seleccionar</option>
                    <?php for ($i=0; $i < count($resCatRol['id_rol']) ; $i++) { ?>
                        <option  <?php if($resObtenerUsuario['id_rol'] == $resCatRol['id_rol'][$i]) { echo "selected";} ?>  value="<?php echo $resCatRol['id_rol'][$i]; ?>"><?php echo $resCatRol['rol'][$i]; ?></option>
                    <?php  }?>    
                </select>
            </div>
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
