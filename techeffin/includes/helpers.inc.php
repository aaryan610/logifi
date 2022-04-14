<?php
	if (get_magic_quotes_gpc())
	{
		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
		while (list($key, $val) = each($process))
		{
			foreach ($val as $k => $v)
			{
				unset($process[$key][$k]);
				if (is_array($v))
				{
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				}
				else
				{
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
		unset($process);
	}

	function html($text)
	{
		return htmlspecialchars($text,ENT_QUOTES,'UTF-8');
	}

	function htmlout($text)
	{
		echo html($text);
	}

	function htmlurl($string) {
   	$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   	$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   	echo preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
	}

	function discount($mrp,$you_get)
	{
		$price = (($mrp - $you_get)/$mrp)*100;
		return round($price);
	}

	function markdown2html($text)
	{
	  $text = html($text);

	  // strong emphasis
	  $text = preg_replace('/__(.+?)__/s', '<strong>$1</strong>', $text);
	  $text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);

	  // emphasis
	  $text = preg_replace('/_([^_]+)_/', '<em>$1</em>', $text);
	  $text = preg_replace('/\*([^\*]+)\*/', '<em>$1</em>', $text);

	  // Convert Windows (\r\n) to Unix (\n)
	  $text = str_replace("\r\n", "\n", $text);
	  // Convert Macintosh (\r) to Unix (\n)
	  $text = str_replace("\r", "\n", $text);

	  // Paragraphs
	  $text = '<p>' . str_replace("\n\n", '</p><p>', $text) . '</p>';
	  // Line breaks
	  $text = str_replace("\n", '<br>', $text);

	  // [linked text](link URL)
	  $text = preg_replace(
		  '/\[([^\]]+)]\(([-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)\)/i',
		  '<a href="$2">$1</a>', $text);

	  return $text;
	}

	function markdownout($text)
	{
	  echo markdown2html($text);
	}

	function getIndianCurrency(float $number)
	{
	   $no = floor($number);
	   $point = round($number - $no, 2) * 100;
	   $hundred = null;
	   $digits_1 = strlen($no);
	   $i = 0;
	   $str = array();
	   $words = array('0' => '', '1' => 'one', '2' => 'two',
	    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
	    '7' => 'seven', '8' => 'eight', '9' => 'nine',
	    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
	    '13' => 'thirteen', '14' => 'fourteen',
	    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
	    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
	    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
	    '60' => 'sixty', '70' => 'seventy',
	    '80' => 'eighty', '90' => 'ninety');
	   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
	   while ($i < $digits_1) {
	     $divider = ($i == 2) ? 10 : 100;
	     $number = floor($no % $divider);
	     $no = floor($no / $divider);
	     $i += ($divider == 10) ? 1 : 2;
	     if ($number) {
	        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
	        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
	        $str [] = ($number < 21) ? $words[$number] .
	            " " . $digits[$counter] . $plural . " " . $hundred
	            :
	            $words[floor($number / 10) * 10]
	            . " " . $words[$number % 10] . " "
	            . $digits[$counter] . $plural . " " . $hundred;
	     } else $str[] = null;
	  }
	  $str = array_reverse($str);
	  $result = implode('', $str);
	  $points = ($point) ?
	    "." . $words[$point / 10] . " " .
	          $words[$point = $point % 10] : '';
	  echo $result . "Rupees  " . $points . " ";
	}
