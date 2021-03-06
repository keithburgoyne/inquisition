<?php

require_once 'SwatDB/SwatDBDataObject.php';
require_once 'SwatDB/SwatDBClassMap.php';
require_once 'Inquisition/dataobjects/InquisitionResponse.php';
require_once 'Inquisition/dataobjects/InquisitionQuestionOption.php';
require_once 'Inquisition/dataobjects/InquisitionInquisitionQuestionBinding.php';

/**
 * A inquisition reponse value
 *
 * @package   Inquisition
 * @copyright 2011-2015 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class InquisitionResponseValue extends SwatDBDataObject
{
	// {{{ public properties

	/**
	 * @var integer
	 */
	public $id;

	/**
	 * @var integer
	 */
	public $numeric_value;

	/**
	 * @var string
	 */
	public $text_value;

	// }}}
	// {{{ protected function init()

	protected function init()
	{
		$this->table = 'InquisitionResponseValue';
		$this->id_field = 'integer:id';

		$this->registerInternalProperty('response',
			SwatDBClassMap::get('InquisitionResponse'));

		$this->registerInternalProperty('question_option',
			SwatDBClassMap::get('InquisitionQuestionOption'));

		$this->registerInternalProperty('question_binding',
			SwatDBClassMap::get('InquisitionInquisitionQuestionBinding'));
	}

	// }}}
}

?>
