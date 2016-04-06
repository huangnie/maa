
@section=header@
  <link rel="stylesheet" href="/src/lib/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css">
  <link rel="stylesheet" href="/src/lib/jquery.gritter/css/jquery.gritter.css">
  <!--  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Uniform.js/2.1.2/themes/default/css/uniform.default.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css"> -->

  <link rel="stylesheet" href="/src/lib/uniform.js-2.1.2/themes/default/css/uniform.default.min.css">
  <link rel="stylesheet" href="/src/lib/jasny-bootstrap-3.1.3/dist/css/jasny-bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/src/lib/webuploader-0.1.5/css/webuploader.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lib/webuploader/image-upload/style.css" />

@end@

@section=content@
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <h5>增加设计作品</h5>
        <!-- <h5>Wizard with Validation</h5> -->
      </header>
      <div id="div-2" class="body">
        <form id="wizardForm" method="post" action="" class="form-horizontal wizardForm">
          <input type="hidden" name="design_id" id="design_id" value="<?php if(isset($design['id'])) echo $design['id']; ?>">
          <fieldset class="step" id="first">

            <h4 class="text-danger pull-right"> 基本信息</h4>
            <div class="clearfix"></div>
            <div class="form-group">
              <label for="design_name" class="control-label col-lg-2">作品名称</label>
              <div class="col-lg-4">
                <input type="text" name="design_name" id="design_name" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="design_category" class="control-label col-lg-2">分 类</label>
              <div class="col-lg-4">
                <select name="design_category" id="design_category" class="form-control">
                <?php echo $category; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="design_pattern" class="control-label col-lg-2">模 式</label>
              <div class="col-lg-4"> 
                <select name="design_pattern" id="design_pattern" class="form-control">
                  <?php echo $pattern; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="design_tag" class="control-label col-lg-2">标 签</label>
              <div class="col-lg-4">
                <select name="design_tag" id="design_tag" class="form-control">
                  <?php echo $tag; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-lg-2">摘 要</label>
              <div class="col-lg-6"> 
                <textarea id="tag_remark" name="design_remark" class="form-control col-lg-4" rows="5"> </textarea>
              </div>
            </div>
         
            <div class="form-group">
              <label class="control-label col-lg-2">附 件</label>
              <div class="col-lg-4">
                <?php if(isset($design['cover']) && isset($design['cover']) && !empty($design['cover']['path'])) { ?>

                <div class="fileinput fileinput-exists" data-provides="fileinput">
                  <span class="btn btn-default btn-file">
                  <span class="fileinput-new">Select file</span> 
                  <span class="fileinput-exists">Change</span> 
                    <input type="file" name="design_attachment">
                  </span>
                  <span class="fileinput-filename"><?php echo $design['cover']['path']; ?></span> 
                  <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a> 
                </div>

                <?php } else { ?>

                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <span class="btn btn-default btn-file">
                  <span class="fileinput-new">Select file</span> 
                  <span class="fileinput-exists">Change</span> 
                    <input type="file" name="design_attachment">
                  </span>
                  <span class="fileinput-filename"></span> 
                  <a href="#" class="close fileinput-exists" data-dismiss="fileinput" style="float: none">&times;</a> 
                </div>

                <?php } ?>
                
              </div>
            </div>

            <?php if(false) { ?>
            <div class="form-group">
              <label class="control-label col-lg-2">封面图片</label>
              <div class="col-lg-4">
                <div class="fileinput fileinput-exsits" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file">
                      <span class="fileinput-new">Select image</span>
                      <span class="fileinput-exists">Change</span> 
                      <input type="file" name="design_image">
                    </span> 
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                  </div>
                </div>
              </div>
            </div>

            <?php } else { ?>
            <div class="form-group">
              <label class="control-label col-lg-2">封面图片</label>
              <div class="col-lg-4"> 
                <?php if(isset($design['cover']) && isset($design['cover']) && !empty($design['cover']['path'])) { ?>
                <div class="fileinput fileinput-exsits" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                    <img src="<?php echo $design['cover']['path']; ?>" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                  <div>
                    <span class="btn btn-default btn-file">
                      <span class="fileinput-new">Select image</span> 
                      <span class="fileinput-exists">Change</span> 
                      <input type="file" name="design_image">
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
                      <input type="file" name="design_image">
                    </span> 

                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <!-- <div class="alert alert-warning">
              <strong>Notice!</strong>  
              Image preview only works in IE10+, FF3.6+, Chrome6.0+ and Opera11.1+. In older browsers and Safari, the filename is shown instead.
            </div> -->
            <?php } ?>
          </fieldset>

          <fieldset class="step" id="second">
            <h4 class="text-warning pull-right"><i class="fa fa-cloud-upload"></i> 批量上传 <!-- Multiple Uploader --></h4>
            <div class="clearfix"></div>

            <div class="form-group">
              <label for="table_prefix" class="control-label col-lg-2"></label>
              <div class="col-lg-6">
                <div id="image-uploader">
                  <div class="queueList">
                      <div id="dndArea" class="placeholder">
                          <!-- <div id="filePicker"></div> -->
                          <p>或将照片拖到这里，单次最多可选300张, 但暂时不使用该功能, 去掉注释可启用</p>
                      </div>
                  </div>
                  <div class="statusBar" style="display:none;">
                      <div class="progress">
                          <span class="text">0%</span>
                          <span class="percentage"></span>
                      </div><div class="info"></div>
                      <div class="btns">
                          <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
                      </div>
                  </div>
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="table_prefix" class="control-label col-lg-2"></label>
              <div class="col-lg-6">
                <div id="attach-uploader"></div>
                
              </div>
            </div>

             <div class="alert alert-warning">
              <strong>Notice!</strong>  
              暂时不使用该功能, 请直接提交保存 (暂时一个图片和附件).
            </div>

          </fieldset>

          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-6">
                <input class="navigation_button btn" id="back" value="Back" type="reset" />
                <span>&nbsp;</span>
                <input class="navigation_button btn btn-primary" id="next" value="Next" type="submit" />
              </div>
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


<script type="text/javascript" src="/src/lib/webuploader-0.1.5/dist/webuploader.js"></script>
  <script type="text/javascript" src="/src/js/upload.js"></script>

@end@
  

@section=second-footer@
<script>
  $(function() {
      Metis.formWizard();
    });
</script>
@end@