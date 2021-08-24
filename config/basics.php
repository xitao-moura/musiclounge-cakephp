<?php
/**** I:VALIDAÇÕES ****/

function sanitizeString($str) {
    $str = preg_replace('/[áàãâä]/ui', 'a', $str);
    $str = preg_replace('/[éèêë]/ui', 'e', $str);
    $str = preg_replace('/[íìîï]/ui', 'i', $str);
    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
    $str = preg_replace('/[úùûü]/ui', 'u', $str);
    $str = preg_replace('/[ç]/ui', 'c', $str);
    // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
    $str = preg_replace('/[^a-z0-9]/i', '_', $str);
    $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
    return $str;
}

/**
 * Converte o valor para moeda
 * @param double $valor
 * @param string $moeda
 * @return string
 */
function splitTelefone($tel){
	$ddd_telefone = substr(onlyNumbers($tel), 0, 2);
    $r[0] = $ddd_telefone;
    $telefone = onlyNumbers($tel);
    if(strlen($telefone) == 11){
        $r[1] = substr(onlyNumbers($telefone), 2, 9);
    }else if(strlen($telefone) == 10){
        $r[1] = substr(onlyNumbers($telefone), 2, 8);
    }

    return $r;
}

function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç|Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$string);
}

function listAcoes(){
	return [
		1 => 'Encaminhar',
		2 => 'Deletar'
	];
}

function cMoeda($valor, $moeda = 'R$ ') {
	$r = number_format($valor, 2, ',', '.');
	if($moeda){
		$r = $moeda . $r;
	}
    return $r;
}

/**
 * Desconverte o valor de moeda para double
 * @param string $valor ex.: R$ 12.123.123,00 p/ 12123123.00
 * @return double
 */
function dMoeda($valor) {
    $valor = str_replace('R$', '', $valor);
    $valor = str_replace('.', '', $valor);
    $valor = str_replace(',', '.', $valor);
    return (double) $valor;
}

function onlyNumbers($str){
    return preg_replace('/\D+/', '', $str);
}

function formatarCep($str){
	$str = str_pad($str, 8, "0", STR_PAD_LEFT);
    return substr($str, 0, 5) . '-' . substr($str, 5, 3);
}

function formatarTelefone($str){
    $r = '';
    if($str){
        $r = $str;
        $r = str_replace('-', '', $r);
        if(strlen($str) > 8)
        	$r = substr($r, 0, 5) . '-' . substr($r, 5);
        else
        	$r = substr($r, 0, 4) . '-' . substr($r, 4);
    }
    return $r;
}

function formatarTelefoneCompl($str){
	$str = onlyNumbers($str);
    $r = '';
    if($str){
        $r = $str;
        if(strlen($str) > 10)
        	$r = '(' . substr($r, 0, 2) . ') ' . substr($r, 2, 5) . '-' . substr($r, 7, 4);
        else
        	$r = '(' . substr($r, 0, 2) . ') ' . substr($r, 2, 4) . '-' . substr($r, 6, 4);
    }
    return $r;
}

function formatarTelefoneDdd($str){
    $r = '';
    if($str){
        $r = str_pad($str, 2, "0", STR_PAD_LEFT);
    }
    return $r;
}


function formatarCpfCnpj($campo, $formatado = true){
    //retira formato
    $codigoLimpo = onlyNumbers($campo);

	//o cpf pode começar com zero caso seja de tamanho 10
	if(strlen($codigoLimpo)==10||strlen($codigoLimpo)==9||strlen($codigoLimpo)==8)
		$codigoLimpo = str_pad($codigoLimpo, 11, "0", STR_PAD_LEFT);

	//o cnpj pode começar com zero caso seja de tamanho 13
	if(strlen($codigoLimpo)==13||strlen($codigoLimpo)==12)
		$codigoLimpo = str_pad($codigoLimpo, 14, "0", STR_PAD_LEFT);

    // pega o tamanho da string menos os digitos verificadores
    $tamanho = (strlen($codigoLimpo) -2);

    //verifica se o tamanho do código informado é válido
    if ($tamanho != 9 && $tamanho != 12){
        return false;
    }

    if ($formatado){
        // seleciona a máscara para cpf ou cnpj
        $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';

        $indice = -1;
        for ($i=0; $i < strlen($mascara); $i++) {
            if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
        }
        //retorna o campo formatado
        $retorno = $mascara;

    }else{
        //se não quer formatado, retorna o campo limpo
        $retorno = $codigoLimpo;
    }

    return $retorno;

}


function formatarCnpj($campo, $formatado = true){
    //retira formato
    $codigoLimpo = onlyNumbers($campo);


	$codigoLimpo = str_pad($codigoLimpo, 14, "0", STR_PAD_LEFT);


    if ($formatado){
        // seleciona a máscara para cpf ou cnpj
        $mascara = '##.###.###/####-##';

        $indice = -1;
        for ($i=0; $i < strlen($mascara); $i++) {
            if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
        }
        //retorna o campo formatado
        $retorno = $mascara;

    }else{
        //se não quer formatado, retorna o campo limpo
        $retorno = $codigoLimpo;
    }

    return $retorno;

}


function isCpfValido($cpf) {

	$nulos = array("12345678909","11111111111","22222222222","33333333333",
								 "44444444444","55555555555","66666666666","77777777777",
								 "88888888888","99999999999","00000000000");

	$cpf = onlyNumbers($cpf);
	/* Retorna falso se o cpf for nulo */
	foreach ( $nulos as $key => $nulo ) {
		if($cpf == $nulo){
			return 0;
		}
	}

	/*Calcula o penúltimo dígito verificador*/
	$acum=0;
	for($i=0; $i<9; $i++) {
		@$acum+= $cpf[$i]*(10-$i);
	}

	$x=$acum % 11;
	$acum = ($x>1) ? (11 - $x) : 0;

	/* Retorna falso se o digito calculado é diferente do passado na string */
	if(isset($cpf[9])){
		if ($acum != $cpf[9]){
			return 0;
		}
	} else {
		return false;
	}

	/*Calcula o último dígito verificador*/
	$acum=0;
	for ($i=0; $i<10; $i++){
		@$acum+= $cpf[$i]*(11-$i);
	}

	$x=$acum % 11;
	$acum = ($x > 1) ? (11-$x) : 0;

	/* Retorna falso se o digito calculado é diferente do passado na string */
	if(isset($cpf[10])) {
		if ($acum != $cpf[10]){
			return 0;
		}
	} else { return false; }

	/* Retorna verdadeiro se o cpf é valido */
	return true;
}

function isCnpjValido($cnpj) {

	$RecebeCNPJ = onlyNumbers($cnpj);
	if (strlen($RecebeCNPJ) != 14) {
		return false;
	} else if ($RecebeCNPJ == "00000000000000") {
		$then;
		return false;
	} else {
		$Numero[1] = intval(substr($RecebeCNPJ, 1-1, 1));
		$Numero[2] = intval(substr($RecebeCNPJ, 2-1, 1));
		$Numero[3] = intval(substr($RecebeCNPJ, 3-1, 1));
		$Numero[4] = intval(substr($RecebeCNPJ, 4-1, 1));
		$Numero[5] = intval(substr($RecebeCNPJ, 5-1, 1));
		$Numero[6] = intval(substr($RecebeCNPJ, 6-1, 1));
		$Numero[7] = intval(substr($RecebeCNPJ, 7-1, 1));
		$Numero[8] = intval(substr($RecebeCNPJ, 8-1, 1));
		$Numero[9] = intval(substr($RecebeCNPJ, 9-1, 1));
		$Numero[10] = intval(substr($RecebeCNPJ, 10-1, 1));
		$Numero[11] = intval(substr($RecebeCNPJ, 11-1, 1));
		$Numero[12] = intval(substr($RecebeCNPJ, 12-1, 1));
		$Numero[13] = intval(substr($RecebeCNPJ, 13-1, 1));
		$Numero[14] = intval(substr($RecebeCNPJ, 14-1, 1));
		$soma = $Numero[1]*5+$Numero[2]*4+$Numero[3]*3+$Numero[4]*2+$Numero[5]*9+$Numero[6]*8+$Numero[7]*7+$Numero[8]*6+$Numero[9]*5+$Numero[10]*4+$Numero[11]*3+$Numero[12]*2;
		$soma = $soma-(11*(intval($soma/11)));
		if ($soma == 0 || $soma == 1) {
			$resultado1 = 0;
		} else {
			$resultado1 = 11-$soma;
		}

		if ($resultado1 == $Numero[13]) {
			$soma = $Numero[1]*6+$Numero[2]*5+$Numero[3]*4+$Numero[4]*3+$Numero[5]*2+$Numero[6]*9+$Numero[7]*8+$Numero[8]*7+$Numero[9]*6+$Numero[10]*5+$Numero[11]*4+$Numero[12]*3+$Numero[13]*2;
			$soma = $soma-(11*(intval($soma/11)));
			if ($soma == 0 || $soma == 1) {
				$resultado2 = 0;
			} else {
				$resultado2 = 11-$soma;
			}
			if ($resultado2 == $Numero[14]) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}


/**** F:VALIDAÇÕES ****/


function dateFormatBeforeSave($stData){
	$aDateHora = explode(' ', $stData);
	$aDate = explode('/', $aDateHora[0]);
	$aDatePart = null;
	if(isset($aDateHora[1])){
		$aHora = explode(':', $aDateHora[1]);
		$aDatePart = array_merge($aDate, $aHora);
	} else {
		$aDatePart = $aDate;
	}
	$s = null;

	//Caso tenha sido informada uma data
	if(isset($aDatePart[2]) && isset($aDatePart[1]) && isset($aDatePart[0])){

		if(checkdate($aDatePart[1], $aDatePart[0], $aDatePart[2])){
			$s = "{$aDatePart[2]}-{$aDatePart[1]}-{$aDatePart[0]}";
		}

	}

	//Caso tenha horas e minutos
	if(isset($aDatePart[3]) && isset($aDatePart[4]))
		$s .= " {$aDatePart[3]}:{$aDatePart[4]}";

	//Caso tenha segundos
	if(isset($aDatePart[5]))
		$s .= ":{$aDatePart[5]}";

	//Caso a data seja inválida, retorna nulo


	return $s;
}


function dateFormatAfterFind($stData){
	$aDateHora = explode(' ', $stData);
	$aDate = explode('-', $aDateHora[0]);
	$aDatePart = null;
	if(isset($aDateHora[1])){
		$aHora = explode(':', $aDateHora[1]);
		$aDatePart = array_merge($aDate, $aHora);
	} else {
		$aDatePart = $aDate;
	}

	$s = null;

	//Caso tenha sido informada uma data
	if(isset($aDatePart[2]) && isset($aDatePart[1]) && isset($aDatePart[0]))
		$s = "{$aDatePart[2]}/{$aDatePart[1]}/{$aDatePart[0]}";

	//Caso tenha horas e minutos
	if(isset($aDatePart[3]) && isset($aDatePart[4]))
		$s .= " {$aDatePart[3]}:{$aDatePart[4]}";

	//Caso tenha segundos
	if(isset($aDatePart[5]))
		$s .= ":{$aDatePart[5]}";

	return $s;
}

/**
 *  Check if input string is a valid YouTube URL
 *  and try to extract the YouTube Video ID from it.
 *  @author  Stephan Schmitz <eyecatchup@gmail.com>
 *  @param   $url   string   The string that shall be checked.
 *  @return  mixed           Returns YouTube Video ID, or (boolean) false.
 */
function parse_yturl($url){
		$pattern = '#^(?:https?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=|/watch\?.+&v=))([\w-]{11})(?:.+)?$#x';
	preg_match($pattern, $url, $matches);
	return (isset($matches[1])) ? $matches[1] : false;
} // Fim parse_yturl.

function parse_ytauthor($url){
	$urlCanal	  = parse_url($url);
	$aryUrlTermos = explode('/', $urlCanal['path']);
	$nomeCanal    = end($aryUrlTermos);
	return $nomeCanal;
} // Fim parse_ytauthor.



// Define uma função que poderá ser usada para validar e-mails usando regexp
function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";

	$pattern = $conta.$domino.$extensao;

	if (ereg($pattern, $email))
		return true;
	else
		return false;
}

/**
 *
 * @create a roman numeral from a number
 *
 * @param int $num
 *
 * @return string
 *
 */
function romanNumerals($num)
{
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
                'M'  => 1000,
                'CM' => 900,
                'D'  => 500,
                'CD' => 400,
                'C'  => 100,
                'XC' => 90,
                'L'  => 50,
                'XL' => 40,
                'X'  => 10,
                'IX' => 9,
                'V'  => 5,
                'IV' => 4,
                'I'  => 1);

    foreach ($roman_numerals as $roman => $number)
    {
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}

function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds'){
	$sets = array();
	if(strpos($available_sets, 'l') !== false)
		$sets[] = 'abcdefghjkmnpqrstuvwxyz';
	if(strpos($available_sets, 'u') !== false)
		$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
	if(strpos($available_sets, 'd') !== false)
		$sets[] = '23456789';
	if(strpos($available_sets, 's') !== false)
		$sets[] = '!@#$%&*?';

	$all = '';
	$password = '';
	foreach($sets as $set)
	{
		$password .= $set[array_rand(str_split($set))];
		$all .= $set;
	}

	$all = str_split($all);
	for($i = 0; $i < $length - count($sets); $i++)
		$password .= $all[array_rand($all)];

	$password = str_shuffle($password);

	if(!$add_dashes)
		return $password;

	$dash_len = floor(sqrt($length));
	$dash_str = '';
	while(strlen($password) > $dash_len)
	{
		$dash_str .= substr($password, 0, $dash_len) . '-';
		$password = substr($password, $dash_len);
	}
	$dash_str .= $password;
	return $dash_str;
}



function safe_mailto($email, $title = '', $attributes = '')
{
	$title = (string) $title;

	if ($title == "")
	{
		$title = $email;
	}

	for ($i = 0; $i < 16; $i++)
	{
		$x[] = substr('<a href="mailto:', $i, 1);
	}

	for ($i = 0; $i < strlen($email); $i++)
	{
		$x[] = "|".ord(substr($email, $i, 1));
	}

	$x[] = '"';

	if ($attributes != '')
	{
		if (is_array($attributes))
		{
			foreach ($attributes as $key => $val)
			{
				$x[] =  ' '.$key.'="';
				for ($i = 0; $i < strlen($val); $i++)
				{
					$x[] = "|".ord(substr($val, $i, 1));
				}
				$x[] = '"';
			}
		}
		else
		{
			for ($i = 0; $i < strlen($attributes); $i++)
			{
				$x[] = substr($attributes, $i, 1);
			}
		}
	}

	$x[] = '>';

	$temp = array();
	for ($i = 0; $i < strlen($title); $i++)
	{
		$ordinal = ord($title[$i]);

		if ($ordinal < 128)
		{
			$x[] = "|".$ordinal;
		}
		else
		{
			if (count($temp) == 0)
			{
				$count = ($ordinal < 224) ? 2 : 3;
			}

			$temp[] = $ordinal;
			if (count($temp) == $count)
			{
				$number = ($count == 3) ? (($temp['0'] % 16) * 4096) + (($temp['1'] % 64) * 64) + ($temp['2'] % 64) : (($temp['0'] % 32) * 64) + ($temp['1'] % 64);
				$x[] = "|".$number;
				$count = 1;
				$temp = array();
			}
		}
	}

	$x[] = '<'; $x[] = '/'; $x[] = 'a'; $x[] = '>';

	$x = array_reverse($x);
	ob_start();

?><script type="text/javascript">
//<![CDATA[
var l=new Array();
<?php
$i = 0;
foreach ($x as $val){ ?>l[<?php echo $i++; ?>]='<?php echo $val; ?>';<?php } ?>

for (var i = l.length-1; i >= 0; i=i-1){
if (l[i].substring(0, 1) == '|') document.write("&#"+unescape(l[i].substring(1))+";");
else document.write(unescape(l[i]));}
//]]>
</script><?php

	$buffer = ob_get_contents();
	ob_end_clean();
	return $buffer;
}




function execInBackground($cmd) {
	if (substr(php_uname(), 0, 7) == "Windows"){
		pclose(popen("start /B ". $cmd, "r"));
	}
	else {
		exec($cmd . " > /dev/null &");
	}
}

/**
 * Converte um array para CSV
 * @param  array  $array
 * @return string
 */
function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)), ';');
   foreach ($array as $row) {
      fputcsv($df, $row, ';');
   }
   fclose($df);
   return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}


function gerarBusca($busca, $campos){
	$conditions_busca = array();
	$palavras = explode(' ', $busca);

	//Campos
	foreach ($campos as $camposk => $campo) {
		$conditions_busca['OR'][$camposk] = array();
		//palavras
		foreach ($palavras as $palavrak => $palavra) {
			$conditions_busca['OR'][$camposk]['AND'][] = array(
				"{$campo} LIKE " => "%{$palavra}%",
			);
		}
	}
	return $conditions_busca;
}

// download_send_headers("data_export_" . date("Y-m-d") . ".csv");
// echo array2csv($array);
// die();
//

if (!function_exists('http_response_code')) {
    function http_response_code($code = NULL) {

        if ($code !== NULL) {

            switch ($code) {
                case 100: $text = 'Continue'; break;
                case 101: $text = 'Switching Protocols'; break;
                case 200: $text = 'OK'; break;
                case 201: $text = 'Created'; break;
                case 202: $text = 'Accepted'; break;
                case 203: $text = 'Non-Authoritative Information'; break;
                case 204: $text = 'No Content'; break;
                case 205: $text = 'Reset Content'; break;
                case 206: $text = 'Partial Content'; break;
                case 300: $text = 'Multiple Choices'; break;
                case 301: $text = 'Moved Permanently'; break;
                case 302: $text = 'Moved Temporarily'; break;
                case 303: $text = 'See Other'; break;
                case 304: $text = 'Not Modified'; break;
                case 305: $text = 'Use Proxy'; break;
                case 400: $text = 'Bad Request'; break;
                case 401: $text = 'Unauthorized'; break;
                case 402: $text = 'Payment Required'; break;
                case 403: $text = 'Forbidden'; break;
                case 404: $text = 'Not Found'; break;
                case 405: $text = 'Method Not Allowed'; break;
                case 406: $text = 'Not Acceptable'; break;
                case 407: $text = 'Proxy Authentication Required'; break;
                case 408: $text = 'Request Time-out'; break;
                case 409: $text = 'Conflict'; break;
                case 410: $text = 'Gone'; break;
                case 411: $text = 'Length Required'; break;
                case 412: $text = 'Precondition Failed'; break;
                case 413: $text = 'Request Entity Too Large'; break;
                case 414: $text = 'Request-URI Too Large'; break;
                case 415: $text = 'Unsupported Media Type'; break;
                case 500: $text = 'Internal Server Error'; break;
                case 501: $text = 'Not Implemented'; break;
                case 502: $text = 'Bad Gateway'; break;
                case 503: $text = 'Service Unavailable'; break;
                case 504: $text = 'Gateway Time-out'; break;
                case 505: $text = 'HTTP Version not supported'; break;
                default:
                    exit('Unknown http status code "' . htmlentities($code) . '"');
                break;
            }

            $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

            header($protocol . ' ' . $code . ' ' . $text);

            $GLOBALS['http_response_code'] = $code;

        } else {

            $code = (isset($GLOBALS['http_response_code']) ? $GLOBALS['http_response_code'] : 200);

        }

        return $code;

    }
}

function ucname($string) {
    $string =ucwords(mb_strtolower($string));

    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string =implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }
    return $string;
}

/**
 *
 * <style type="text/css">
 *
 * .logo {
 *     background: url("<?php echo base64_encode_image ('img/logo.png','png'); ?>") no-repeat right 5px;
 * }
 * </style>
 *
 * or
 *
 * <img src="<?php echo base64_encode_image ('img/logo.png','png'); ?>"/>
 *
 * @param  string $filename
 * @param  string $filetype
 * @return string
 */
function base64_encode_image($filename=string,$filetype=string) {
    if ($filename) {
        $imgbinary = fread(fopen($filename, "r"), filesize($filename));
        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
    }
}

/**
 * $result = getJsonGoogleCaptcha('6LcSlBYTAAAAACM1a2clpdg1k7Pa9hPO8lHq5bKP', $_POST['g-recaptcha-response']);
 *		var_dump($result);
 *		echo $result->success;
 * @param  [type] $secret             [description]
 * @param  [type] $gRecaptchaResponse [description]
 * @return [type]                     [description]
 */
function getJsonGoogleCaptcha($secret, $gRecaptchaResponse){
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	    $ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
	    $ip = $_SERVER['REMOTE_ADDR'];
	}
	$url = 'https://www.google.com/recaptcha/api/siteverify';
	$data = array('secret' => $secret, 'response' => $gRecaptchaResponse, 'remoteip' => $ip);
	$options = array(
	    'http' => array(
	        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
	        'method'  => 'POST',
	        'content' => http_build_query($data),
	    ),
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$r = false;
	if ($result === FALSE) {
		$r = $result;
	}
	return json_decode($result);
}
