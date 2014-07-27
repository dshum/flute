<?php

class Composition extends LemonTree\Element {

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('Composition')->rememberForever();
	}

}
