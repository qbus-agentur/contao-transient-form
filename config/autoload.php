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
	'Contao\\FormFieldModel'                  => 'system/modules/transient_form/models/FormFieldModel.php',
	'Qbus\\TransientForm\\TransientFormModel' => 'system/modules/transient_form/models/TransientFormModel.php',
));
