<div class="container mt-5">
<form action="" id="ordenS">
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
            <input class="form-control buscarProveedor" name="codigoProveedor" type="text" value="" id="codigoProveedor">
        </div>

        <div class="mb-3">
            <label for="nombreProveedor" class="form-label">Nombre del Proveedor</label>
            <input type="text" class="form-control" name="nombreProveedor" id="nombreProveedor" aria-describedby="nombreProveedor" value ="" readonly="readonly">
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

    <div>
        <table class="table table-striped">
            <tr>
                <td></td>
                <td>Codigo</td>
                <td>Nombre</td>
                <td>Categoria</td>
                <td>Cantidad</td>
                <td>Precio x unidad</td>
                <td>Total</td>
            </tr>
            <?php
                $total = 0;
                if(isset($resSolicitudes["productos_res"])){
                    foreach ($resSolicitudes["productos_res"] as $producto) {
                    $total = $producto[0]["cantidad"] * $producto["precio"];       
            ?>
            <tr>
                <td>
                    <div class="form-check">
                        <input class="form-check-input checkTotal checkboxProd<?php echo $producto["id_producto"] ?>" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault"></label>
                    </div>
                </td>
                <td><?php ?></td>
                <td><?php ?></td>
                <td><?php echo $producto["categoria"] ?></td>
                <td><?php echo $producto[0]["cantidad"] ?></td>
                <td><input class="form-control precioUnitario" name="PrecioUnidad" type="number" data-id_producto="<?php echo $producto["id_producto"] ?>"  data-cantidad="<?php echo  $producto[0]["cantidad"] ?>" value="" disabled></td>
                <td class="total" id="total<?php echo $producto["id_producto"]?>"></td>
            </tr>
            
                <input type="hidden" id="nombreProducto<?php echo $producto["id_producto"] ?>" value="">
                <input type="hidden" id="codigoProducto<?php echo $producto["id_producto"] ?>" value="">
                <input type="hidden" id="Categoria<?php echo $producto["id_producto"] ?>" value="<?php echo $producto["categoria"] ?>">
                <input type="hidden" id="Cantidad<?php echo $producto["id_producto"] ?>" value="<?php echo $producto[0]["cantidad"] ?>">
                <input type="hidden" id="idProducto<?php echo $producto["id_producto"] ?>" value="<?php echo $producto["id_producto"] ?>">
            
                <?php
                }
            } elseif (isset($resSolicitudes["prodArray"])) {  
                foreach ($resSolicitudes["prodArray"] as $producto) {
                    $precio = $this->ComprasModel->getProducto(NULL, $producto->id_producto);
                    $total = $precio["precio"] * $producto->cantidad;
                ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input checkTotal checkboxProd<?php echo $producto->id_producto ?>" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault"></label>
                        </div>
                    </td>
                    <td><?php echo $producto->codigo_producto ?></td>
                    <td><?php echo $producto->nomProducto ?></td>
                    <td><?php echo $producto->categoria ?></td>
                    <td><?php echo $producto->cantidad ?></td>
                    <td><input class="form-control precioUnitario precioU<?php echo $producto->id_producto ?>" name="cantidad" type="number" data-id_producto="<?php echo $producto->id_producto ?>"  data-cantidad="<?php echo $producto->cantidad ?>" value="" disabled></td>
                    <td class="total" id="total<?php echo $producto->id_producto ?>"></td>
                </tr>
                <input type="hidden" id="nombreProducto<?php echo $producto->id_producto ?>" value="<?php echo $producto->nomProducto ?>">
                <input type="hidden" id="codigoProducto<?php echo $producto->id_producto ?>" value="<?php echo $producto->codigo_producto ?>">
                <input type="hidden" id="Categoria<?php echo $producto->id_producto ?>" value="<?php echo $producto->categoria ?>">
                <input type="hidden" id="Cantidad<?php echo $producto->id_producto ?>" value="<?php echo $producto->cantidad  ?>">
                <input type="hidden" id="idProducto<?php echo $producto->id_producto ?>" value="<?php echo $producto->id_producto  ?>">
            
                
                <?php }} else{ ?>
                <tr>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input checkTotal checkboxProd<?php echo $resSolicitudes["id_producto"] ?>" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault"></label>
                        </div>
                    </td>
                    <td><?php ?></td>
                    <td><?php ?></td>
                    <td><?php echo $resSolicitudes["categoria"] ?></td>
                    <td><?php echo $resSolicitudes["cantidad"] ?></td>
                    <td><input class="form-control precioUnitario precioU<?php echo $resSolicitudes["id_producto"]?>" type="number" data-id_producto="<?php echo $resSolicitudes["id_producto"] ?>"  data-cantidad="<?php echo $resSolicitudes["cantidad"] ?>" value="" disabled></td>
                    <td class="total" id="total<?php echo $resSolicitudes["id_producto"]?>"></td>
                </tr>
                <input type="hidden" id="nombreProducto<?php echo $resSolicitudes["id_producto"]?>" value="<?php echo $producto->nomProducto ?>">
                <input type="hidden" id="codigoProducto<?php echo $resSolicitudes["id_producto"]?>" value="<?php echo $producto->codigo_producto ?>">
                <input type="hidden" id="Categoria<?php echo $resSolicitudes["id_producto"]?>" value="<?php echo $producto->categoria ?>">
                <input type="hidden" id="Cantidad<?php echo $resSolicitudes["id_producto"]?>" value="<?php echo $producto->cantidad  ?>">
                <input type="hidden" id="idProducto<?php echo $resSolicitudes["id_producto"]?>" value="<?php echo $producto->id_producto  ?>">
                <?php } ?>
                <tr>
                    <td colspan="6" class="text-end">Total General</td>
                    <td>$<span id="total_general">0</span></td>
                </tr>
        </table>
        <input type="hidden" name="id_proveedor" id="id_proveedor" value="">
        <input type="hidden" name="id_solicitud" value="<?php echo $resSolicitudes["id_solicitud"] ?>">
        <div>
            <button type="button" id="aceptar" class="btn btn-success">Aceptar</button>
        </div>
    </div>
</form>
</div>

      