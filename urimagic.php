<!DOCTYPE html>

<html lang="en">
<head>
<?php require '_meta.php' ?>
<?php require '_style.php' ?>
<title>URIMagic - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<aside><a href="https://github.com/nigelsmall/urimagic">URIMagic on GitHub</a>.</aside>
<h1>URIMagic</h1>

<p>URIMagic is a Python library designed to be a comprehensive replacement for the standard library module <strong>urllib.parse</strong>, previously known as <strong>urlparse</strong>. It provides a full implementation of RFC 3986 as well as support for RFC 6570 (URI Templates).
</p>

<h2>Percent Encoding & Decoding</h2>

<p>Percent encoding (referred to as URL quoting in the standard library) is an encoding mechanism used by parts of URIs that require characters that are reserved by the URI specification.
</p>

<dl>
  <dt><big>urimagic.<strong>percent_encode</strong>(data, safe=None)</big></dt>
  <dd>Percent encode a string of data, optionally keeping certain characters
unencoded.</dd>
  <dt><big>urimagic.<strong>percent_decode</strong>(data)</big></dt>
  <dd>Percent decode a string of data.</dd>
</dl>

<h2>Anatomy of a URI</h2>

<h2>URI Parsing</h2>

<h2>URI Building</h2>

<h2>URI Resolution</h2>

<h2>URI Templates</h2>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
