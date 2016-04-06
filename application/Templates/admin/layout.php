<div class="bg-dark dk" id="wrap">
  <div id="top">
    <!-- .navbar -->
    <!-- include navbar.php -->
    <?php include "navbar.php";?>
    <!-- /.navbar -->
    <header class="head">
      <div class="search-bar">
        <form class="main-search" action="">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Live Search ...">
            <span class="input-group-btn">
                <button class="btn btn-primary btn-sm text-muted" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span> 
          </div>
        </form><!-- /.main-search -->
      </div><!-- /.search-bar -->
      <div class="main-bar">
        <h3>
          <i class="fa fa-home"></i>&nbsp; 一家之计</h3>
      </div><!-- /.main-bar -->
    </header><!-- /.head -->
  </div><!-- /#top -->

  <div id="left">
    <div class="media user-media bg-dark dker">
      <div class="user-media-toggleHover">
        <span class="fa fa-user"></span> 
      </div>
      <div class="user-wrapper bg-dark">
        <a class="user-link" href="#">
          <img class="media-object img-thumbnail user-img" alt="User Picture" src="/assets/img/user.gif">
          <span class="label label-danger user-label">16</span> 
        </a> 
        <div class="media-body">
          <h5 class="media-heading">Nickel</h5>
          <ul class="list-unstyled user-info">
            <li> <a href="#">黄 镍</a>  </li>
            <li>Last Access :
              <br>
              <small>
                <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small> 
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- #menu -->
    <!-- include menu.php -->
    <?php include "menu.php";?>

    <!-- /#menu -->
  </div><!-- /#left -->

  <div id="content">
    <div class="outer">
      <div class="inner bg-light lter" style="min-height: 700px;">
        <!-- 加载正文内容 -->
        @section=content
      </div><!-- /.inner -->
    </div><!-- /.outer -->
  </div><!-- /#content -->

  <div id="right" class="bg-light lter">
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Warning!</strong>  Best check yo self, you're not looking too good.
    </div>

    <!-- .well well-small -->
    <div class="well well-small dark">
      <ul class="list-unstyled">
        <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span> 
        </li>
        <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span> 
        </li>
        <li>Popularity <span class="dynamicbar pull-right">Loading..</span> 
        </li>
        <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span> 
        </li>
      </ul>
    </div><!-- /.well well-small -->

    <!-- .well well-small -->
    <div class="well well-small dark">
      <button class="btn btn-block">Default</button>
      <button class="btn btn-primary btn-block">Primary</button>
      <button class="btn btn-info btn-block">Info</button>
      <button class="btn btn-success btn-block">Success</button>
      <button class="btn btn-danger btn-block">Danger</button>
      <button class="btn btn-warning btn-block">Warning</button>
      <button class="btn btn-inverse btn-block">Inverse</button>
      <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
      <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
      <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
      <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
      <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
      <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
    </div><!-- /.well well-small -->

    <!-- .well well-small -->
    <div class="well well-small dark">
      <span>Default</span> <span class="pull-right"><small>20%</small> </span> 
      <div class="progress xs">
        <div class="progress-bar progress-bar-info" style="width: 20%"></div>
      </div>
      <span>Success</span> <span class="pull-right"><small>40%</small> </span> 
      <div class="progress xs">
        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
      </div>
      <span>warning</span> <span class="pull-right"><small>60%</small> </span> 
      <div class="progress xs">
        <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
      </div>
      <span>Danger</span> <span class="pull-right"><small>80%</small> </span> 
      <div class="progress xs">
        <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
      </div>
    </div>
  </div>
</div><!-- /#wrap -->
<!-- /#right -->
<!-- </div>/#wrap -->

<footer class="Footer bg-dark dker">
  <p>2016~2050 &copy; Plan Of Indoor </p>
</footer><!-- /#footer -->

<!-- #helpModal -->
<div id="helpModal" class="modal fade">
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
</div>
