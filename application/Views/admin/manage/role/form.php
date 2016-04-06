
@section=header@

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
      <header>
        <div class="icons">
          <i class="fa fa-ellipsis-h"></i>
        </div>
        <h5>Inline Validation</h5>

        <!-- .toolbar -->
        <div class="toolbar">
          <nav style="padding: 8px;">
            <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
              <i class="fa fa-minus"></i>
            </a> 
            <a href="javascript:;" class="btn btn-default btn-xs full-box">
              <i class="fa fa-expand"></i>
            </a> 
            <a href="javascript:;" class="btn btn-danger btn-xs close-box">
              <i class="fa fa-times"></i>
            </a> 
          </nav>
        </div><!-- /.toolbar -->
      </header>
      <div id="collapse3" class="body">
        <form action="#" class="form-horizontal" id="tagForm">
          <div class="form-group">
            <label class="control-label col-lg-3">名称</label>
            <div class="col-lg-6">
              <input type="text" id="name" name="name" class="form-control col-lg-6">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">链接</label>
            <div class="col-lg-6">
              <input type="text" id="url" name="url" class="form-control col-lg-6">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">图标</label>
            <div class="col-lg-6">
              <input type="text" id="icon" name="icon" class="form-control col-lg-6">
            </div>
          </div>
          
          <div class="form-actions">
            <input type="submit" value="Validate" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
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

  <script src="/src/lib/jquery.form-3.51/jquery.form.js"></script>

  <script src="/src/lib/jquery.gritter/js/jquery.gritter.min.js"></script>

@end@
  

@section=second-footer@

  <script src="/src/js/design/tag.js"></script>
<script>
  $(function() {
      Metis.initTagForm();
    });
</script>
@end@