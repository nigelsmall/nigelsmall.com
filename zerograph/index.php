<!DOCTYPE html>

<html lang="en">
<head>
<?php require '../_meta.php' ?>
<?php require '../_style.php' ?>
<title>Zerograph - Nigel Small Technology</title>
</head>

<body>

<?php require '../_header.php' ?>
<main>

<aside class="logo"><img src="/img/200/zerograph.png"></aside>
<h1>Zerograph</h1>

<p>Zerograph is an alternative server container for the leading graph database
<a href="http://www.neo4j.org/">Neo4j</a>. It can support one or more databases and uses <a href="http://zeromq.org/">ZeroMQ</a> for fast and
reliable communication.</p>
<p>The software is packaged as a bundle containing both the server and the client.
Initially, a Python client is provided although support for other languages
will follow.</p>

<h2>Quick Start</h2>

<h3>Download &amp; Run</h3>
<div><div><pre>$ git clone git@github.com:zerograph/zerograph.git
$ cd zerograph
$ gradle run
</pre></div>
</div>
</div>

<h3>Execute a Cypher Query</h3>
<div><div><pre>$ bin/zerograph shell

Zerograph Shell v1
(C) Copyright 2014, Nigel Small &lt;nigel@nigelsmall.com&gt;

[Z] localhost:47470&gt; create (a:Person {name:&#39;Alice&#39;}) return a
a
-----------------------------------
(0:Person {&quot;name&quot;:&quot;Alice&quot;})
(1 row)


[Z] localhost:47470&gt; ⌁
</pre></div>
</div>
</div>
</div>
<div class="section" id="in-depth">
<h2>In Depth</h2>
<div>
<ul>
<li><a href="server">Server</a></li>
<li><a href="python_client">Python Client</a></li>
<li><a href="protocol_1">Protocol Specification V1β</a></li>
</ul>
</div>
</div>
</div>


</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
