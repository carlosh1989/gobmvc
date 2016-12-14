
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <a href="?a=create">Nuevo Traslado</a> 
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
                                <th width="40%">N° Decreto</th>  
                                <th width="40%">Fecha</th>                    
                                <th width="20%">Descripción</th>
                                <th width="20%">Observaciones</th>
                                <th width="40%">Tipo de Movimiento</th>
                                <th width="40%">Estado</th>
                                <th width="40%">Tipo Movimiento</th>
                                <th width="40%">Monto Total</th>
                                <th width="10%">Ver</th>                              
                                <th width="10%">Editar</th>
                                <th width="10%">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php foreach($this->decretos as $p): ?>
                                <tr>
                                    <td><?php echo $p->numero; ?></td>
                                    <td><?php echo $p->fecha; ?></td>
                                    <td><?php echo $p->descripcion; ?></td>
                                    <td><?php echo $p->observaciones; ?></td>
                                    <td><?php echo $p->tipoMovimiento; ?></td> 
                                    <td><?php echo $p->estado; ?></td> 
                                    <td><?php echo $p->tipo_movimiento; ?></td>
                                    <td><?php echo $p->monto_total; ?></td>  
                                    <td>
                                    <a class="fa fa-search-plus fa-2x" href="?a=show&idDecreto=<?php echo $p->id; ?>"></a>
                                    </td>
                                    <td>
                                        <a class="fa fa-pencil fa-2x" href="?a=crud&id=<?php echo $p->id; ?>"></a>
                                    </td>
                                    <td>
                                        <a class="fa fa-trash fa-2x" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?a=eliminar&id=<?php echo $p->id; ?>"></a>
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