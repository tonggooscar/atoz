<?php

namespace App\Helpers;

class Helper {

    public static function random_strings($length_of_string) {
		// sha1 the timstamps and returns substring 
		// of specified length 
		return substr(sha1(time()), 0, $length_of_string); 
	} 
}
