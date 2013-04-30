<?php 
/**
 * @copyright Nicholas Jordon
 */
class sh_color {
	private $txt_colors = array();
	private $bg_colors = array();

	public function __construct(){
		// Set up colors
		$this->txt_colors = array(
			// regular
			'black'       => '0;30',
			'red'         => '0;31',
			'green'       => '0;32',
			'yellow'      => '0;33',
			'blue'        => '0;34',
			'purple'      => '0;35',
			'cyan'        => '0;36',
			'white'       => '0;37',
			// bold
			'bold_black'  => '1;30',
			'bold_red'    => '1;31',
			'bold_green'  => '1;32',
			'bold_yellow' => '1;33',
			'bold_blue'   => '1;34',
			'bold_purple' => '1;35',
			'bold_cyan'   => '1;36',
			'bold_white'  => '1;37'
		);
		$this->bg_colors = array(
			'black'       => '0;30',
			'red'         => '0;31',
			'green'       => '0;32',
			'yellow'      => '0;33',
			'blue'        => '0;34',
			'purple'      => '0;35',
			'cyan'        => '0;36',
			'white'       => '0;37'
		);
	}

	// Returns colored string
	public function string($string, $txt_color=NULL, $bg_color=NULL){
		$return = "";
		if (isset($this->txt_colors[strtolower((string) $txt_color)])){
			$return .= "\033[" . $this->txt_colors[strtolower((string) $txt_color)] . "m";
		}
		if (isset($this->bg_colors[strtolower((string) $bg_color)])){
			$return .= "\033[" . $this->bg_colors[strtolower((string) $bg_color)] . "m";
		}
		$return .=  $string . "\033[0m";
		
		return $return;
	}
	
	public function get_txtcolors() {
		return array_keys($this->txt_colors);
	}
	
	public function get_bgcolors() {
		return array_keys($this->bg_colors);
	}
}

$color = new sh_color;

// get arguments
$args = getopt('s:c:C:');

// test if arguments exist
if(!isset($args['c'])){
	$args['c'] = NULL; // prevents error
}
if(!isset($args['C'])){
	$args['C'] = NULL; // prevents error
}
if(!isset($args['s'])){
	// error out if no string
	$args['s'] = 'ERROR: argument -s is required';
	$args['c'] = 'bold_red';
	$args['C'] = 'black';
}

$output = $color->string($args['s'], $args['c'], $args['C']).PHP_EOL;

// print all the colors
//$output = '';
//foreach ($color->get_txtcolors() as $value) {
//	$output .= $color->string('This is the txt color: '.str_replace('_', ' ',$value), $value).PHP_EOL;
//}
//foreach ($color->get_bgcolors() as $value) {
//	$output .= $color->string('This is the bg color: '.str_replace('_', ' ',$value), NULL, $value).PHP_EOL;
//}

fwrite(STDOUT, $output);
exit();








