		<div class="wrapper wrapper-content animated fadeInRight">
			<div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><?php echo $usuario->id != null ? $usuario->descripcion : 'Nuevo Registro'; ?></h5>
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
                            <form id="usuario_form" name="usuario_form" action="usuario.php?a=guardar" method="post" class="form-horizontal">

                            	
                            	<!--input type="hidden" name="tipoFormulario" value="persona_form" /-->
                            	<input type="hidden" name="id" value="<?php echo $usuario->id; ?>" />
                                <div class="form-group"><label class="col-sm-2 control-label">Cedula</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="cedula" required value="<?php echo $usuario->cedula; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="nombre" required value="<?php echo $usuario->nombre; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Apellido</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="apellido" required value="<?php echo $usuario->apellido; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Usuario</label>

                                    <div class="col-sm-10"><input type="text" class="form-control" name="usuario" required value="<?php echo $usuario->usuario; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Clave</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="clave" required value="<?php echo $usuario->clave; ?>"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Rol</label>

                                    <div class="col-sm-10">
                                        <select name="rol" class="form-control" required>
                                            <option value=""></option>
                                            <option value="1">Administrador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">                                        
                                        <button class="btn btn-primary" type="submit">Guardar</button>
                                        <button class="btn btn-white" onclick="javascript:document.location.href='usuario.php'" type="button">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>