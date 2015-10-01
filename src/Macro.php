<?php

namespace WebSupportDK\PHPParser;

class Macro {
	/**
	 * Replace the macros in an input string
	 * @param string $input
	 * @return string
	 */
	public function replace ($input) {
		return preg_replace("/\{{3}([a-z]+\|.+)\}{3}/Ue",'$this->_replace("\\1")',$input);
	}

	/**
	 * Run the replacement code on a given macro string
	 * @param string $macro
	 * @return string
	 */
	private function _replace ($macro) {
		list ($name,$params) = explode("|",$macro);

		if (method_exists($this,$name)) {
			return $this->$name($params);
		}

		throw new Exception ("Unrecognised macro: {$name}.",500);
	}

	/**
	 * Replaces a YouTube macro
	 * @param string $params
	 * @return string
	 */
	private function youtube ($params) {
		parse_str($params);

		// set defaults
		if (!isset($id)) { $id = "ykwqXuMPsoc"; }
		if (!isset($width)) { $width = 560; }
		if (!isset($height)) { $height = 315; }

		// output the final HTML
		return "<iframe width=\"{$width}\" height=\"{$height}\" src=\"http://www.youtube.com/embed/{$id}\" frameborder=\"0\" allowfullscreen></iframe>";
	}
}