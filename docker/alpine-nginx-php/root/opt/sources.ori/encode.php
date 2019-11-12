<?php


if(isset($_POST['code']) and isset($_POST['function'])){

	$func_id = $_POST['function'];
	$text = "".$_POST['code'];
	//echo "hello";
	echo func_output($func_id, $text);
}


function func_output($func_id, $plain_text){

	switch ($func_id){
	case 0:
		return strrev($plain_text);
	case 1:
                return base64_encode($plain_text);
        case 2:
                return hash("snefru",$plain_text);
        case 3:
                return md5($plain_text);
	case 4:
                return str_rot13($plain_text);
        case 5:
                return sha1($plain_text);
        case 6:
                return hash("md4",$plain_text);
	case 7:
                return hash("md2",$plain_text);
        case 8:
                return hash("ripemd160",$plain_text);
	case 9:
                return hash("haval128,3",$plain_text);
	case 10:
                return hash("sha256",$plain_text);
	case 11:
                return hash("gost",$plain_text);
 	case 12:
                return hash("whirlpool",$plain_text);
	case 13:
		return stringToBinary($plain_text);
        case 14:
                return bin2hex($plain_text);
        case 15:
		return hex2bin($plain_text);
        default:
                return "unsuported" ;
        }
}


function stringToBinary($string)
{
    $characters = str_split($string);

    $binary = [];
    foreach ($characters as $character) {
        $data = unpack('H*', $character);
        $binary[] = base_convert($data[1], 16, 2);
    }

    return implode(' ', $binary);
}


function binaryToString($binary)
{
    $binaries = explode(' ', $binary);

    $string = null;
    foreach ($binaries as $binary) {
        $string .= pack('H*', dechex(bindec($binary)));
    }

    return $string;
}




?>
