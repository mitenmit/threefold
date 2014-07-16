# THREEFOLD
### actually simple templating

OK, so you know how a CMS or even a template system like Savant is complete overkill if you just want to build a small, say 7-page, website? I mean, all you really want to have is separate header and footer files so you don’t keep repeating yourself with loading stylesheets, scripts, navigation and what not. You don’t want to spend three hours configuring the framework, because, dude, come on.

So this is Threefold. Put a header, footer and 404-page in template/. Then put the content of the pages in pages/. Threefold stitches them together for you. Done.

Sure, it works with a index.php?p=pagename structure, but there’s an .htaccess example included so you can have normal, pretty URLs. You can even use one level of subfolders in the pages/ folder if you want to have groups of pages.

### CONFIGURATION

1. Review the settings in threefold/config.php.
2. Create the .htaccess file. An example can be found in htaccess-example.txt.
3. Start building!

### OTHER OPTIONS

By default, title tags are automatically generated, based on the filename. My_beautiful_page.phtml gives you My Beautiful Page. If you’d rather just have the first letter capitalised or, I don’t know, have all-caps titles: you can easily tweak that in config.php.

Want to use custom title and description tags to keep Google happy? Well, you can. Put a JSON file with the same name as your page in pages/. See the included example.

There are a bunch of other options for extension or customisation, like using slugs to create page-specific CSS classes and stuff, but it’s probably best to just look at the included examples to get a better idea of what’s going on.
