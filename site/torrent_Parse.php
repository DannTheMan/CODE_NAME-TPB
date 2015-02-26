<?php
require dirname(__FILE__) . '/../tracker/functions.reopentracker.php';
/**
*
*	Class that create a torrent_File object
*	to create a torrent_File object simply create a new torretFile with the 
*	path to the torrent file as the params
*
*	methods are pretty self explanitory
*	use this to get certian things for a torrent file
*/

class torrent_File
{
	/**
	* location of the .torrent file
	*
	* @var 		string
	* @access 	private
	* @since 	1.0.0
	*/
	private $_file_location;

	private $torrent_data = NULL;

	private $sources = NULL;

	private $info = NULL;

	public $file_string = NULL;

	public $info_hash = NULL;

	public $seeds = NULL;

	public $leechs = NULL;

	public $downloads = NULL;


	public function torrent_File($path)
	{
		$this->_file_location = $path;
		$this->scrape_and_set_values();
	}

	//scrapes the peers list sets up values
	private function scrape_and_set_values()
	{
		//set file_string
		$this->file_string = file_get_contents($this->_file_location);

		$this->torrent_data = bdecode($this->file_string);

		//set info_hash
		$this->info_hash = sha1(bencode($this->torrent_data['info']));

		//set up variables
		$this->info = strtolower($this->info_hash);
		$scrape = str_replace('announce', 'scrape', $this->torrent_data['announce']);
		$this->sources = bdecode(@file_get_contents($scrape . '?info_hash=' . urlencode(hex2bin($this->info))));

		$this->seeds = $this->sources['files'][hex2bin($this->info)]['complete'];
		$this->leechs = $this->sources['files'][hex2bin($this->info)]['incomplete'];
		$this->downloads = $this->sources['files'][hex2bin($this->info)]['downloaded'];

	}

	//template function for how to get the output
	public function basic_output()
	{
		//display the files in the torrent
		$c = count($this->torrent_data['info']['files']);
		echo '<h2>Files</h2>';
		// if it has more then one file do a loop and display all the files; else display the name of the file
		if ($c > 1) {
		    for ($i = 0; $i < $c; $i++) {
		        echo $this->torrent_data['info']['files'][$i]['path']['0'] . '<br/>';
		    }
		} else {
		    echo $this->torrent_data['info']['name'] . '<br/>';
		}

		echo '<h2>Sources</h2>' .
	    	'<b>Seeds:</b> ' . $this->seeds . '<br/>' .
	    	'<b>Leechs:</b> ' . $this->leechs . '<br/>' .
	    	'<b>Downloads:</b> ' . $this->downloads . '<br/>';
	}


}