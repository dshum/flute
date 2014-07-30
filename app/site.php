<?php namespace LemonTree;

$site = \App::make('site');

$site->initMicroTime();

$site->

	/*
	 * Служебный раздел
	 */

	addItem(
		Item::create('ServiceSection')->
		setTitle('Служебный раздел')->
		setMainProperty('name')->
		setRoot(true)->
		setElementPermissions(true)->
		addOrderBy('order', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('ServiceSection')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
			bind(Site::ROOT, 'ServiceSection')->
			bind('ServiceSection', 'ServiceSection')
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	/*
	 * Категория
	 */

	addItem(
		Item::create('Category')->
		setTitle('Категория')->
		setMainProperty('name')->
		setElementPermissions(true)->
		addOrderBy('order', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('ServiceSection')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
			bind(Site::ROOT, 'ServiceSection')->
			bind('ServiceSection', 'ServiceSection')
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	/*
	 * Оценка
	 */

	addItem(
		Item::create('Mark')->
		setTitle('Оценка')->
		setMainProperty('name')->
		setElementPermissions(true)->
		addOrderBy('order', 'asc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('ServiceSection')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
			bind(Site::ROOT, 'ServiceSection')->
			bind('ServiceSection', 'ServiceSection')
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	/*
	 * Произведение
	 */

	addItem(
		Item::create('Composition')->
		setTitle('Произведение')->
		setMainProperty('name')->
		setElementPermissions(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('service_section_id')->
			setTitle('Служебный раздел')->
			setRelatedClass('ServiceSection')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
			bind(Site::ROOT, 'ServiceSection')->
			bind('ServiceSection', 'ServiceSection')
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setReadonly(true)->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	/*
	 * Карточка
	 */

	addItem(
		Item::create('Card')->
		setTitle('Карточка')->
		setMainProperty('name')->
		setElementPermissions(true)->
		addOrderBy('created_at', 'desc')->
		addProperty(
			TextfieldProperty::create('name')->
			setTitle('Название')->
			setRequired(true)->
			setShow(true)
		)->
		addProperty(
			OneToOneProperty::create('category_id')->
			setTitle('Категория')->
			setRequired(true)->
			setShow(true)->
			setRelatedClass('Category')->
			setDeleting(OneToOneProperty::RESTRICT)->
			setParent(true)->
			bind('Category')
		)->
		addProperty(
			OneToOneProperty::create('composition_id')->
			setTitle('Произведение')->
			setShow(true)->
			setRelatedClass('Composition')->
			setDeleting(OneToOneProperty::RESTRICT)->
			bind('Composition')
		)->
		addProperty(
			OneToOneProperty::create('mark_id')->
			setTitle('Оценка')->
			setShow(true)->
			setRelatedClass('Mark')->
			setDeleting(OneToOneProperty::RESTRICT)->
			bind('Mark')
		)->
		addProperty(
			DatetimeProperty::create('created_at')->
			setTitle('Дата создания')->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('date_yellow')->
			setTitle('Дата желтая')->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('date_red')->
			setTitle('Дата красная')->
			setShow(true)
		)->
		addProperty(
			DatetimeProperty::create('updated_at')->
			setTitle('Последнее изменение')->
			setReadonly(true)->
			setShow(true)
		)
	)->

	bind(Site::ROOT, 'ServiceSection')->
	bind('ServiceSection.1', 'Category')->
	bind('ServiceSection.2', 'Mark')->
	bind('ServiceSection.3', 'Composition')->
	bind('ServiceSection.4', 'Composition')->
	bind('Category', 'Card')->

	bindTree(Site::ROOT, 'ServiceSection')->
	bindTree('ServiceSection', 'Category', 'Mark', 'Composition')->
	bindTree('Category', 'Card')->
	bindTree('Mark', 'Card')->
	bindTree('Composition', 'Card')->

	end();
