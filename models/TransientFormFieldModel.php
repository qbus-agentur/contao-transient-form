<?php

/**
 * Contao Open Source CMS
 *
 * Transient Form Extension by Qbus
 *
 * @package    transient_form
 * @copyright  Qbus 2017
 * @author     Alex Wuttke <alw@qbus.de>
 * @license    LGPL-3.0+
 */

namespace Qbus\TransientForm;

use Contao\Model\Registry;
use Contao\Model\Collection;
use Qbus\TransientModel\TransientModelTrait;
use Qbus\TransientForm\TransientFormModel;

/**
 * FormFieldModels without database persistence
 */
class TransientFormFieldModel extends \Model
{
	use TransientModelTrait;

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_form_field';

	/**
	 * Retrieve form fields that belong to a form by that form's ID
	 *
	 * @param int $intPid Parent form ID
	 *
	 * @return Model\Collection Collection of form field model objects
	 */
	public static function findTransientByPid($intPid) {
		$objRegistry = Registry::getInstance();
		$objForm = $objRegistry->fetch(TransientFormModel::getTable(), $intPid);

		if (!$objForm instanceof TransientFormModel)
		{
			return null;
		}

		$arrFormFields = $objForm->getFormFields();

		if (empty($arrFormFields))
		{
			return null;
		}

		$arrFormFieldObjects = array();
		foreach ($arrFormFields as $intFormFieldId) {
			$objFormField = $objRegistry->fetch(static::$strTable, $intFormFieldId);
			if ($objFormField !== null) {
				$arrFormFieldObjects[] = $objFormField;
			}
		}

		return new Collection($arrFormFieldObjects, static::$strTable);
	}

}
