<?php
namespace Threefold;
/* 
=======================
CONSTANTS AND SETTINGS
=======================


[TITLE]
The default title to show up in the <title> tag.
*/
define ( STANDARD_TITLE , 	"Threefold" );

/*
[AUTHOR]
Who is providing the content? Google wants to know.
*/
define ( CONTENT_AUTHOR	,	"Accommodavid" );

/*
[CAPITALS]
How Do You Like Your Titles? Perhaps just capitalize the first word? HOW ABOUT ALL CAPS?
Choose "words", "first" or "all".
*/
define ( CAPITALS_PREF  , 	"words" );

/*
[FOLDERS]
By default, ROOT_FOLDER is empty, THEME_FOLDER is "template/" and PAGES_FOLDER is "pages/".
If you did not put Threefold in the public_html folder, or whatever root folder your webserver uses,
want to load a different theme or locate your content elsewhere, change these values.
Remember the slash after the folder name.
*/
define ( ROOT_FOLDER	,	"~David/Threefold/" );
define ( THEME_FOLDER	, 	"template/" );
define ( PAGES_FOLDER	, 	"pages/" );