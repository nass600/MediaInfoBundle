<?php

namespace Nass600\MediaInfoBundle\MediaInfo\Adapter\Lyrics;

use Nass600\MediaInfoBundle\MediaInfo\Adapter\AbstractAdapter;

class LyricWikiAdapter extends AbstractAdapter implements AdapterInterface
{
	const API_URL = "http://webservices.lyrdb.com/dev/function.php?parameters";

	public function searchLyrics(){

	}

	public function getLyrics(){

	}

	public function getUrl()
    {
        return str_replace("parameters", $this->getHtmlParameters(), self::API_URL);
    }
}