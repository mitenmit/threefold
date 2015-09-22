![Threefold](https://cloud.githubusercontent.com/assets/6472410/9900022/1acc2444-5c5e-11e5-8c31-6329806a5717.png)

[![Latest Stable Version](https://poser.pugx.org/accommodavid/threefold/v/stable)](https://packagist.org/packages/accommodavid/threefold) [![Total Downloads](https://poser.pugx.org/accommodavid/threefold/downloads)](https://packagist.org/packages/accommodavid/threefold) [![Latest Unstable Version](https://poser.pugx.org/accommodavid/threefold/v/unstable)](https://packagist.org/packages/accommodavid/threefold) [![License](https://poser.pugx.org/accommodavid/threefold/license)](https://packagist.org/packages/accommodavid/threefold)
[![Build Status](https://travis-ci.org/Accommodavid/Threefold.svg?branch=master)](https://travis-ci.org/Accommodavid/Threefold)
## The most lightweight theme engine in the world

So you know how stupidly complicated it is to build really small websites, right? You just want to build something simple without a lot of maintenance, without any databases, you can write the content yourself. A complete CMS is way overkill. But reverting to plain HTML pages means repeating a lot of code and making a big mess. Threefold solves this problem.

Threefold is the most lightweight theme engine in the world and the fastest way to make small websites. Put your header and footer in _theme/_. Put the content of your pages in _pages/_. Threefold stitches them together for you. Done. Nothing to set up, no databases to configure.

### How do I install it?
1. Download [this](https://accommodavid.sexy/threefold/download/threefold.zip) and put it on your server

Or do `composer create-project accommodavid\threefold` if you have Composer installed.

### Are there special features?
Glad you asked. Threefold includes a built-in 404-page and a ton of small helpers to get you going quickly. Under the hood is Twig, which allows you to put things in your pages like `{{ title }}` and have them filled automatically. You can add custom metadata to your page with simple JSON and access it everywhere, like a custom header image for each page. There is support for subfolders, so you can group pages together without worrying about weird URLs. Oh, and if you're on Mac or Linux, you can test Threefold locally by running `bin/threefold`.

### Do I need anything special to run Threefold?
If your server supports PHP5.4 and mod_rewrite, no. For earlier PHP versions, you have to enable `short_open_tags`.

### Documentation
The docs are [here](http://accommodavid.github.io/threefold)
