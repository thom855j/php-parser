<?php
require_once "../src/MacroParser.php";
$input = file_get_contents("input.html");

use WebSuppoerDK\PHPParser\Macro:
$macro = new Macro();

if (!isset($_GET["replace"]) || !$_GET["replace"]) {
	echo $input;
} else {
	echo $macro->replace($input);
}
