<div class="container">
    <h1 class="text-center mt-4">Lista de productos</h1>

    <div>


        <div class="row mt-5">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" name="categoria" id="categoria">
                        <option value="">Todas</option>
                        <?php foreach ($categoria as $row) { ?>
                        <option value="<?php echo $row['id_categoria']; ?>">
                            <?php echo $row['categoria_descrip']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-dark mt-4" onclick="generarUrl()">Filtrar</button>
            </div>



            <div class="row mt-5">
                <?php foreach ($producto as $row) { ?>
                <div class="col-md-4">
                    <div class="card gap-3 text-center">
                        <img class="card-img-top " src="<?php echo base_url('assets/img/'.$row['producto_imagen']); ?>"
                            alt="" height="300" width="150" alt="card image cap">
                        <div class="card-body  ">
                            <h5 class="card-title">
                                <?php echo $row['producto_nombre'];?>
                            </h5>
                            <p class="card-text">
                                <?php echo $row['producto_descrip'];?>
                            </p>
                            <p class="card-text">
                                <?php echo "$"; echo $row['producto_precio'];?>
                            </p>
                            <p class="card-text">
                                <?php echo "Categoria "; echo $row['categoria_descrip'];?>
                            </p>

                            <?php if (session('login')){
                                echo form_open('agregarCarrito');
                                echo form_hidden('id', $row['id_producto']);
                                echo form_hidden('titulo', $row['producto_nombre']);
                                echo form_hidden('precio', $row['producto_precio']);
                                echo form_submit('comprar', 'Agregar al carrito', "class='btn btn-dark'");
                                echo form_close();
                            }?>
                            <hr>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>