<?php
/**
* Threefold
* --------------
* Main class that does the rendering and handles the request
*
* @package Threefold
* @since 2.0.0
*/
namespace Threefold;

class Threefold
{
    /**
     * Dispatch function
     *
     * @param Request $request Should be created from GET
     * @param Array $configuration Should be injected by bootstrapping process
     */
    public static function dispatch(Request $request, Array $configuration)
    {
        $page = new Page($request, $configuration);

        ob_start();
        try {
            static::renderTemplate(["head", "body", "footer"], $page);
        } catch (TemplateException $e) {
            print "<strong>TemplateException:</strong><h3>{$e->getMessage()}</h3>";
        } catch (\Exception $e) {
            print "<strong>Exception:</strong><h3>{$e->getMessage}</h3>";
        }
        ob_end_flush();
    }

    /**
     * Render parts
     *
     * @param Array $parts, Page $page, Array $configuration
     * @since 2.0.0
     */
    private function renderTemplate(Array $parts, Page $page)
    {
        foreach ($parts as $part) {
            if ($part === "body") {
                $part = $page->slug;
                $folder = PAGES;
            } else {
                $folder = THEME;
            }
            if (file_exists($pathToTemplatePart = $folder . DS . $part . ".html")) {
                $output .= include($pathToTemplatePart);
            } else {
                throw new TemplateException("Warning: no template file found for template part '"
                                                . $part . "' at ".$pathToTemplatePart."!");
            }
        }
        echo($output);
    }
}
