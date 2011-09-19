<?php $this->pageTitle = Yii::app()->name; ?>

<?php

if (Yii::app()->user->isGuest) {
	$this->widget(
	    'user.views.widgets.WLogin',
	    array(
			'data' => array(),
		)
	);
} else {
	$this->widget(
	    'user.views.widgets.WUserProfile',
	    array(
			'data' => array(),
		)
	);
}

?>