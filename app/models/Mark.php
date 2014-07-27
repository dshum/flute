<?php

class Mark extends LemonTree\Element {

	const YELLOW_MARK_ID = 1;
	const RED_MARK_ID = 2;

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Mark')->rememberForever();
	}

}
