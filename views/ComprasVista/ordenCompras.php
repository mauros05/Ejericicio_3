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
                <td><input class="form-control precioUnitario" type="number" data-id_producto="<?php echo $producto["id_producto"] ?>"  data-cantidad="<?php echo  $producto[0]["cantidad"] ?>" value=""></td>
                <td class="total" id="total<?php echo $producto["id_producto"]?>"></td>
            </tr>
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
                    <td><input class="form-control precioUnitario" type="number" data-id_producto="<?php echo $producto->id_producto ?>"  data-cantidad="<?php echo $producto->cantidad ?>" value=""></td>
                    <td class="total" id="total<?php echo $producto->id_producto ?>"></td>
                </tr>
                
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
                    <td><input class="form-control precioUnitario" type="number" data-id_producto="<?php echo $resSolicitudes["id_producto"] ?>"  data-cantidad="<?php echo $resSolicitudes["cantidad"] ?>" value=""></td>
                    <td class="total" id="total<?php echo $resSolicitudes["id_producto"]?>"></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="6" class="text-end">Total General</td>
                    <td>$<span id="total_general">0</span></td>
                </tr>
        </table>
    </div>
</div>

      