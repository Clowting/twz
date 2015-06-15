<?php

	function isAdmin($roles) {
		return in_array('administrator', $roles);
	}
	
	function isSurveillant($roles) {
		return in_array('lid', $roles);
	}

	function toTimestamp($value) {
		$date = DateTime::createFromFormat('Ymd', $value);

        return $date->getTimestamp();
	}

    function toDate($timestamp) {
        return date("d-m-Y", $timestamp);
    }

    function generateName($voornaam, $tussenvoegel, $achternaam) {
        if(!empty($tussenvoegel)) {
            return $tussenvoegel . ' ' . $achternaam . ', ' . $voornaam;
        } else {
            return $achternaam . ', ' . $voornaam;
        }
    }

	function cleanInput($input) {
		return preg_replace("/[^[:alnum:][:space:].,?!]/ui", '', $input);
	}

	function validateInput($input, $min, $max) {
		if(isset($input) && !empty($input)) {
			if((strlen($input) >= $min) && (strlen($input) <= $max)) {
				return true;
			}
		}
		return false;
	}

	function validateNumber($input, $min, $max) {
        $input = preg_replace("/,/ui", '.', $input);
		if(isset($input) && !empty($input)) {
			if (($input >= $min) && ($input <= $max) && (($num = filter_var($input, FILTER_VALIDATE_FLOAT)) !== false)) {
			    return true;
			}
		}
		return false;
	}

    function validateDate($date, $format) {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
    