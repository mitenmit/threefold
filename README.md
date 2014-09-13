# Threefold
## Actually simple templating

OK, so you know how much of a pain it is to just build a small, say 7-page, website? A CMS seems like overkill but simple PHP includes means page-specific title tags or highlighting the current page in the navbar is going to be a nightmare.

Really, all you want is something that does this:

```html
example.com/my-beautiful-page
|
|___ head.phtml
|	 <title>My Beautiful Page</title>
|
|___ my-beautiful-page.html
|
|___ foot.phtml
```

Well, surprise. That's exactly what Threefold does. Put a header and footer in _template/_. Then put the content of your pages in _pages/_. Threefold automatically stitches them together for you. Done.

Want to put the current title in the header? Just use <code><?=PAGE_TITLE?></code>. Working on a script that needs to use page-specific classes? Use <code><?=PAGE_SLUG?> for the current filename.

But what about page descriptions? You know Google likes those. Well, even that's pretty easy now: use <code><?=PAGE_DESCRIPTION?></code> in the header. Then put a JSON file in pages/ with the same name as your page, containing <code>{ "description" : "Some description" }</code>. This even works for title tags as well.

There are tons of other options, such as using a global SITE_URL for absolute URLs, a built-in 404 page and more. Just check out the included examples.

### How do I install it?
1. Download and unzip the latest release.
2. Rename htaccess-example.txt to .htaccess.
3. Edit threefold/config.php (Takes about 20 seconds.)
4. That's it! Done!