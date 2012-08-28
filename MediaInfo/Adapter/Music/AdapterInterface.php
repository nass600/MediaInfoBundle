<?php

namespace Nass600\MediaInfoBundle\MediaInfo\Adapter\Music;

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
	 * Gets the lyrics through the adapter API given the track $id and outputs the result in the given $format
	 *
	 * @abstract
	 * @param string $id
	 * @param string $format
	 * @return mixed
	 */
    public function getAlbumInfo(array $parameters);

	/**
	 * Builds the url with the object parameters
	 *
	 * @abstract
	 */
	public function getUrl();
}