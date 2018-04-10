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


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Models
	'Qbus\\TransientForm\\TransientFormFieldModel'  => 'system/modules/transient_form/models/TransientFormFieldModel.php',
	'Qbus\\TransientForm\\TransientFormModel'       => 'system/modules/transient_form/models/TransientFormModel.php',
	// Library
	'Qbus\\TransientForm\\Hooks\\CompileFormFields' => 'system/modules/transient_form/library/TransientForm/Hooks/CompileFormFields.php',
));
