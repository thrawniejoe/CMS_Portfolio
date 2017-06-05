<?php
class Validation {
    public static function name($name, $nameString) {
        if (Validation::isPresent($name, $nameString) == '') {
            if (Validation::isStartWithAlpha($name, $nameString) == '') {
                return '';
            }
            else {
                return Validation::isStartWithAlpha($name, $nameString);
            }
        }
        else {
            return Validation::isPresent($name, $nameString);
        }
    }
    public static function alias($alias) {
        if (Validation::isPresent($alias, 'Alias') == '') {
            if (Validation::isStartWithAlpha($alias, 'Alias') == '') {
                if (Validation::isWithinRange($alias, 'Alias', 4, 20) == '') {
                    if (ctype_alnum($alias)) {
                        /* checking for alias duplicate */
                        $result = UserDB::checkAlias($alias);
                        if($result->total > 0)
                        {
                            return 'This alias had been used already. Please enter a different alias.';
                        }
                        else {
                            return '';
                        }
                    }
                    else {
                        return 'Alias must be alphanumeric.';
                    }
                }
                else {
                    return Validation::isWithinRange($alias, 'Alias', 4, 20);
                }
            }
            else {
                return Validation::isStartWithAlpha($alias, 'Alias');
            }
        }
        else {
            return Validation::isPresent($alias, 'Alias');
        }
    }
    public static function email($email) {
        if (Validation::isPresent($email, 'Email Address') == '') {
            return '';
        }
        else {
            return Validation::isPresent($email, 'Email Address');
        }
    }
    
    public static function password($password) {        
        if (Validation::isPresent($password, 'Password') == '') {
            if (Validation::isWithinMin($password, 10, 'Password') == '') {
                if (Validation::isUpperLowerDigitSchar($password, 'Password') == '') {
                    if (Validation::isCommonPattern($password, 'Password') == '') {
                        return '';
                    }
                    else {
                        return Validation::isCommonPattern($password, 'Password');
                    }
                } 
                else {
                    return Validation::isUpperLowerDigitSchar($password, 'Password');
                }
            }
            else {
                return Validation::isWithinMin($password, 10, 'Password');
            }
        }
        else {
            return Validation::isPresent($password, 'Password');
        }
    }
    
    public static function isPresent($element, $elementName) {
        $trimmedText = trim($element);
        $tagStrippedText = strip_tags($trimmedText);
        $cleanText = htmlspecialchars($tagStrippedText);
        if ($cleanText == null || $cleanText == "" ) {
            return $elementName . ' is a required field.';
        }
        else {
            return '';
        }
    }
    public static function isStartWithAlpha($element, $elementName) {
        if (!preg_match('/^[a-zA-Z].+$/', $element)) {
                return $elementName . ' must start with an alphabet.';
            }
            else {
                return '';
            }
    }
    public static function isWithinMin($element, $min, $elementName) {
        if (strlen($element) < $min) {
            return $elementName . ' must be a minimum of ' . $min . ' characters';
        }
        else {
            return '';
        }
    }
    public static function isWithinMax($element, $max, $elementName) {
        if (strlen($element) >= $max) {
            return $elementName . ' must be less than ' . $max . ' characters';
        }
        else {
            return '';
        }
    }
    
    public static function isWithinRange($element, $elementName, $min, $max) {
        if (strlen($element) < $min || strlen($element) > $max) {
            return $elementName . ' must be between ' . $min . ' and ' . $max . ' characters';
        }
        else {
            return '';
        }
    }
    public static function isUpperLowerDigitSchar($element, $elementName) {
        $lower = $upper = $digit = $schar = false;
        for ($i = 0; $i < strlen($element); $i++) {
            if (preg_match('/[a-z]/', $element[$i])) {
                $lower = true;
            }
            if (preg_match('/[A-Z]/', $element[$i])) {
                $upper = true;
            }
            if (preg_match('/\d/', $element[$i])) {
                $digit = true;
            }
            if (preg_match('/\W/', $element[$i])) {
                $schar = true;
            }
        }
        
        if (!($lower && $upper && $digit && $schar)) {
            return $elementName . ' must have at least one lower case, one upper case, one digit, and one special character.';
        }
        else {
            return '';
        }
    }
    public static function isCommonPattern($element, $elementName) {
        if (preg_match('/^[a-z]+[A-Z]\d{1,2}\W$/', $element) ||
            preg_match('/^[A-Z][a-z]+\d{1,2}\W$/', $element) ||
            preg_match('/^\d[A-Z][a-z]+\W$/', $element) ||
            preg_match('/^[a-z][A-Z]+\d{1,2}\W$/', $element) ||
            preg_match('/^\W[A-Z][a-z]+\d{1,2}$/', $element) ) {
            return 'Your ' . $elementName . ' has a weak and common pattern. Please see password requirements below.';
        }
        else {
            return '';
        }
    }
}