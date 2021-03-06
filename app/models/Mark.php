<?php

class Mark extends Eloquent implements LemonTree\ElementInterface {

	use LemonTree\ElementTrait;

	const YELLOW_MARK_ID = 1;
	const RED_MARK_ID = 2;

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Mark')->rememberForever();
	}

}
