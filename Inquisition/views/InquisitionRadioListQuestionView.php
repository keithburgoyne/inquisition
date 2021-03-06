<?php

require_once 'Inquisition/views/InquisitionQuestionView.php';
require_once 'Swat/SwatRadioList.php';

/**
 * Radio list question view
 *
 * @package   Inquisition
 * @copyright 2011-2015 silverorange
 * @license   http://www.gnu.org/copyleft/lesser.html LGPL License 2.1
 */
class InquisitionRadioListQuestionView extends InquisitionQuestionView
{
	// {{{ protected properties

	/**
	 * @var SwatRadioList
	 */
	protected $radio_list;

	// }}}
	// {{{ public function getWidget()

	public function getWidget(InquisitionResponseValue $value = null)
	{
		$binding = $this->question_binding;
		$question = $this->question_binding->question;

		if ($this->radio_list === null) {
			$id = sprintf('question%s_%s', $binding->id, $question->id);

			$this->radio_list = new SwatRadioList($id);
			$this->radio_list->required = $question->required;

			foreach ($question->options as $option)
				$this->radio_list->addOption($option->id, $option->title);
		}

		if ($value !== null) {
			$this->radio_list->value = intval(
				$value->getInternalValue('question_option'));
		}

		return $this->radio_list;
	}

	// }}}
	// {{{ public function getResponseValue()

	public function getResponseValue()
	{
		$value = parent::getResponseValue();
		$value->question_option = $this->radio_list->value;
		return $value;
	}

	// }}}
}

?>
