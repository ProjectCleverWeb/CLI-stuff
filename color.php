<?php 
class Colors {
	private $txt_colors = array();
	private $bg_colors = array();

	public function __construct() {
		// Set up shell colors
		$this->txt_colors['black'] = '0;30';
		$this->txt_colors['blue'] = '0;34';
		$this->txt_colors['green'] = '0;32';
		$this->txt_colors['cyan'] = '0;36';
		$this->txt_colors['red'] = '0;31';
		$this->txt_colors['pink'] = '0;35';
		$this->txt_colors['yellow'] = '0;33';
		$this->txt_colors['white'] = '0;37';
		
		$this->txt_colors['bold_black'] = '1;30';
		$this->txt_colors['bold_blue'] = '1;34';
		$this->txt_colors['bold_green'] = '1;32';
		$this->txt_colors['bold_cyan'] = '1;36';
		$this->txt_colors['bold_red'] = '1;31';
		$this->txt_colors['bold_pink'] = '1;35';
		$this->txt_colors['bold_yellow'] = '1;33';
		$this->txt_colors['bold_white'] = '1;37';

		$this->bg_colors['black'] = '40';
		$this->bg_colors['red'] = '41';
		$this->bg_colors['green'] = '42';
		$this->bg_colors['yellow'] = '43';
		$this->bg_colors['blue'] = '44';
		$this->bg_colors['pink'] = '45';
		$this->bg_colors['cyan'] = '46';
		$this->bg_colors['white'] = '47';
	}

	// Returns colored string
	public function string($string, $txt_color=NULL, $bg_color=NULL) {
		$return = "";
		// Check if given foreground color found
		if (isset($this->txt_colors[strtolower((string) $txt_color)])) {
			$return .= "\033[" . $this->txt_colors[strtolower((string) $txt_color)] . "m";
		}
		// Check if given background color found
		if (isset($this->bg_colors[strtolower((string) $bg_color)])) {
			$return .= "\033[" . $this->bg_colors[strtolower((string) $bg_color)] . "m";
		}
		// Add string and end coloring
		$return .=  $string . "\033[0m";
		return $return;
	}
	// Returns all foreground color names
	public function get_txtcolors() {
		return array_keys($this->txt_colors);
	}
	// Returns all background color names
	public function get_bgcolors() {
		return array_keys($this->bg_colors);
	}
}

$color = new Colors;

foreach ($color->get_txtcolors() as $value) {
	echo $color->getColoredString('This is the txt color: '.str_replace('_', ' ',$value), $value).PHP_EOL;
}
foreach ($color->get_bgcolors() as $value) {
	echo $color->getColoredString('This is the bg color: '.str_replace('_', ' ',$value), NULL, $value).PHP_EOL;
}














