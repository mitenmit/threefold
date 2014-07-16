# THREEFOLD
## Actually simple templating

OK, so you know how much of a pain it is to simply build a small, say, 7-page website?
A CMS or templating system like Wordpress or Savant seems like overkill, manually 
coding each page is way too much work and using regular PHP includes means title tags
are going to be a nightmare. You just want something that does this:

<img src="http://i0.watermel.uno/threefold/threefold-explanation.png">

That's what Threefold does.

Put a header, footer and 404-page in template/.
Then put the content of the pages in pages/.
Threefold stitches them together for you.
Done.

## Nice things about Threefold

* Pretty title tags are automatically generated based on the filename. (My_page.phtml gives you My Page)
* Non-existing URLs bring up a 404 page.
* You can use page-specific classes and stuff with a simple shortcode.

## How do I install it?

1. Download and extract a zip-file to your server
2. Rename htaccess-example.txt to .htaccess
3. Check threefold/config.php to see if everything's OK
4. That's it. Start building!


## Are there any other options or things to customize?

Sure, if you want to.

If you want to use custom title tags and descriptions, put a JSON file with the same name as your page in pages/.

You can use page-specific classes or elements by making use of <code><?=$this->slug?></code>. This prints the name of the current page in a script-friendly format. There are other shortcodes, like <code><?=$this->title?></code>, which prints the current page title and <code><?=SITE_URL?></code> which prints the absolute URL of your website.

There's also a small script included that highlights the current page in the navigation menu.

See the included examples and their source code to get a better idea of how you can customize Threefold to your liking. Or, if you want to extend even further, check out the core PHP code. It's pretty straightforward and can easily be tweaked or built upon.
