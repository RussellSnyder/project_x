<?php
    class Utilities_SanitizeData {

    	function positiveNumber($inputNumber) {
    		if (is_numeric($inputNumber) && $inputNumber >= 0) {
    			return $inputNumber;
    		} else {
    			trigger_error('Sorry, '.$inputNumber.' is a negative number');
    		}
    	}

        function string($string) {
            if (is_string($string)) {
                return $string;
            } else {
                return (string)$string;
            }
        }

	    function basic($data) {
	      $data = trim($data);
	      $data = stripslashes($data);
	      $data = htmlspecialchars($data);
	      return $data;
	    }

	}
?>