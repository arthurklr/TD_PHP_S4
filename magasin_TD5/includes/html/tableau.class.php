<?php

class Tableau{

    public static function row($data, $tag = "td"){
        $row = "<tr>";
        foreach($data as $value){
            $row .= "<$tag>$value</$tag>";
        }
        return $row.'</tr>';
    }

    public static function head($data=[]){
        if($data){
            return '<table><thead>'.self::row($data, "th").'</thead>';
        } else{
            return '<table>';
        }
    }

    public static function body($data){
        $body = "<tbody>";
        foreach($data as $ligne){
            $body .= self::row($ligne);
        }
        $body .= "</tbody>";
        return $body;
    }

    public static function foot($data=[]){
        if($data){
            return '<tfoot>'.self::row($data, "td").'</tfoot></table>';
        } else{
            return '</table>';
        }
    }
    
}
