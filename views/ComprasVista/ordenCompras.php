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
                if(isset($resSolicitudes["productos_res"])){
                 foreach ($resSolicitudes["productos_res"] as $producto) {
                    $total = $producto[0]["cantidad"] * $producto["precio"];
                
            ?>
            <div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" name="categoria" class="form-control" id="categoria" value='<?php echo $producto["categoria"] ?>' readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="catidad" class="form-label">Cantidad:</label>
                    <input type="text"  class="form-control" id="cantidad" value='<?php echo $producto[0]["cantidad"] ?>' name="cantidad" readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio Unitario:</label>
                    <input type="text"  class="form-control" id="precio" name="precio" value='<?php echo $producto["precio"] ?>' readonly='readonly'/>
                </div>

                <div class="mb-5">
                    <label for="total" class="form-label">Total:</label>
                    <input type="text"  class="form-control" id="total" name="total "value='<?php echo $total; ?>' readonly='readonly'/>
                </div>
            </div>
            <?php  
                }} elseif(isset($resSolicitudes["prodArray"])) {
                    foreach($resSolicitudes["prodArray"] as $producto){
                    $precio = $this->ComprasModel->getProducto(NULL, $producto->id_producto);
                    $total = $precio["precio"] * $producto->cantidad;         
            ?>
            <div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <input type="text" name="categoria" class="form-control" id="categoria" value='<?php echo $producto->categoria ?>' readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="catidad" class="form-label">Cantidad:</label>
                    <input type="text"  class="form-control" id="cantidad" value='<?php echo $producto->cantidad ?>' name="cantidad" readonly='readonly'/>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Precio Unitario:</label>
                    <input type="text"  class="form-control" id="precio" name="precio" value='<?php echo $precio["precio"] ?>' readonly='readonly'/>
                </div>

                <div class="mb-5">
                    <label for="total" class="form-label">Total:</label>
                    <input type="text"  class="form-control" id="total" name="total "value='<?php echo $total; ?>' readonly='readonly'/>
                </div>
            </div>
            <?php }} else{
                $total = $resSolicitudes["cantidad"] * $resSolicitudes["precio"];?>
                <div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria:</label>
                        <input type="text" name="categoria" class="form-control" id="categoria" value='<?php echo $resSolicitudes["categoria"] ?>' readonly='readonly'/>
                    </div>

                    <div class="mb-3">
                        <label for="catidad" class="form-label">Cantidad:</label>
                        <input type="text"  class="form-control" id="cantidad" value='<?php echo $resSolicitudes["cantidad"] ?>' name="cantidad" readonly='readonly'/>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio Unitario:</label>
                        <input type="text"  class="form-control" id="precio" name="precio" value='<?php echo $resSolicitudes["precio"] ?>' readonly='readonly'/>
                    </div>

                    <div class="mb-5">
                        <label for="total" class="form-label">Total:</label>
                        <input type="text"  class="form-control" id="total" name="total "value='<?php echo $total; ?>' readonly='readonly'/>
                    </div>
                </div>
            <?php }  ?>
        </div>

        <button type="button" id="aceptar-modal"  class="btn btn-success btn-aceptar">Aceptar</button>
        <button type="button" id="cancelar-modal"  class="btn btn-danger btn-cancel">Cancelar</button>
        
      </div>