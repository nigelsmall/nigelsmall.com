<!DOCTYPE html>

<html lang="en">
<head>
<?php require '../_meta.php' ?>
<?php require '../_style.php' ?>
<title>Zerograph - Nigel Small</title>
</head>

<body>

<?php require '../_header.php' ?>
<main>

<h1>Zerograph Protocol Specification V1β</h1>

<div class="section" id="introduction">
<h2>1. Introduction<a class="headerlink" href="#introduction" title="Permalink to this headline"></a></h2>
<p>The Zerograph Application/Presentation Protocol (ZAPP) provides an OSI level
6/7 text-based request-response protocol that is used to facilitate
communications between client applications that require a graph database and
server applications that provide a Neo4j data store.</p>
<p>The reference implementation for ZAPP (the Zerograph server bundle) transmits
all messages over <a class="reference external" href="http://zeromq.org/">ZeroMQ</a>. This means of transmission is independent to the
protocol however and any request-response mechanism that supports textual
messaging should be able to support ZAPP.</p>
</div>
<div class="section" id="requirements">
<h2>2. Requirements<a class="headerlink" href="#requirements" title="Permalink to this headline"></a></h2>
<div class="section" id="encoding">
<h3>2.1. Encoding<a class="headerlink" href="#encoding" title="Permalink to this headline"></a></h3>
<p>All requests and responses MUST only use characters from the basic ASCII set,
i.e. 0x00 to 0x7F. Extended characters can be represented with the appropriate
JSON or YAML encoding: generally the &#8220;uXXXX&#8221; sequence.</p>
</div>
<div class="section" id="end-of-line-sequences">
<h3>2.2. End of Line Sequences<a class="headerlink" href="#end-of-line-sequences" title="Permalink to this headline"></a></h3>
<p>Lines may be separated by any common end-of-line sequence as defined below:</p>
<div class="highlight-python"><div class="highlight"><pre>eol := &lt;CR&gt; | &lt;LF&gt; | &lt;CR&gt;&lt;LF&gt;
</pre></div>
</div>
</div>
</div>
</div>

</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
