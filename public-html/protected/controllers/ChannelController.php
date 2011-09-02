<?php

class ChannelController extends Controller
{
	/**
	 * Channel controller is used in conjunction with the Facebook SDK and P3P headers to get around a nasty Facebook+IE-specific 
	 * bug that creates a gagillion JS errors when operating in SSL mode.
	 */
	public function actionIndex()
	{
		$this->renderPartial('index', array());
	}
	
}