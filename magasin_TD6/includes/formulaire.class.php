<?php

class Formulaire

{

    private $values;

    public function __construct($data = array())
    {
        $this->values = $data;
    }
    
    private function getValue($key)
    {
        return $this->values[$key] ?? "";
    }

    public function inputText($name, $label = "")
    {
        return "<div class='form_elt'>
                    <label>
                        <span>$label</span><input type='text' name='$name' value='{$this->getValue($name)}' class='texte'>
                    </label>
                </div>";
    }

    public function submit($name)
    {
        return "<button class='valid' name='$name'>Valider</button>";
    }
}
