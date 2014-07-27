<?php

class Card extends LemonTree\Element {

	public function getDates()
	{
		return array('created_at', 'updated_at', 'date_yellow', 'date_red');
	}

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Card')->rememberForever();
	}

	public function category()
	{
		return $this->belongsTo('Category');
	}

	public function mark()
	{
		return $this->belongsTo('Mark');
	}

	public function composition()
	{
		return $this->belongsTo('Composition');
	}

}
