<?php

namespace Nass600\MediaInfoBundle\Lyrics\Adapter;

/**
 * AbstractAdapter
 *
 * @package Nass600LyricsBundle
 * @subpackage Adapter
 * @author Ignacio Velázquez Gómez <ivelazquez85@gmail.com>
 * @copyright Ignacio Velázquez Gómez
 */
class AbstractAdapter
{

	/**
	 * Parameters to put in the web service url
	 *
	 * @var array
	 */
	protected $parameters = array();

	/**
	 * Valid output data formats
	 *
	 * @var array
	 */
	protected $validFormats = array();


	/**
	 * Performs the curl call for getting the web service feed
	 *
	 * @param string $url
	 * @return mixed
	 */
	public function getFeed($url){
         // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        return $output;
	}

	/**
	 * Sets an array of parameters
	 *
	 * @param array $params
	 */
	public function setParameters(array $params)
    {
        foreach ($params as $pName => $pValue) {
            $this->setParameter($pName, $pValue);
        }
    }

	/**
	 * Sets a single parameter
	 *
	 * @param string $name
	 * @param string $value
	 */
	public function setParameter($name, $value)
    {
        $this->parameters[$name] = $value;
    }

	/**
	 * Gets a single parameter
	 *
	 * @return string
	 */
	public function getParameters()
    {
        return $this->parameters;
    }

	/**
     * This method returns the parameters formatted for an HTTP request
     *
     * @return string
     */
    protected function getHttpParameters()
    {
        $glue = "&";
        $htmlParams = "";

        $parameters = $this->getParameters();
        foreach ($parameters as $name => $value) {
            $htmlParams .= $name . '=' . str_replace(" ", '+', $value) . $glue;
        }

        return substr($htmlParams, 0, -strlen($glue));
    }
}