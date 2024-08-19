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

use Contao\FormModel;
use Qbus\TransientModel\TransientModelTrait;

/**
 * FormModels without database persistence
 */
class TransientFormModel extends FormModel
{
	use TransientModelTrait;

	/**
	 * Form field IDs
	 * @var array
	 */
	protected $arrFormFields = array();

	/**
	 * Retrieve this form's form fields
	 *
	 * @return array Form field model IDs
	 */
	public function getFormFields() {
		return $this->arrFormFields;
	}

	/**
	 * Add form fields to the form
	 *
	 * @param array $arrFormFields Form field model IDs
	 */
	public function addFormFields($arrFormFields) {
		$this->arrFormFields = array_merge($this->arrFormFields, $arrFormFields);
	}

	/**
	 * Set this form's form fields, overwriting existing ones
	 *
	 * @param array $arrFormFields Form field model IDs
	 */
	public function setFormFields($arrFormFields) {
		$this->arrFormFields = $arrFormFields;
	}

}
