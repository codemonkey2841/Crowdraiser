<?php
class ElggProject extends ElggObject {

	/**
	 * Set subtype to crowdraiser.
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = "crowdraiser";
	}

} // end of ElggProject class
