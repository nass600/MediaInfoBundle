<?php

namespace Nass600\MediaInfoBundle\MediaInfo\Lyrics\Manager;

use Nass600\LyricsBundle\Adapter\AdapterInterface;

/**
 * LyricsManager
 *
 * @package Nass600LyricsBundle
 * @subpackage Model
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
class LyricsManager
{
	protected $adapter;

	public function __construct($adapter){
		$this->adapter = new $adapter;
	}

	/**
	 * Performs a search of the $query text against the web service and outputs the result in the given $format
	 *
	 * @param string $query
	 * @param string $format
	 * @return mixed
	 */
	public function searchLyrics($query, $format){
		$results = $this->adapter->searchLyrics($query, $format);

		$errors = $this->hasErrors($results);

		return (!$errors) ? $results : null;
	}

	/**
	 * Gets the lyrics through the adapter API given the track $id and outputs the result in the given $format
	 *
	 * @param string $id
	 * @param string $format
	 * @return mixed
	 */
	public function getLyrics($id, $format){
		$results = $this->adapter->getLyrics($id, $format);

		$errors = $this->hasErrors($results);

		return (!$errors) ? $results : null;
	}

	/**
	 * Searches for the $query text and retrieves in one step the best lyrics
	 *
	 * @param string $query
	 * @param string $format
	 * @return mixed
	 */
	public function getBestLyrics($query, $format){
		$results = $this->adapter->getBestLyrics($query, $format);

		$errors = $this->hasErrors($results);

		return (!$errors) ? $results : null;
	}

	/**
	 * Checks that response does not contain any errors
	 *
	 * @param $results
	 * @return bool
	 */
	public function hasErrors($results)
	{
		try{
			$lyrdb = new \SimpleXMLElement($results);
		}
		catch (\Exception $e){
			return false;
		}

		return ($lyrdb->error->number == null) ? false : true;
	}
}