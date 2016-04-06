
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
        <h5>编辑模式(风格)</h5>

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
        <form action="#" class="form-horizontal" id="patternForm">
           
          <div class="form-group">
            <label class="control-label col-lg-3">名称</label>
            <div class="col-lg-6">
              <input type="text" id="pattern_name" name="pattern_name" class="form-control col-lg-6">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-3">父级</label>
            <div class="col-lg-6">
              <select name="pattern_parent" id="pattern_parent" class="form-control">
                <option value="0">顶级</option>
                <?php echo $pattern; ?>
              </select>
            </div>
          </div>
         
         <div class="form-group">
            <label class="control-label col-lg-3">图标</label>
            <div class="col-lg-6"> 
            <?php if(isset($pattern['icon']) && !empty($pattern['icon'])) { ?>
              <div class="fileinput fileinput-exsits" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img src="<?php echo $pattern['icon']['path']; ?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 120px;"></div>
                <div>
                  <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Select image</span> 
                    <span class="fileinput-exists">Change</span> 
                    <input type="file" name="pattern_icon">
                  </span> 
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
              </div>
            <?php } else { ?>
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img data-src="holder.js/100%x100%" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file">
                    <span class="fileinput-new">Select image</span> 
                    <span class="fileinput-exists">Change</span> 
                    <input type="file" name="pattern_icon">
                  </span> 
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
              </div>
            <?php } ?>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-lg-3">简介</label>
            <div class="col-lg-6">
              <textarea id="pattern_remark" name="pattern_remark" class="form-control col-lg-6" rows="5"> </textarea>
            </div>
          </div>

           <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <input type="submit" value="保 存" class="btn btn-primary">
              </div>
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
  <script src="/src/lib/jasny-bootstrap-3.1.3/dist/js/jasny-bootstrap.min.js"></script>
  <script src="/src/lib/jquery.form-3.51/jquery.form.js"></script>


  <script src="/src/lib/plupload/js/plupload.full.min.js"></script>
  <script src="/src/lib/jquery.gritter/js/jquery.gritter.min.js"></script>
@end@
  

@section=second-footer@
  <script src="/src/js/design/pattern.js"></script>
<script>
  $(function() {
      Metis.initPatternForm();
    });
</script>
@end@