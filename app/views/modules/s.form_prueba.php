<form name="form_logeo" action="index.php" id="form_logeo" class="col-md-3 center-margin form-vertical mrg25T" method="post" />
<input type="hidden" name="tipoFormulario" id="tipoFormulario" value="form_index_inicio" />
                    <div id="login-form" class="content-box">
                        <h3 class="content-box-header ui-state-default">
                            <div class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-user"></i>
                            </div>
                            <span>Inicio de Sesión </span>
                        </h3>
                        <div class="content-box-wrapper pad20A pad0B">
                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="login_email">
                                        Usuario:
                                        <span class="required">*</span>
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-envelope-alt ui-state-default"></i>
                                        <input placeholder="Dirección de correo" data-type="email" data-trigger="change" data-required="true" type="text" name="usuario" id="usuario" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="login_pass">
                                        Contraseña:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-unlock-alt ui-state-default"></i>
                                        <input placeholder="Contraseña" data-trigger="keyup" data-rangelength="[3,25]" type="password" name="contrasena" id="contrasena" />
                                    </div>
                                </div>
                            </div>
                            <!--<div class="form-row">
                                <div class="form-checkbox-radio col-md-6">
                                    <input type="checkbox" class="custom-checkbox" name="remember-password" id="remember-password" />
                                    <label for="remember-password" class="pad5L">Remember password?</label>
                                </div>
                                <div class="form-checkbox-radio text-right col-md-6">
                                    <a href="#" class="toggle-switch" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Forgot your password?</a>
                                </div>
                            </div>-->
                        </div>
                        <div class="button-pane text-center">
                            <button type="submit" class="btn large primary-bg text-transform-upr font-size-11" id="demo-form-valid" title="Validate!">
                                <span class="button-content">
                                    Aceptar
                                </span>
                            </button>
                        </div>
                    </div>

                    <div class="divider"></div>
                    <div class="form-row text-center">
                        <a href="javascript:;" data-layout="center" data-type="warning" class="ui-state-default btn medium noty radius-all-100" title="Register">
                            <span class="button-content pad20L pad20R">
                                Registrar nuevo usuario
                            </span>
                        </a>
                    </div>
                    <div class="ui-dialog mrg5T no-shadow hide" id="login-forgot" style="position: relative !important;">
                        <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                            <span class="ui-dialog-title">Recover password</span>
                        </div>
                        <div class="pad20A ui-dialog-content ui-widget-content">
                            <div class="form-row">
                                <div class="form-label col-md-2">
                                    <label for="">
                                        Email address:
                                    </label>
                                </div>
                                <div class="form-input col-md-10">
                                    <div class="form-input-icon">
                                        <i class="glyph-icon icon-envelope-alt ui-state-default"></i>
                                        <input placeholder="Email address" type="text" name="" id="" />
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="ui-dialog-buttonpane text-center">
                            <button type="submit" class="btn large primary-bg" id="demo-form-valid" onclick="javascript:$(&apos;#demo-form&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                                <span class="button-content">
                                    Recover Password
                                </span>
                            </button>
                            <a href="javascript:;" switch-target="#login-form" switch-parent="#login-forgot" class="btn large transparent no-shadow toggle-switch font-bold font-size-11 radius-all-4" id="login-form-valid" onclick="javascript:$(&apos;#login-validation&apos;).parsley( &apos;validate&apos; );" title="Validate!">
                                <span class="button-content">
                                    Cancel
                                </span>
                            </a>
                        </div>
                    </div>
                </form>
