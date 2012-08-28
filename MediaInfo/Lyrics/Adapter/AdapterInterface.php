<?php

namespace Nass600\MediaInfoBundle\Lyrics\Adapter;

/**
 * AdapterInterface
 *
 * @package Nass600LyricsBundle
 * @subpackage Adapter
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
interface AdapterInterface
{
	/**
	 * Performs a search of the $query text against the web service and outputs the result in the given $format
	 *
	 * @abstract
	 * @param string $query
	 * @param string $format
	 */
    public function searchLyrics($query, $format);

	/**
	 * Gets the lyrics through the adapter API given the track $id and outputs the result in the given $format
	 *
	 * @abstract
	 * @param string $id
	 * @param string $format
	 * @return mixed
	 */
    public function getLyrics($id, $format);

	/**
	 * Builds the url with the object parameters
	 *
	 * @abstract
	 */
	public function getUrl();
}