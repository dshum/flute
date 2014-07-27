<?php

class ServiceSection extends LemonTree\Element {

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('ServiceSection')->rememberForever();
	}

}
