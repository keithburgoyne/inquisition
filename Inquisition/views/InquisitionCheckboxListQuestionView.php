<?php

require_once 'Inquisition/views/InquisitionQuestionView.php';
require_once 'Swat/SwatCheckboxList.php';

/**
 * Checkbox list question view
 *
 * @package   Inquisition
 * @copyright 2011 silverorange
 */
class InquisitionCheckboxListQuestionView extends InquisitionQuestionView
{
	// {{{ private properties

	private $checkbox_list;

	// }}}
	// {{{ public function getWidget()

	public function getWidget(InquisitionResponseValue $value = null)
	{
		if ($this->checkbox_list === null) {
			$this->checkbox_list =
				new SwatCheckboxList('question'.$this->question->id);

			$this->checkbox_list->required = $this->question->required;
			$this->checkbox_list->show_check_all = false;

			foreach ($this->question->options as $option)
				$this->checkbox_list->addOption($option->id, $option->title);
		}

		if ($value !== null) {
			$this->checkbox_list->value = intval(
				$value->getInternalValue('question_option'));
		}

		return $this->checkbox_list;
	}

	// }}}
	// {{{ public function getResponseValue()

	public function getResponseValue()
	{
		$base_value = parent::getResponseValue();
		$value = array();

		foreach ($this->checkbox_list->values as $list_value) {
			$response_value = clone $base_value;
			$response_value->question_option = $list_value;
			$value[] = $response_value;
		}

		return $value;
	}

	// }}}
}

?>