# THREEFOLD v1.0
## Yet another fucking template system

Threefold is an extremely simple template system that uses a very basic header-body-footer construction. Want to build a small website without spending three hours learning the syntax and/or construction of the CMS or whatever the fuck it is you’re using? Give this a try.

Header and footer files, as well as a standard 404-page are located in assets/template/. The individual pages are in pages/.

Threefold supports one level of subfolders in the pages/ folder. If you choose not to configure mod_rewrite for Threefold, top-level pages can be accessed using sitename.com/?p=pagename and pages inside a subfolder can be accessed using sitename.com/?s=subfoldername&p=pagename.

Bootstrap and jQuery are included in the standard configuration, but obviously you can remove them if you prefer.

Please note that all content, including header and footer files must be saved with a .phtml extension. (You can tweak this in threefold/classes/threefold.php if you really want to.)


### CONFIGURATION

1. Review the settings in threefold/config.php.
2. Create the .htaccess file. An example can be found in misc/htaccess-example.txt.
3. Start building!