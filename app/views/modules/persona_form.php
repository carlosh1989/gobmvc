<SCRIPT language="javascript">
      function addRow(tableID) {
           var table = document.getElementById(tableID);

           var rowCount = table.rows.length;
           var row = table.insertRow(rowCount);
           

           var cell1 = row.insertCell(0);
           var element1 = document.createElement("input");
           element1.type = "checkbox";
           element1.name="chk_"+rowCount;
           cell1.appendChild(element1);

           var cell2 = row.insertCell(1);
           var element2 = document.createElement("input");
           element2.type = "text";
           element2.name="nombre_"+rowCount;
           cell2.appendChild(element2);

           var cell3 = row.insertCell(1);
           var element3 = document.createElement("input");
           element3.type = "text";
           element3.name="apellido_"+rowCount;
           cell3.appendChild(element3);

           document.getElementById("numRows").value=rowCount;
           
      }

      function deleteRow(tableID) {
        try {
           var table = document.getElementById(tableID);
           var rowCount = table.rows.length;           

           for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                     table.deleteRow(i);
                     rowCount--;
                     i--;
                }
           }
           document.getElementById("numRows").value=rowCount-1;

        }catch(e) {
            alert(e);
        }

      }

 </SCRIPT>
<form id="persona_form" name="persona_form" action="persona.php?a=guardar" method="post" class="form-horizontal">
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $persona->id != null ? $persona->nombre : 'Nuevo Registro'; ?></h5>
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
                    

                    	
                    	<!--input type="hidden" name="tipoFormulario" value="persona_form" /-->
                      <input type="hidden" name="numRows" id="numRows" value="1"></input>
                    	<input type="hidden" name="id" value="<?php echo $persona->id; ?>" />
                        <div class="form-group"><label class="col-sm-2 control-label">Cedula</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="cedula" value="<?php echo $persona->cedula; ?>"></div>
                        </div>
                        
                        <div class="form-group"><label class="col-sm-2 control-label">Nombre</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="nombre" value="<?php echo $persona->nombre; ?>"></div>
                        </div>
                        
                        <div class="form-group"><label class="col-sm-2 control-label">Apellido</label>

                            <div class="col-sm-10"><input type="text" class="form-control" name="apellido" value="<?php echo $persona->apellido; ?>"></div>
                        </div>
                       
                        
                    
                </div>  

            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    Detalle Persona
                    <INPUT type="button" value="Agregar Fila" onclick="addRow('dataTable');" />
                    <INPUT type="button" value="Eliminar Fila" onclick="deleteRow('dataTable');" />
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
                        <table id="dataTable" class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <th width="5%"></th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </thead>
                            <tbody>
                                <TR>
                                   <TD><INPUT type="checkbox" NAME="chk_1"/></TD>
                                   <TD> <INPUT type="text" name="nombre_1" /> </TD>
                                   <TD> <INPUT type="text" name="apellido_1" /> </TD>
                                </TR>
                            </tbody>
                            <tfoot>
                               
                            </tfoot>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button class="btn btn-white" type="submit">Cancelar</button>
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>
</div>
</form>