<?php

/**
 * Contao Open Source CMS
 *
 * Transient Form Extension by Qbus
 *
 * @copyright  Qbus
 * @author     Alex Wuttke <alw@qbus.de>
 * @license    LGPL-3.0+
 */

namespace Qbus\TransientForm;

use Qbus\TransientModel\TransientModelTrait;

class TransientFormModel extends \FormModel
{
	use TransientModelTrait;

	/**
	 * Form field IDs
	 * @var array
	 */
	protected $arrFormFields = array();

	public function getFormFields() {
		return $this->arrFormFields;
	}

	public function addFormFields($arrFormFields) {
		$this->arrFormFields = array_merge($this->arrFormFields, $arrFormFields);
	}

	public function setFormFields($arrFormFields) {
		$this->arrFormFields = $arrFormFields;
	}

}
