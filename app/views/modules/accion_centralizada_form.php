    <div class="wrapper wrapper-content animated fadeInRight">
    	<div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $accionCentralizada->id != null ? $accionCentralizada->descripcion : 'Nuevo Registro'; ?></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="form_basic.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="form_basic.html#">Config option 1</a>
                                </li>
                                <li><a href="form_basic.html#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <!--form name="persona_form" action="persona.php" method="post" class="form-horizontal"-->
                        <form id="accion_centralizada_form" name="accion_centralizada_form" action="accion_centralizada.php?a=guardar" method="post" class="form-horizontal">

                        	
                        	<input type="hidden" name="tipoFormulario" value="accion_centralizada_form" />
                        	<input type="hidden" name="id" value="<?php echo $accionCentralizada->id; ?>" />
                            <div class="form-group"><label class="col-sm-2 control-label">Código</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="codigo" required value="<?php echo $accionCentralizada->codigo; ?>"></div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Descripción</label>

                                <div class="col-sm-10"><input type="text" class="form-control" name="descripcion" required value="<?php echo $accionCentralizada->descripcion; ?>"></div>
                            </div>
                            <div class="hr-line-dashed"></div>                                
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">                                        
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                    <button class="btn btn-white" onclick="javascript:document.location.href='accion_centralizada.php'" type="button">Cancelar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>