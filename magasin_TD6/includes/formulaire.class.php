<?php class Formulaire
{

    public function inputText($name, $label = "")
    {
        return "<div class='form-elt'>
                    <label>
                        <span>$label</span><input type='text' name='$name' value='' class='texte'>
                    </label>
                </div>";
    }

    public function submit($name){
        return "<button class='valid' name='$name'>Valider</button>";
    }
}
