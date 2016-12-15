
<style>
    .divider {
  height: 1px;
  width:100%;
  display:block; /* for use on default inline elements like span */
  margin: 9px 0;
  overflow: hidden;
  background-color: #999;
}
</style>
<div class="">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
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
                    </div>
                     <h2>Decreto N° <?php echo $this->decreto->numero ?></h2>
                        <div class="row">
                                <div class="col-lg-6 col-md-offset-6">
                                    <div class="col-lg-6">
                                    <p class="text-info">Monto actual</p>
                                    <div class="divider"></div>
                                    <?php echo $this->detallesSuma ?>
                                    </div>
                                    <div class="col-lg-6">
                                    <p class="text-danger">Monto Total</p>
                                    <div class="divider"></div>
                                    <?php echo $this->decreto->monto_total ?>
                                    </div>
                                </div>    
                        </div>
                </div>

            <div class="ibox-content">
              <ul class="nav nav-tabs">
                <li class=""><a data-toggle="tab" href="#datos"><b class="text-muted">DATOS</b></a></li>
                <li class="active"><a class="fa fa-plus" data-toggle="tab" href="#aumentos"><b class="text-info"> Aumentos</b></a></li>
                <li><a class="fa fa-minus" data-toggle="tab" href="#disminuciones"><b class="text-danger"> Disminuciones</b></a></li>
              </ul>

              <div class="tab-content">
                <div id="datos" class="tab-pane fade in">
                <br>
                  <h3>Decreto n° <?php echo $this->decreto->numero ?></h3>
                  <p><?php echo $this->decreto->descripcion ?></p>
                  <dl>
                    <dt>Descripción</dt>
                    <dd><?php echo $this->decreto->descripcion ?></dd>
                    <?php if ($this->decreto->estado==false): ?>
                    <dt>Observaciones</dt>
                    <dd><?php echo $this->decreto->observaciones ?></dd>
                    <?php endif ?>
                  </dl>  
                   <p class="text-danger">Monto Total: <?php echo $this->decreto->monto_total ?></p>
                  <label class="">Fecha:</label><?php echo $this->decreto->fecha; ?>
                </div>
                <div id="aumentos" class="tab-pane fade in active">
                    <hr>
                    <div class="table-responsive">
                        <form action="?a=agregarDetalle" method="POST">
                        <input type="hidden" name="traslado" value="1">
                         <div class="col-lg-12">
                             <div class="col-lg-2">
                                 <input name="codigo_presupuestario" class="codigo_presupuestario" placeholder="Codigo Presupuestario" type="text">
                             </div>
                             <div class="col-lg-2">
                                 <input name="monto" class="monto" placeholder="Monto" type="text">
                             </div>
                             <div class="col-lg-2">
                                 <button class="btn btn-info" type="submit">RECIBE</button>
                             </div>
                         </div>            
                        </form>
                     <hr><hr>
                  <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>              
                                    <th width="45%">Codigo Presupuestario</th>               
                                    <th width="45%">Monto</th>
                                    <th width="5%">Editar</th>
                                    <th width="5%">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($this->detallesMas as $p): ?>
                                    <tr>

                                        <td><?php echo $p->codigo_presupuestario; ?></td>
                                        <td><?php echo $p->monto; ?></td>
                                        <td>
                                            <a class="fa fa-pencil fa-2x" href="?a=crud&id=<?php echo $p->id; ?>"></a>
                                        </td>
                                        <td>
                                            <a class="fa fa-trash fa-2x text-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?a=eliminar&id=<?php echo $p->id; ?>"></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                           
                        </table>
                    </div>
                </div>
                <div id="disminuciones" class="tab-pane fade">
                    <hr>
                    <div class="table-responsive">
                     <div class="col-lg-12">
                     <form action="?a=agregarDetalle" method="POST">
                         <div class="col-lg-2">
                             <input class="codigo_presupuestario" name="codigo_presupuestario" placeholder="Codigo Presupuestario" type="text">
                         </div>
                         <div class="col-lg-2">
                             <input class="monto" name="monto" placeholder="Monto" type="text">
                         </div>
                         <div class="col-lg-2">
                             <button class="btn btn-danger" type="submit">OTORGA</button>
                         </div>
                     </form>
                     </div>
                     <hr><hr>
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>              
                                    <th width="45%">Codigo Presupuestario</th>               
                                    <th width="45%">Monto</th>
                                    <th width="5%">Editar</th>
                                    <th width="5%">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach($this->detallesMenos as $p): ?>
                                    <tr>
                                        <td><?php echo $p->codigo_presupuestario; ?></td>
                                        <td><?php echo $p->monto; ?></td>
                                        <td>
                                            <a class="fa fa-pencil fa-2x" href="?a=crud&id=<?php echo $p->id; ?>"></a>
                                        </td>
                                        <td>
                                            <a class="fa fa-trash fa-2x text-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?a=eliminar&id=<?php echo $p->id; ?>"></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                           
                        </table>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                  <h3>Menu 3</h3>
                  <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>
</div>

  <script>
$(document).ready(function(){
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.monto').mask("#.##0,00", {reverse: true});
  $('.codigo_presupuestario').mask('00-00-00-00,00-00-00');
});
  </script>