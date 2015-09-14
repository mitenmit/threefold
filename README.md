# Threefold [![Build Status](https://travis-ci.org/Accommodavid/Threefold.svg?branch=master)](https://travis-ci.org/Accommodavid/Threefold)
## The most barebones theme engine in the universe
![Threefold](https://cloud.githubusercontent.com/assets/6472410/9600040/e6b56a4c-5098-11e5-9042-f82829b792ea.png)
So you know how stupidly complicated it is to build really small websites, right? You just want to build something simple without a lot of maintenance, no databases involved, you can write the content yourself. A complete CMS is way overkill. But reverting to plain HTML pages means repeating a lot of code and making a big mess. Threefold solves this problem.

Threefold is the most barebones theme engine in the world. Put a header and footer in _template/_. Then put the content of your pages in _pages/_. Threefold stitches them together for you. Done.

Want to put the current page title in the header? Just use `<?=PAGE_TITLE?>`. Working on a script that needs to use page-specific classes? Use `<?=PAGE_SLUG?>` for the current filename.

But what about page descriptions? You know Google likes those. Well, even that's pretty easy now: use `<?=PAGE_DESCRIPTION?>` in the header. Then put a JSON file in pages/ with the same name as your page, containing `{ "description" : "Some description" }`. This even works for title tags as well.

There are tons of other options, such as using a global SITE_URL for absolute URLs, a built-in 404 page and more. Just check out the included examples.

### How do I install it?
Threefold can be installed in three minutes.

1. Download and unzip the latest release.
2. Rename htaccess-example.txt to .htaccess.
3. Edit threefold/config-example.php and rename to config.php.
4. That's it! Done!

### Do I need anything special to run Threefold?
If your server supports PHP5.4 and mod_rewrite, no. For earlier PHP versions, you have to enable `short_open_tags`.
