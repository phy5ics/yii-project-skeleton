<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="icon" type="image/ico" href="/gfx/favicon.ico"/> 
	<link rel="shortcut icon" type="image/ico" href="/gfx/favicon.ico"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php
		//Configure SCSS publishing and register assets
		$assetPath = Yii::getPathOfAlias('application.views.scss') . DIRECTORY_SEPARATOR . 'main.sass';	
		$publishedCssAsset = Yii::app()->getAssetManager()->publish($assetPath, false, -1, YII_DEBUG);
		$cs = Yii::app()->clientScript;
		$cs->registerCssFile($publishedCssAsset);
		
		$cs = Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.tools.min.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/global.js', CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->baseUrl . '/js/fbBase.js', CClientScript::POS_END);
		
	?>
	
</head>

<body>
	
	<?php echo $content; ?>	

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo Yii::app()->params['googleAnalytics']['gaAccount']; ?>']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</body>
</html>