# THREEFOLD v1.0
## Yet another fucking template system

Threefold is an extremely simple template system that uses a very basic header-body-footer construction. Want to build a small website without spending three hours learning the syntax and/or construction of the CMS or whatever the fuck it is you’re using? Give this a try.

Header and footer files, as well as a standard 404-page are located in <code>assets/template/</code>. The individual pages should go in <code>pages/</code>.

Threefold supports one level of subfolders in the <code>pages/</code> folder. If you choose not to configure mod_rewrite for Threefold, top-level pages can be accessed using <code>sitename.com/?p=pagename</code> and pages inside a subfolder can be accessed using <code>sitename.com/?s=subfoldername&p=pagename</code>. There's an example included, though, so you can use nicer URLs. In fact, you should.

<code>&lt;title&gt;</code> tags are generated based on the filename, so <code>"nice_page.phtml"</code> gives you <code>"Nice page"</code>, <code>"Nice Page"</code> or <code>"NICE PAGE"</code>, depending on your preference in <code>config.php</code>. If you want to have custom title and description tags because, you know, Google, then put a JSON file with the same filename in <code>pages/</code>. (See the included example.)

Bootstrap and jQuery are included in the standard configuration, but obviously you can remove them if you prefer.

Please note that all content, including header and footer files must be saved with a .phtml extension. (You can tweak this in threefold/classes/threefold.php if you really want to.)


### CONFIGURATION

1. Review the settings in threefold/config.php.
2. Create the .htaccess file. An example can be found in misc/htaccess-example.txt.
3. Start building!
