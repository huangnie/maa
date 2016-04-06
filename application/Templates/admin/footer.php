<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;

//initialise hooks
$hooks = Hooks::get();
?>

</div>

<!-- JS -->
<?php

Assets::js(array(
	// Url::template('jquery.js'),
));

//hook for plugging in javascript
$hooks->run('js');
//hook for plugging in code into the footer
$hooks->run('footer');
?>

<!--jQuery -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!-- <script src="/dist/lib/jquery/jquery.min.js"></script> -->
<!-- <script src="/src/lib/jquery/dist/jquery.min.js"></script> -->

<!--Bootstrap -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
<!-- <script src="/dist/lib/bootstrap/js/bootstrap.min.js"></script> -->
<script src="/src/lib/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- MetisMenu -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script> -->
<!-- <script src="/dist/lib/metisMenu/metisMenu.min.js"></script> -->
<script src="/src/lib/metisMenu-1.1.3/metisMenu.min.js"></script>

<!-- Screenfull -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script> -->
<!-- <script src="/dist/lib/screenfull.js/dist/screenfull.min.js"></script> -->
<script src="/src/lib/screenfull.js-2.0.0/dist/screenfull.min.js"></script>

<!-- 加载其他外部js -->
@section=footer

<!-- Metis core scripts -->
<script src="/assets/js/core.min.js"></script>

<!-- Metis demo scripts -->
<script src="/src/js/app.js"></script>

@section=second-footer

<script src="/assets/js/style-switcher.min.js"></script>

</body>

</html>
