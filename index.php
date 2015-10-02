<?php
/**
 * Threefold ~ minimal theme engine
 */

// Paths to the theme folder and the pages folder
$paths = [
    'theme' => 'theme/',
    'pages' => 'pages/'
];

// Parse config
$pageParameters = json_decode(file_get_contents('config.json'), true);
$pageParameters['tree'] = '';

// Parse request
$rawParams = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
if (count($rawParams) > 1) {
    $pageParameters['slug'] = array_pop($rawParams);
    $pageParameters['tree'] = implode('/', $rawParams) . '/';
} elseif ($rawParams[0] !== '') {
    $pageParameters['slug'] = $rawParams[0];
} else {
    $pageParameters['slug'] = 'home';
}

// Set metadata
switch ($pageParameters['capitalsPreference']) {
    case 'words':
        $pageParameters['title'] = ucwords(str_replace('_', ' ', $pageParameters['slug']));
        break;
    case 'first':
        $pageParameters['title'] = ucfirst(str_replace('_', ' ', $pageParameters['slug']));
        break;
    case 'all':
        $pageParameters['title'] = strtoupper(str_replace('_', ' ', $pageParameters['slug']));
        break;
}
if (file_exists($jsonPath = $paths['pages'] . '/' . $pageParameters['tree'] . '/' . $pageParameters['slug'] . '.json')) {
    $pageParameters = array_merge($pageParameters, json_decode(file_get_contents($jsonPath), true));
}

// Render parts
ob_start();
try {
    foreach (['header', 'body', 'footer'] as $part) {
        $ext = '.html';
        if ($part === 'body' &&
            !file_exists($path = $paths['pages'] . $pageParameters['tree'] . $pageParameters['slug'] . $ext)) {
                $part = '404';
        }
        if ($part !== 'body') {
            if(!file_exists($path = $paths['theme'] . $part . $ext)) {
                throw new Exception('No template file found for template part `{$part}` at {$path}!');
                continue;
            }
        }
        // Compile template
        $html = preg_replace_callback('/\{\{\s?([a-zA-Z]+)\s?\}\}/', function($match) use ($pageParameters) {
            return @$pageParameters[trim($match[0], '{{ }}')];
        }, file_get_contents($path));
        print($html);
    }
} catch (Exception $e) {
    print '<strong>Threefold encountered an error: </strong><code>{$e->getMessage()}</code>';
}
ob_end_flush();
