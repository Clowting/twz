<?php

    include_once '../lib/requireAuth.php';

	function isAdmin($user) {
		return $user['rank'] == 'admin';
	}

    function isUser($user) {
        return $user['rank'] == 'user';
    }

    function hasSession() {
        return (isset($_COOKIE[$config->cookie_name]) && $auth->checkSession($_COOKIE[$config->cookie_name]));
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

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return 'Tw2' . implode($pass); //turn the array into a string
    }
    
    