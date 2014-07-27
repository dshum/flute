<?php

use Carbon\Carbon;

class HomeController extends BaseController {

	public function postLogin()
	{
		$pass = Input::get('pass');

		if ($pass == Constants::PASS) {
			Session::put('pass', Constants::PASS);
		}

		return \Redirect::back();
	}

	public function getLogout()
	{
		Session::forget('pass');

		return \Redirect::back();
	}

	public function getSet($mark, $id)
	{
		$isLogged = Session::get('pass') == Constants::PASS;

		if (!$isLogged) {
			return \Redirect::back();
		}

		if ( !in_array($mark, array('empty', 'yellow', 'red'))) {
			$mark = null;
		}

		try {
			$card = Card::find($id);
		} catch (Exception $e) {
			$card = null;
		}

		if ( ! $mark || ! $card) {
			return \Redirect::back();
		}

		$now = Carbon::now();

		switch ($mark) :
			case 'empty':
				$card->mark_id = null;
				$card->date_yellow = null;
				$card->date_red = null;
				break;
			case 'yellow':
				$card->mark_id = Mark::YELLOW_MARK_ID;
				$card->date_yellow = $now;
				break;
			case 'red':
				$card->mark_id = Mark::RED_MARK_ID;
				$card->date_red = $now;
				break;
			default:
				break;
		endswitch;

		try {
			$card->save();
		} catch (Exception $e) {}

		return \Redirect::back();
	}

	public function getArchive()
	{
		$isLogged = Session::get('pass') == Constants::PASS;

		\View::share('isLogged', $isLogged);

		$categoryList = Category::orderBy('order')->get();

		$cardList = Card::where('mark_id', Mark::RED_MARK_ID)->
			orderBy('date_red')->get();

		$redMap = array();
		$blueMap = array();
		$k = array();

		foreach ($cardList as $card) {
			if (!isset($k[$card->category_id])) {
				$k[$card->category_id] = 0;
			}
			$redMap[$card->category_id.'_'.$k[$card->category_id]][$card->id] = $card;
			if (sizeof($redMap[$card->category_id.'_'.$k[$card->category_id]]) == Constants::RED_STEP) {
				$category = $card->category->first();
				$blueMap[$card->category_id.'_'.$k[$card->category_id]] = array($card->date_red, $category);
				$k[$card->category_id]++;
			}
		}

		$scope['categoryList'] = $categoryList;
		$scope['cardList'] = $cardList;
		$scope['redMap'] = $redMap;
		$scope['blueMap'] = $blueMap;

		return View::make('archive', $scope);
	}

	public function getIndex()
	{
		$isLogged = Session::get('pass') == Constants::PASS;

		\View::share('isLogged', $isLogged);

		$categoryList = Category::orderBy('order')->get();

		$cardList = Card::where('mark_id', Mark::RED_MARK_ID)->
			orderBy('date_red')->get();

		$blueMap = array();
		$redMapTmp = array();

		foreach ($cardList as $card) {
			$redMapTmp[$card->category_id][$card->id] = $card;
			if (sizeof($redMapTmp[$card->category_id]) == Constants::RED_STEP) {
				$blueMap[$card->category_id][] = $card->date_red;
				unset($redMapTmp[$card->category_id]);
			}
		}

		$cardList = Card::orderBy('created_at')->get();

		$redMapTmp = array();
		$redMap = array();

		foreach ($cardList as $card) {
			if ($card->mark_id == Mark::RED_MARK_ID) {
				$redMapTmp[$card->category_id][$card->id] = $card;
				if (sizeof($redMapTmp[$card->category_id]) == Constants::RED_STEP) {
					foreach ($redMapTmp[$card->category_id] as $id => $card) {
						$redMap[$id] = $card;
					}
					unset($redMapTmp[$card->category_id]);
				}
			}
		}

		$scope['categoryList'] = $categoryList;
		$scope['cardList'] = $cardList;
		$scope['redMap'] = $redMap;
		$scope['blueMap'] = $blueMap;

		return View::make('home', $scope);
	}

}
