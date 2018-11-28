<?php

/**
 * Contao Open Source CMS
 *
 * Qbus Contact Extension (QbContact)
 *
 * @copyright  Qbus
 * @author  Alex Wuttke <alw@qbus.de>
 * @license LGPL-3.0+
 */

namespace Qbus\TransientForm\Hooks;

use Qbus\TransientForm\TransientFormModel;
use Qbus\TransientForm\TransientFormFieldModel;

/*
 * Add form fields to a transient form during form generation
 */
class CompileFormFields
{

	/*
	 * Get transient form fields that belong to the form and add them to
	 * $arrFields
	 *
	 * @param array       $arrFields The form's fields (model objects)
	 * @param string      $formId    The form ID
	 * @param Contao\Form $objForm   The form object
	 *
	 * @return array The form's fields with transient form fields added
	 */
	function getTransientFormFields($arrFields, $formId, $objForm) {
		$objFormModel = $objForm->getModel();
		$objFields = TransientFormFieldModel::findTransientByPid($objFormModel->id);

		// Do it exactly the way the core does
		if ($objFields !== null) {
			while ($objFields->next()) {
				// Ignore the name of form fields which do not use a name
				// (see contao/core-bundle #1268)
				if (
					$objFields->name != ''
					&& isset($GLOBALS['TL_DCA']['tl_form_field']['palettes'][$objFields->type])
					&& preg_match('/[,;]name[,;]/', $GLOBALS['TL_DCA']['tl_form_field']['palettes'][$objFields->type])
				) {
					$arrFields[$objFields->name] = $objFields->current();
				}
				else {
					$arrFields[] = $objFields->current();
				}
			}
		}

		return $arrFields;
	}

}
