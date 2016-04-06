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

<!doctype html>
<html class="no-js" lang="<?php echo LANGUAGE_CODE; ?>">
  <head>
  <!-- Site meta -->
    <meta charset="UTF-8">
    <?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php if(isset($html_title)) echo $html_title; else echo('一家之计'); ?></title>

	<!-- CSS -->
	<?php 
	Assets::css(array(
		Url::template('style.css'),
	));

	//hook for plugging in css
	$hooks->run('css');
	?>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="/dis/lib/bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="/src/lib/bootstrap/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css"> -->
    <!-- <link rel="stylesheet" href="/dist/lib/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="/src/lib/font-awesome-4.2.0/css/font-awesome.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="/assets/css/main.min.css">

    <!-- metisMenu stylesheet -->
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.css"> -->
    <!-- <link rel="stylesheet" href="/dist/lib/metisMenu/metisMenu.min.css"> -->
    <link rel="stylesheet" href="/src/lib/metisMenu-1.1.3/metisMenu.min.css">


    <!-- 加载其他外部文件 -->
    @section=header

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
      <script src=  "/src/lib/html5shiv/html5shiv.js"></script>
      <script src="/src/lib/respond/respond.min.js"></script>
    <![endif]-->


    <!--For Development Only. Not required -->
    <script>
      less = {
        env: "development",
        relativeUrls: false,
        rootpath: "/assets/"
      };
    </script>
    <link rel="stylesheet" href="/assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="/assets/less/theme.less">
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.2.0/less.min.js"></script> -->
    <!-- <script src="/dist/lib/less.js/less.min.js"></script> -->
    <script src="/src/lib/less.js-2.2.0/dist/less.min.js"></script>

    <!--Modernizr-->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> -->
    <!-- <script src="/dist/lib/modernizr/modernizr.js"></script> -->
    <script src="/src/lib/modernizr-2.8.3/modernizr.js"></script>

  </head>
 
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>
