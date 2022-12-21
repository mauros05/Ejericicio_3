<div class="container mt-5">
        <div class="mb-3">
            <label for="folio" class="form-label">Folio:</label>
            <input type="text"  class="form-control" name="folio" id="folio" value='<?php echo $resSolicitudes["folio"] ?>' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha:</label>
            <input type="text" name="fecha" class="form-control" id="fecha" value='<?php echo date("Y-m-d") ?>' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Codigo Proveedor</label>
            <input class="form-control buscarProveedor" type="text" value="" id="codigoProveedor">
        </div>

        <div class="mb-3">
            <label for="nombreProveedor" class="form-label">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="nombreProveedor" aria-describedby="nombreProveedor" value ="" readonly="readonly">
        </div>
        
        <div class="mb-3">
            <label for="direccion" class="form-label" >Direccion</label>
            <input type="text" class="form-control" name ="direccion" id="direccion" aria-describedby="direccion" value ="" readonly="readonly">
        </div>
    
        <!-- <div class="mb-3">  
            <label for="proveedor" class="form-label">Proveedor</label>
            <select name ="proveedor" id ="proveedor" >
                <option value = "1">1</option>
                <option value = "2">2</option>
                <option value = "3">3</option>
            </select>
        </div> -->

        <!-- <div class="form-check"><input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"><label class="form-check-label" for="flexCheckDefault">
            Default checkbox
        </label></div> -->
        <div class="multi-products">
            <?php
                $total = 0;
            ?>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria:</label>
            <input type="text" name="categoria" class="form-control" id="categoria" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="catidad" class="form-label">Cantidad:</label>
            <input type="text"  class="form-control" id="cantidad" value='' name="cantidad" readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio Unitario:</label>
            <input type="text"  class="form-control" id="precio" name="precio" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total:</label>
            <input type="text"  class="form-control" id="total" name="total "value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <input type="text" name="descripcion" class="form-control" id="descripcion" value='' readonly='readonly'/>
        </div>
		
        <div class="mb-3">
            <label for="urgencia" class="form-label">Urgencia:</label>
            <input type="text" name="urgencia" class="form-control" id="urgencia" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="producto" class="form-label">Producto:</label>
            <input type="text" name="productos-orden" class="form-control" id="producto" value='' readonly='readonly'/>
        </div>

        <div class="mb-3">
            <label for="codigoProducto" class="form-label">Codigo del Producto:</label>
            <input type="text" name="codigo-producto" class="form-control" id="codigo-producto" value="" readonly='readonly'/>
        </div>

        

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" name="status-modal" class="form-control" id="status-modal" value='' readonly='readonly'/>
        </div>
        
        <button type="button" id="aceptar-modal"  class="btn btn-success btn-aceptar">Aceptar</button>
        <button type="button" id="cancelar-modal"  class="btn btn-danger btn-cancel">Cancelar</button>
        
      </div>