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
 * TODO
 */
class CompileFormFields
{

	/*
	 * TODO
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
