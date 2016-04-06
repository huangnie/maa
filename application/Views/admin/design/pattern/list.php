@section=content@

<div class="row well">
  <!-- .col-lg-12 -->
  <div class="col-lg-12">
    <div class="box">
      <header>
        <h5>设计作品</h5>
        <div class="toolbar">
          <div class="btn-group">
            <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-md btn-success" href="#editModal">
              <i class="fa fa-pan"></i> 新建 
            </a>
          </div>
        </div>
      </header>
      <div id="stripedTable" class="body collapse in">
        <table class="table table-striped responsive-table table-bordered sortableTable">
          <thead> 
            <tr>
              <th>#</th>
              <th>封面</th>
              <th>名称</th>
              <th>备注</th>
              
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            
            <?php foreach($list as $item){ ?>
              <tr>
                <td><?php echo $item['id'];?></td>
                <td><?php echo $item['icon'];?></td>
                <td><?php echo $item['name'];?></td>
                <td><?php echo $item['remark'];?></td>
               
                <td> 

                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- #helpModal -->
<div id="editModal" class="modal fade">
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



@end@

@section=second-footer@
<script>
  $(function() {
    Metis.MetisTable();
    Metis.metisSortable();
  });
</script>
@end@