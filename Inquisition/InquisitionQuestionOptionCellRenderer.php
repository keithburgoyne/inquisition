<?php

require_once 'Swat/SwatTextCellRenderer.php';

/**
 * @package   Inquisition
 * @copyright 2011-2015 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class InquisitionQuestionOptionCellRenderer extends SwatTextCellRenderer
{
	// {{{ public properties

	/**
	 * @var boolean
	 */
	public $correct = false;

	// }}}
	// {{{ public function render()

	public function render()
	{
		if (!$this->visible)
			return;

		$span = new SwatHtmlTag('span');
		$span->class = 'inquisition-question-option';

		if ($this->correct)
			$span->class.= ' inquisition-question-option-correct';

		$span->open();
		parent::render();
		$span->close();
	}

	// }}}
}

?>
