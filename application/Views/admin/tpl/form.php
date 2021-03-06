
@section=header@
  <link rel="stylesheet" href="/src/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
  <link rel="stylesheet" href="/src/lib/jquery.gritter/css/jquery.gritter.css">
  <!--  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"> -->

  <link rel="stylesheet" href="/src/lib/uniform.js-2.1.2/themes/default/css/uniform.default.min.css">
  <link rel="stylesheet" href="/src/lib/jasny-bootstrap-3.1.3/dist/css/jasny-bootstrap.min.css">
@end@

@section=content@
<div class="row">
 
  <div class="col-lg-12">
    <div class="box">
      <header class="dark">
        <div class="icons">
          <i class="fa fa-cloud-upload"></i>
        </div>
        <h5>File Upload</h5>
      </header>
      <div class="body">
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-lg-4">Browser Default</label>
            <div class="col-lg-8">
              <input type="file">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-4">Uniform Style</label>
            <div class="col-lg-8">
              <input type="file" id="fileUpload" />
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-4">Bootstrap Style</label>
            <div class="col-lg-8">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="input-group">
                  <div class="form-control uneditable-input span3" data-trigger="fileinput">
                    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> 
                  </div>
                  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span> 
                    <input type="file" name="...">
                  </span> 
                  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-4">No Input</label>
            <div class="col-lg-8">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <span class="btn btn-default btn-file">
                <span class="fileinput-new">Select file</span> 
                <span class="fileinput-exists">Change</span> 
                  <input type="file" name="...">
                </span> 
                <span class="fileinput-filename"></span> 
                <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-4">Image Upload</label>
            <div class="col-lg-8">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                    <input type="file" name="...">
                  </span> 
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-4">Pre Defined Image</label>
            <div class="col-lg-8">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img data-src="holder.js/100%x100%" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                    <input type="file" name="...">
                  </span> 
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
              </div>
            </div>
          </div>
          <div class="alert alert-warning"><strong>Notice!</strong>  Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.</div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <h5>Multiple Uploader</h5>
      </header>
      <div id="collapse2" class="block">
        <form>
          <div id="uploader"></div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <h5>Wizard with Validation</h5>
      </header>
      <div id="div-2" class="body">
        <form id="wizardForm" method="post" action="" class="form-horizontal wizardForm">
          <fieldset class="step" id="first">
            <h4 class="text-danger pull-right">Database Settings</h4>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="server_host" class="control-label col-lg-4">Database Server</label>
              <div class="col-lg-8">
                <input type="text" name="server_host" id="server_host" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="server_name" class="control-label col-lg-4">Database Name</label>
              <div class="col-lg-8">
                <input type="text" name="server_name" id="server_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="server_user" class="control-label col-lg-4">Database User</label>
              <div class="col-lg-8">
                <input type="text" name="server_user" id="server_user" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="server_password" class="control-label col-lg-4">User Password</label>
              <div class="col-lg-8">
                <input type="password" name="server_password" id="server_password" class="form-control">
              </div>
            </div>
          </fieldset>
          <fieldset class="step" id="second">
            <h4 class="text-warning pull-right">Table Settings</h4>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="table_prefix" class="control-label col-lg-4">Table Prefix</label>
              <div class="col-lg-8">
                <input type="text" name="table_prefix" id="table_prefix" value="nuro_" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="table_collation" class="control-label col-lg-4">Table Collation</label>
              <div class="col-lg-8">
                <select name="table_collation" id="table_collation" class="form-control">
                  <option value="">Collation</option>
                  <option value=""></option>
                  <optgroup label="utf8" title="UTF-8 Unicode">
                    <option value="utf8_bin" title="Unicode (multilingual), Binary">
                      utf8_bin
                    </option>
                    <option value="utf8_czech_ci" title="Czech, case-insensitive">
                      utf8_czech_ci
                    </option>
                    <option value="utf8_danish_ci" title="Danish, case-insensitive">
                      utf8_danish_ci
                    </option>
                    <option value="utf8_esperanto_ci" title="Esperanto, case-insensitive">utf8_esperanto_ci
                    </option>
                    <option value="utf8_estonian_ci" title="Estonian, case-insensitive">utf8_estonian_ci
                    </option>
                    <option value="utf8_general_ci" title="Unicode (multilingual), case-insensitive">
                      utf8_general_ci
                    </option>
                    <option value="utf8_general_mysql500_ci" title="Unicode (multilingual)">utf8_general_mysql500_ci
                    </option>
                    <option value="utf8_hungarian_ci" title="Hungarian, case-insensitive">utf8_hungarian_ci
                    </option>
                    <option value="utf8_icelandic_ci" title="Icelandic, case-insensitive">utf8_icelandic_ci
                    </option>
                    <option value="utf8_latvian_ci" title="Latvian, case-insensitive">utf8_latvian_ci
                    </option>
                    <option value="utf8_lithuanian_ci" title="Lithuanian, case-insensitive">utf8_lithuanian_ci
                    </option>
                    <option value="utf8_persian_ci" title="Persian, case-insensitive">utf8_persian_ci
                    </option>
                    <option value="utf8_polish_ci" title="Polish, case-insensitive">
                      utf8_polish_ci
                    </option>
                    <option value="utf8_roman_ci" title="West European, case-insensitive">utf8_roman_ci
                    </option>
                    <option value="utf8_romanian_ci" title="Romanian, case-insensitive">utf8_romanian_ci
                    </option>
                    <option value="utf8_sinhala_ci" title="unknown, case-insensitive">utf8_sinhala_ci
                    </option>
                    <option value="utf8_slovak_ci" title="Slovak, case-insensitive">
                      utf8_slovak_ci
                    </option>
                    <option value="utf8_slovenian_ci" title="Slovenian, case-insensitive">utf8_slovenian_ci
                    </option>
                    <option value="utf8_spanish2_ci" title="Traditional Spanish, case-insensitive">
                      utf8_spanish2_ci
                    </option>
                    <option value="utf8_spanish_ci" title="Spanish, case-insensitive">utf8_spanish_ci
                    </option>
                    <option value="utf8_swedish_ci" title="Swedish, case-insensitive">utf8_swedish_ci
                    </option>
                    <option value="utf8_turkish_ci" title="Turkish, case-insensitive">utf8_turkish_ci
                    </option>
                    <option value="utf8_unicode_ci" title="Unicode (multilingual), case-insensitive">
                      utf8_unicode_ci
                    </option>
                  </optgroup>
                  <optgroup label="utf8mb4" title="UTF-8 Unicode">
                    <option value="utf8mb4_bin" title="unknown, Binary">
                      utf8mb4_bin
                    </option>
                    <option value="utf8mb4_czech_ci" title="Czech, case-insensitive">utf8mb4_czech_ci
                    </option>
                    <option value="utf8mb4_danish_ci" title="Danish, case-insensitive">utf8mb4_danish_ci
                    </option>
                    <option value="utf8mb4_esperanto_ci" title="Esperanto, case-insensitive">utf8mb4_esperanto_ci
                    </option>
                    <option value="utf8mb4_estonian_ci" title="Estonian, case-insensitive">utf8mb4_estonian_ci
                    </option>
                    <option value="utf8mb4_general_ci" title="unknown, case-insensitive">utf8mb4_general_ci
                    </option>
                    <option value="utf8mb4_hungarian_ci" title="Hungarian, case-insensitive">utf8mb4_hungarian_ci
                    </option>
                    <option value="utf8mb4_icelandic_ci" title="Icelandic, case-insensitive">utf8mb4_icelandic_ci
                    </option>
                    <option value="utf8mb4_latvian_ci" title="Latvian, case-insensitive">utf8mb4_latvian_ci
                    </option>
                    <option value="utf8mb4_lithuanian_ci" title="Lithuanian, case-insensitive">
                      utf8mb4_lithuanian_ci
                    </option>
                    <option value="utf8mb4_persian_ci" title="Persian, case-insensitive">utf8mb4_persian_ci
                    </option>
                    <option value="utf8mb4_polish_ci" title="Polish, case-insensitive">utf8mb4_polish_ci
                    </option>
                    <option value="utf8mb4_roman_ci" title="West European, case-insensitive">utf8mb4_roman_ci
                    </option>
                    <option value="utf8mb4_romanian_ci" title="Romanian, case-insensitive">utf8mb4_romanian_ci
                    </option>
                    <option value="utf8mb4_sinhala_ci" title="unknown, case-insensitive">utf8mb4_sinhala_ci
                    </option>
                    <option value="utf8mb4_slovak_ci" title="Slovak, case-insensitive">utf8mb4_slovak_ci
                    </option>
                    <option value="utf8mb4_slovenian_ci" title="Slovenian, case-insensitive">utf8mb4_slovenian_ci
                    </option>
                    <option value="utf8mb4_spanish2_ci" title="Traditional Spanish, case-insensitive">
                      utf8mb4_spanish2_ci
                    </option>
                    <option value="utf8mb4_spanish_ci" title="Spanish, case-insensitive">utf8mb4_spanish_ci
                    </option>
                    <option value="utf8mb4_swedish_ci" title="Swedish, case-insensitive">utf8mb4_swedish_ci
                    </option>
                    <option value="utf8mb4_turkish_ci" title="Turkish, case-insensitive">utf8mb4_turkish_ci
                    </option>
                    <option value="utf8mb4_unicode_ci" title="Unicode (multilingual), case-insensitive">
                      utf8mb4_unicode_ci
                    </option>
                  </optgroup>
                </select>
              </div>
            </div>
          </fieldset>
          <fieldset class="step" id="last">
            <h4 class="text-primary pull-right">User Settings</h4>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="username" class="control-label col-lg-4">Username</label>
              <div class="col-lg-8">
                <input type="text" name="username" id="username" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="usermail" class="control-label col-lg-4">E-mail</label>
              <div class="col-lg-8">
                <input type="text" name="usermail" id="usermail" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="pass" class="control-label col-lg-4">User Password</label>
              <div class="col-lg-8">
                <input type="password" name="pass" id="pass" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="pass2" class="control-label col-lg-4">Confirm Password</label>
              <div class="col-lg-8">
                <input type="password" name="pass2" id="pass2" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-8">
                <label class="checkbox">
                  <input type="checkbox" class="form-control"> Remember me
                </label>
              </div>
            </div>
          </fieldset>
          <div class="form-actions">
            <input class="navigation_button btn" id="back" value="Back" type="reset" />
            <input class="navigation_button btn btn-primary" id="next" value="Next" type="submit" />
          </div>
        </form>
        <div id="data"></div>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<!-- #helpModal -->
<div id="mypModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
          in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal --><!-- /#helpModal -->
@end@

@section=footer@
 <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/holder/2.4.1/holder.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/jquery.uniform.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js"></script> -->

  <script src="/src/lib/jquery-ui-1.11.2/jquery-ui.min.js"></script>
  <script src="/src/lib/jquery-validate-1.13.1/dist/jquery.validate.min.js"></script>
  <script src="/src/lib/holder-2.4.1/holder.js"></script>
  <script src="/src/lib/uniform.js-2.1.2/jquery.uniform.min.js"></script>
  <script src="/src/lib/jasny-bootstrap-3.1.3/dist/js/jasny-bootstrap.min.js"></script>
  <script src="/src/lib/jquery.form-3.51/jquery.form.js"></script>


  <script src="/src/lib/plupload/js/plupload.full.min.js"></script>
  <script src="/src/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
  <script src="/src/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
  <script src="/src/lib/formwizard/js/jquery.form.wizard.js"></script>
@end@


@section=second-footer@
<script>
  $(function() {
      Metis.formWizard();
    });
</script>
@end@
