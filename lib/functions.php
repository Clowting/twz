<?php

	function isAdmin($user) {
		return $user['rank'] == 'admin';
	}

    function isUser($user) {
        return $user['rank'] == 'user';
    }

    function hasSession($config, $auth) {
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
		return preg_replace("/[^[:alnum:][:space:].,?!-:]/ui", '', $input);
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

    // Function for filling in the value of a text field
    function getTextFieldValue($field) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST[$field])) {
                echo 'value="' . $_POST[$field] . '"';
            }
        }
    }
    // Function for filling in the value of a text area
    function getTextAreaValue($field) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST[$field])) {
                echo $_POST[$field];
            }
        }
    }

    function getBeschikbaarheidChecked($dataManager, $surveillantID, $datum, $dagdeel) {

        $dataManager->where('SurveillantID', $surveillantID);
        $dataManager->where('Datum', $datum);
        $dataManager->where($dagdeel, 1);

        $result = $dataManager->getOne('Beschikbaarheid');

        if(count($result) > 0) {
            echo 'checked';
        }

    }

    function checkUser($dataManager, $user, $id) {
        if($user['rank'] != 'admin') {
            $dataManager->where('ID', $id);
            $dataManager->where('GebruikerID', $user['id']);
            $result = $dataManager->getOne('Surveillant');

            if(count($result) > 0) {
                return true;
            } else {
                return false;
            }

        } else {
            return true;
        }
    }

    function convertDayToNumber($day) {

        switch($day) {
            case 'Mon':
                return 1;
                break;
            case 'Tue':
                return 2;
                break;
            case 'Wed':
                return 3;
                break;
            case 'Thu':
                return 4;
                break;
            case 'Fri':
                return 5;
                break;
            default:
                return false;
                break;
        }
    }
    
    