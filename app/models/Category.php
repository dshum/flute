<?php

class Category extends LemonTree\Element {

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Category')->rememberForever();
	}

}
