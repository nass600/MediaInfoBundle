<?php

namespace Nass600\MediaInfoBundle\MediaInfo\Adapter\Music;

use Nass600\MediaInfoBundle\MediaInfo\Adapter\AbstractAdapter;

/**
 * LastFMAdapter
 *
 * @package Nass600MediaInfoBundle
 * @subpackage Adapter
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
class LastFMAdapter extends AbstractAdapter implements AdapterInterface
{
//	const API_URL = "http://webservices.lyrdb.com/dev/function.php?parameters";
	const API_URL = "http://ws.audioscrobbler.com/2.0/";

    const API_KEY = "1fb73f684a6a41f4286ec94db6845e00";

	const SEARCH_FUNCTION = "lookup";
	const GET_FUNCTION = "album.getInfo";

	protected $validFormats = array('text', 'xml', 'json');

	public function searchLyrics($query, $format)
	{
		$this->setParameter('q', $query);
		$this->setParameter('agent', 'trial');
		$this->setOutputFormat($format);

		$url = str_replace('function', self::SEARCH_FUNCTION, $this->getUrl());

		$data = $this->getFeed($url);

		return $data;
	}

	public function getAlbumInfo(array $parameters)
	{
		$this->setParameter('method', self::GET_FUNCTION);
		$this->setParameter('api_key', self::API_KEY);

        foreach ($parameters as $key => $value) {
            $this->setParameter($key, $value);
        }

		$url = $this->getUrl();

		$data = $this->getFeed($url);
echo "<pre>";
var_dump(json_decode($data));
echo "</pre>";
die;
		return $data;
	}

	public function getBestLyrics($query, $format)
	{
		$this->setParameter('q', $query);
		$this->setParameter('agent', 'trial');
		$this->setOutputFormat($format);

		$url = str_replace('function', self::GET_BEST_FUNCTION, $this->getUrl());

		$data = $this->getFeed($url);

		return $data;
	}

	public function getUrl()
    {
        return self::API_URL."?{$this->getHttpParameters()}";
    }

	/**
	 * Sets the output parameter for the url
	 *
	 * @param string $format
	 * @throws \Exception
	 */
	public function setOutputFormat($format)
	{
		if (!in_array($format, $this->validFormats))
			throw new \Exception('Invalid output format');

		$this->setParameter('format', $format);
	}
}