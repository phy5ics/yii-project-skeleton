<?php

class EMongoHttpSession extends CHttpSession
{
	public $connectionID;
	public $collectionName;


	private $_db;
	private $_collection;

	public function getUseCustomStorage()
	{
		return true;
	}

	public function getDbConnection()
	{
		if($this->_db !== null)
			return $this->_db;
		else if(($id = $this->connectionID) !== null)
		{
			if(($this->_db = Yii::app()->getComponent($id)) instanceof EMongoDB)
				return $this->_db;
			else
				throw new EMongoException('EMongoHttpSession.connectionID is invalid');
		}
		else
		{
			if(($this->_db = Yii::app()->getComponent('mongodb')) instanceof EMongoDB)
				return $this->_db;
			else
				throw new EMongoException('EMongoHttpSession.connectionID is invalid');
		}
	}

	public function openSession()
	{
		$db = $this->getDbConnection();
		$db->connect();

		$this->_collection = $db->getDbInstance()->{$this->collectionName};

		return true;
	}

	public function destroySession($id)
	{
		$this->_collection->remove(array('_id'=>$id));
		return true;
	}

	public function gcSession($maxLifetime)
	{
		$db = $this->getDbConnection();
		$db->connect();

		$db->getDbInstance()->{$this->collectionName}->remove(array(
			'expire'=>array('$lt'=>time())
		));
		return true;
	}

	public function readSession($id)
	{
		$doc = $this->_collection->findOne(array(
			'_id'=>$id,
			'expire'=>array('$gt'=>time())
		));

		return $doc !== null ? $doc['data'] : '';
	}

	public function writeSession($id, $data)
	{
		// exception must be caught in session write handler
		// http://us.php.net/manual/en/function.session-set-save-handler.php
		try
		{
			$expire = time() + $this->getTimeout();

			if($this->_collection===null)
			{
				$db = $this->getDbConnection();
				$db->connect();
				$this->_collection = $db->getDbInstance()->{$this->collectionName};
			}

			$this->_collection->save(array(
				'_id'=>$id,
				'expire'=>$expire,
				'data'=>$data,
			));
		}
		catch(Exception $e)
		{
			return false;
		}
		return true;
	}
}