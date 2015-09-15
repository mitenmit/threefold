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
     * @param Request $request, Array $configuration
     * @since 2.0.0
     */
    public static function dispatch(Request $request, Array $configuration)
    {
        $page = new Page($request, $configuration);

        ob_start();
        try {
            static::renderTemplate(["head", "body", "footer"], $page);
        } catch (TemplateException $e) {
            print "<strong>TemplateException:</strong><code>{$e->getMessage()}</code>";
        } catch (\Exception $e) {
            print "<strong>Exception:</strong><code>{$e}</code>";
        }
        ob_end_flush();
    }

    /**
     * Render parts
     *
     * @param Array $parts, Page $page
     * @since 2.0.0
     */
    private function renderTemplate(Array $parts, Page $page)
    {
        $loader = new \Twig_Loader_Filesystem([THEME, PAGES]);
        $twig = new \Twig_Environment($loader);
        $ext = ".html";

        foreach ($parts as $part) {
            if ($part === "body") {
                $path = $page->tree . DS . $page->slug;
                $baseFolder = PAGES;
            } else {
                $path = $part;
                $baseFolder = THEME;
            }
            if (file_exists($baseFolder . DS . $path . $ext)) {
                echo $twig->render($path . $ext, $page->getMetadata());
            } elseif ($part === "body") {
                static::renderTemplate(["404"], $page);
            } else {
                throw new TemplateException("Warning: no template file found for template part '" . $part . "!");
            }
        }
    }
}
