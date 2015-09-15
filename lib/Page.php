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
     * The parseable name of the Page
     *
     * @var string
     */
    public $slug = null;

    /**
     * The title of the Page
     *
     * @var string
     */
    public $title = null;

    /**
     * The standard title as defined in the config
     *
     * @var string
     */
    public $standardTitle = null;

    /**
     * The description of the Page
     *
     * @var string
     */
    public $description = null;

    /**
     * Constructor
     * Create a new Page object
     *
     * @param Request $request
     * @return Page
     */
    public function __construct(Request $request)
    {
        $this->slug = $request->pageName;

        if (file_exists($jsonPath = ROOT . DS . PAGES . DS . $request->tree . DS . $this->slug . ".json")) {
            $customMetaData = json_decode(file_get_contents($jsonPath));
            $this->title = $customMetaData->title;
            $this->description = $customMetaData->description;
        } else {
            switch ($configuration["preferences"]["capitalsPreference"]) {
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
        $this->standardTitle = $configuration["preferences"]["title"];
        $this->author = $configuration["preferences"]["author"];
    }
}
