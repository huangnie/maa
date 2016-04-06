@section=header@
<link rel="stylesheet" href="/src/lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="/src/lib/pagedown-bootstrap/css/jquery.pagedown-bootstrap.css">
@end@

@section=content@
<style>
  ul.wysihtml5-toolbar > li {
    position: relative;
  }
</style>
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
        <h5>Basic Editor</h5>

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
      <div id="div-1" class="body">
        <form>
          <textarea id="wysihtml5" class="form-control" rows="10"></textarea>
          <div class="form-actions">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-th-large"></i>
        </div>
        <h5>CKEditor</h5>

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
      <div class="body">
        <form>
          <textarea id="ckeditor" class="ckeditor"></textarea>
          <div class="form-actions no-margin-bottom" id="cleditorForm">
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-lg-12">
    <div class="box">
      <header>
        <h5>Markdown Editor</h5>
        <ul class="nav nav-tabs pull-right">
          <li class="active">
            <a href="#markdown" data-toggle="tab">Markdown</a> 
          </li>
          <li> <a href="#preview" data-toggle="tab">Preview</a>  </li>
        </ul>
      </header>
      <div id="div-3" class="body tab-content">
        <div class="tab-pane fade active in" id="markdown">
          <div class="wmd-panel">
            <div id="wmd-button-bar" class="btn-toolbar"></div>
            <textarea class="form-control wmd-input" rows="10" name="description" id="wmd-input">
            </textarea>
          </div>
        </div>
        <div class="tab-pane fade" id="preview">
          <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
        </div>
      </div>
    </div>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <header>
        <div class="icons">
          <i class="fa fa-edit"></i>
        </div>
        <h5>epiceditor</h5>

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
      <div id="epiceditorDiv" class="body">
        <div id="epiceditor">
          <textarea id="my-edit-area"></textarea>
        </div><!-- /#epiceditor -->
      </div><!-- /#epiceditorDiv.body collapse in -->
    </div><!-- /.box -->
  </div><!-- /.col-md-12 -->
</div><!-- /.row -->
@end@

@section=footer@
   <!--  <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.4.5/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/epiceditor/0.2.2/js/epiceditor.min.js"></script> -->

    <script src="/src/lib/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <script src="/src/lib/ckeditor-4.4.5/ckeditor.js"></script>
    <script src="/src/lib/epiceditor-0.2.2/epiceditor/js/epiceditor.min.js"></script>
    <script src="/src/lib/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="/src/lib/pagedown-bootstrap/js/jquery.pagedown-bootstrap.combined.min.js"></script>
@end@

@section=second-footer@
<script>
$(function() {
  Metis.formWysiwyg();
});
</script>
@end@