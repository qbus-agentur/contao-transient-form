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

namespace Contao;

use Qbus\TransientModel\TransientModelTrait;
use Qbus\TransientForm\TransientFormModel;

class FormFieldModel extends \Model
{
	use TransientModelTrait;

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_form_field';

	public static function findPublishedByPid($intPid, array $arrOptions=array())
	{
		if (!empty($arrOptions))
		{
			$blnHasOptions = true;
		}

		$t = static::$strTable;
		$arrColumns = array("$t.pid=?");

		if (!BE_USER_LOGGED_IN)
		{
			$arrColumns[] = "$t.invisible=''";
		}

		if (!isset($arrOptions['order']))
		{
			$arrOptions['order'] = "$t.sorting";
		}

		$objFormFieldCollection = static::findBy($arrColumns, $intPid, $arrOptions);

		if ($objFormFieldCollection !== null)
		{
			return $objFormFieldCollection;
		}

		$objRegistry = Model\Registry::getInstance();
		$objForm = $objRegistry->fetch(TransientFormModel::getTable(), $intPid);

		if (!$objForm instanceof TransientFormModel)
		{
			return null;
		}

		if ($blnHasOptions)
		{
			trigger_error('Setting options is not supported for transient forms.', E_USER_WARNING);
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

		return new Model\Collection($arrFormFieldObjects, static::$strTable);
	}

}
