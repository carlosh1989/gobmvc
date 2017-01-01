
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="<?= baseUrl ?>index.php/traslado/create">Nuevo Traslado</a> 
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="table_data_tables.html#">Config option 1</a></li>
                            <li><a href="table_data_tables.html#">Config option 2</a></li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
            <div class="ibox-content">

                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>                                
                                <th width="20%"><?php echo $decretos ?></th>
                                <th width="40%">N° Decreto</th>
                                <th width="40%">Tipo de Movimiento</th>
                                <th width="10%">Editar</th>
                                <th width="10%">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php foreach ($decretos as $link) : ?>
                                <tr>
                                    
                                    <td><?php echo $link->descripcion; ?></td>
                                    <td><?php echo $link->numero; ?></td>
                                    <td><?php echo $link->tipoMovimiento; ?></td> 
                                    <td>
                                        <a href="?a=crud&id=<?php echo $link->id; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?a=eliminar&id=<?php echo $link->id; ?>">Eliminar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                       
                    </table>
                </div>

            </div>


        </div>
    </div>
</div>
</div>