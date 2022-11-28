<?php

namespace Drupal\events_news\Controller;

class EventsNewsController {

	public function home() {

		return array(
			'#title' => 'Hello World!',
			'#markup' => 'Content for Hello World.'
		);
	}
}