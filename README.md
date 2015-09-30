![Threefold](https://cloud.githubusercontent.com/assets/6472410/9900022/1acc2444-5c5e-11e5-8c31-6329806a5717.png)

[![Latest Stable Version](https://poser.pugx.org/polyfold/threefold/v/stable)](https://packagist.org/packages/polyfold/threefold) [![Total Downloads](https://poser.pugx.org/polyfold/threefold/downloads)](https://packagist.org/packages/polyfold/threefold) [![Latest Unstable Version](https://poser.pugx.org/polyfold/threefold/v/unstable)](https://packagist.org/packages/polyfold/threefold) [![License](https://poser.pugx.org/polyfold/threefold/license)](https://packagist.org/packages/polyfold/threefold)
[![Build Status](https://travis-ci.org/polyfold/threefold.svg?branch=master)](https://travis-ci.org/polyfold/threefold)
## A theme engine in less than 70 lines of code

So you know how stupidly complicated it is to build really small websites, right? You just want to build something simple without a lot of maintenance, without any databases, you can write the content yourself. A complete CMS is way overkill. But reverting to plain HTML pages means repeating a lot of code and making a big mess. Threefold solves this problem.

Threefold is the most lightweight theme engine in the world and the fastest way to make small websites. Put your header and footer in _theme/_. Put the content of your pages in _pages/_. Threefold stitches them together for you. Done. Nothing to set up, no databases to configure. It's crazy fast, less than 10 kb in size and can be up and running in five seconds.

### How do I install it?
1. Download the latest release and put it somewhere on your server.

Or do `composer create-project polyfold\threefold` if you have Composer installed.

### Are there special features?
Glad you asked. Threefold includes a built-in 404-page and a ton of small helpers to get you going quickly. It supports tags like `{{ title }}` or `{{ author }}` before loading so you can use them in your theme. You can add custom metadata to your page with simple JSON and access it everywhere, like a custom header image for each page. There is support for subfolders, so you can group pages together without worrying about weird URLs. Oh, and if you're on Mac or Linux, you can test Threefold locally by running `bin/threefold`.

### Do I need anything special to run Threefold?
If your server supports PHP5.4 and mod_rewrite or something equivalent, no.

### What tags are there? Give me examples.
Everything you put in `config.json` becomes a global tag. By default these are:

- `{{ standardTitle }}`
  The base title of your website
- `{{ author }}`
  The author of your website (for search results)

Per page Threefold also generates the following tags:

- `{{ title }}`
  The title of this page (e.g. 'Apple Tree')
- `{{ slug }}`
  An URL-safe title of the page (e.g. 'apple_tree')
- `{{ tree }}`
  The structure of subfolders that your page is in (e.g. 'nature/trees/fruitbearing/')

You can also add your own tags per page. Create a JSON file with the same name as
your page. (So for `nice_page.html` you should create `nice_page.json`) Then you
can create tags like so:
```
{
  "customTag": "A custom value"
}
```
This gives you the ability to put `{{ customTag }}` somewhere in `nice_page.html`,
where it will compile to:
```
A custom value
```

Custom tags work in the entire theme, so you could also do things like:
```
{
  "customHeaderImage": "img/customHeaderForNicePage.jpg"
}
```
And have something in your `theme/header.html` like `<img src="{{ customHeaderImage }}">`.

As mentioned before, everything in `config.json` becomes a tag as well. However, custom
tags that are set per page override whatever custom tags you put in the global config.
This means you could even define certain defaults in `config.json`:
```
{
  "headerImage": "img/defaultBanner.png",
  "menuItemColor": "#5a57cd"
}
```
And override it per page to make some sections stand out more:
```
{
  "headerImage": "img/reallyCoolBannerForTheContactPage.png",
  "menuItemColor": "#f0b95b"
}
```
Threefold gives you a lot of options while taking the hard work out of your hands. Also, this README is longer than its actual code.
