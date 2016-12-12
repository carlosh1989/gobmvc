<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?php echo $modulo->id != null ? $modulo->nombre : 'Nuevo Registro'; ?></h5>
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
                <form id="modulo_form" action="traslado.php?a=store" method="post" class="form-horizontal">

                	
                	<!--input type="hidden" name="tipoFormulario" value="persona_form" /-->
                    <div class="form-group"><label class="col-sm-2 control-label">Fecha</label>

                    <div class="col-sm-10"><input type="text" class="form-control date" name="fecha" required value="<?php echo $this->decreto->fecha; ?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Numero</label>

                        <div class="col-sm-10"><input type="text" class="form-control numero" name="numero" required value="<?php echo $this->decreto->numero; ?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group"><label class="col-sm-2 control-label">Monto</label>

                        <div class="col-sm-10"><input type="text" class="form-control monto" name="montoTotal" required value="<?php echo $this->decreto->monto; ?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group"><label class="col-sm-2 control-label">Descripcion</label>

                        <div class="col-sm-10"><input type="text" class="form-control" name="descripcion" value="<?php echo $modulo->descripcion; ?>"></div>
                    </div>
                    <div class="hr-line-dashed"></div>                                
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">                                        
                            <button class="btn btn-primary" type="submit">Guardar</button>
                            <button class="btn btn-white" onclick="javascript:document.location.href='modulo.php'" type="button">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

  <script>
$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.numero').mask('000/00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.monto').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
  </script>