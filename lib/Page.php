<?php
/**
 * Page
 * ------
 * Object that contains all the variables of the current page
 */

namespace Threefold;

class Page
{
    /**
     * The metadata of the Page
     *
     * @var array
     */
    private $metadata;

    /**
     * Constructor
     * Create a new Page object
     *
     * @param Request $request
     * @return Page
     */
    public function __construct(Request $request, Array $configuration)
    {
        $this->metadata["slug"] = $request->pageName;
        $this->metadata["tree"] = $request->tree;
        $this->metadata = array_merge($this->metadata, $configuration);

        if (file_exists($jsonPath = ROOT . DS . PAGES . DS . $request->tree . DS . $this->slug . ".json")) {
            $this->metadata = array_merge($this->metadata, json_decode(file_get_contents($jsonPath)));
        } else {
            switch ($configuration["capitalsPreference"]) {
                case 'words':
                    $this->title = ucwords(str_replace("_", " ", $this->slug));
                    break;
                case 'first':
                    $this->title = ucfirst(str_replace("_", " ", $this->slug));
                    break;
                case 'all':
                    $this->title = strtoupper(str_replace("_", " ", $this->slug));
                    break;
            }
        }
    }

    /**
     * getMetadata
     * Returns all metadata
     *
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Magic get function
     * Pulls metadata from array
     *
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
        if (isset($this->metadata[$name])) {
            return $this->metadata[$name];
        }
        return '';
    }

    /**
     * Magic set function
     * Stores metadata in array
     *
     * @param string $name, string $value
     * @return bool
     */
    public function __set($name, $value)
    {
        $this->metadata[$name] = $value;
        return true;
    }
}
