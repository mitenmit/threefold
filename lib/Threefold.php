<?php

namespace Threefold;

/**
 * Main class that does the rendering and handles the request
 *
 * @package Threefold
 * @since 2.0.0
 */
class Threefold
{
    /**
     * Dispatches a response based on the current request
     *
     * @param Request $request
     * @param Array $configuration
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
     * @param Array $parts      This corresponds to whatever files are in public/theme,
     *                          with the exception of body, which triggers rendering the
     *                          main content. Threefold by default tries header, body, footer.
     * @param Page $page        The current page.
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
