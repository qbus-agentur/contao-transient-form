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

$GLOBALS['TL_HOOKS']['compileFormFields'][] = [
	\Qbus\TransientForm\Hooks\CompileFormFields::class,
	'getTransientFormFields'
];
