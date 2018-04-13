<?php 
/**
 * Form Validation
 */
class DForm
{
    public $currentValue;
    public $values = array();
    public $errors = array();
    public function __construct()
    {
    }

    public function post($key=null)
    {
        $this->values[$key] = trim($_POST[$key]);
        $this->currentValue = $key;
        return $this;
    }

    public function isEpmty()
    {
        if (empty($this->values[$this->currentValue])) {
            $this->errors[$this->currentValue]['empty'] = "Field must not be empty";
        }
        return $this;
    }
    public function isCatEpmty()
    {
        if ($this->values[$this->currentValue] == 0) {
            $this->errors[$this->currentValue]['empty'] = "Field must not be empty";
        }
        return $this;
    }

    public function length($min=0, $max)
    {
        if (strlen($this->values[$this->currentValue]) < $min or strlen($this->values[$this->currentValue]) > $max) {
            $this->errors[$this->currentValue]['length'] = "Should Min ".$min." And Max ".$max." Characters";
        }
        return $this;
    }

    public function submit()
    {
        if (empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }
}
