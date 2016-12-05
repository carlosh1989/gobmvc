		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $rol->id != null ? $rol->nombre : 'Nuevo Registro'; ?></h5>
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
                            <form id="rol_form" name="rol_form" action="rol.php?a=guardar" method="post" class="form-horizontal">

                            	
                            	<!--input type="hidden" name="tipoFormulario" value="persona_form" /-->
                            	<input type="hidden" name="id" value="<?php echo $rol->id; ?>" />
                                <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" required value="<?php echo $rol->nombre; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Descripción</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="descripcion" required value="<?php echo $rol->descripcion; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Módulos</label>

                                <div class="col-sm-10">
                                    <div class="wrapper wrapper-content  animated fadeInRight">
                                        <div class="ibox-content">                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="dd" >
                                                        <ol class="dd-list">                                                            
                                                            <?php foreach ($this->modelModulo->listar() as $modulo): ?>
                                                                <li class="dd-item" data-id="2">
                                                                    <div class="dd-handle"><?php echo $modulo->nombre; ?></div>
                                                                    <ol class="dd-list">
                                                                        <label class="checkbox-inline"> 
                                                                            <input type="checkbox" name="<?php echo $modulo->id."[1]"; ?>" id="inlineCheckbox1"> Registrar
                                                                        </label> 
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="<?php echo $modulo->id."[2]"; ?>" id="inlineCheckbox2"> Ver
                                                                        </label> 
                                                                        <label class="checkbox-inline">
                                                                            <input type="checkbox" name="<?php echo $modulo->id."[3]"; ?>" id="inlineCheckbox3"> Eliminar
                                                                        </label>
                                                                    </ol>
                                                                </li>
                                                            <?php endforeach; ?>
                                                        </ol>
                                                    </div>                                            
                                                </div>
                                            </div>
                                        </div> 
                                    </div>                
                                </div>
                                </div>
                                <div class="hr-line-dashed"></div>      

                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">                                        
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <button class="btn btn-white" onclick="javascript:document.location.href='rol.php'" type="button">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>

    <!-- Mainly scripts -->        