<?php

class ServiceSection extends Eloquent implements LemonTree\ElementInterface {

	use LemonTree\ElementTrait;

	public function newQuery($excludeDeleted = true)
	{
		$builder = parent::newQuery();

		return $builder->cacheTags('ServiceSection')->rememberForever();
	}

}
