<!DOCTYPE html>
<html lang="en">

<head>
<?php require '_meta.php' ?>
<?php require '_style.php' ?>
<title>Load2neo - Nigel Small Technology</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<h1>Load2neo</h1>

<p>Load2neo is a <a href="http://docs.neo4j.org/chunked/milestone/server-unmanaged-extensions.html">server extension</a>
written for Neo4j 2.0 and upwards
that provides a facility for bulk loading data into a
<a href="http://neo4j.org/">Neo4j</a> database. Currently, only the
<a href="geoff">Geoff</a> format is supported although it is planned that 
support for other formats will follow.</p>

<h2 id="installation">Installation</h2>

<p>To install, you will first need to download the latest distribution from
here:</p>

<ul>
  <li><a href="d/load2neo-0.6.0.zip">load2neo-0.6.0.zip</a> (24.5 kB)</li>
</ul>

<p>This zip archive contains three files - two jars which need to be copied to
your server's <strong>plugin</strong> directory and a
<strong>neo4j-server.properties</strong> file that contains content to be added
to the identically named file within the server's <strong>conf</strong>
directory. This is a single line which mounts the plugin at the correct URI
offset:</p>

<pre><code>org.neo4j.server.thirdparty_jaxrs_classes=com.nigelsmall.load2neo=/load2neo</code></pre>

<h2 id="usage">Usage</h2>

<h3 id="bulk-load">Bulk Load</h3>

<pre><code>curl -X POST http://localhost:7474/load2neo/load/geoff -d '(a)&lt;-[:KNOWS]-&gt;(b)'</code></pre>
<pre><code>curl -X POST http://localhost:7474/load2neo/load/geoff -d @foo.geoff</code></pre>

<h3 id="bulk-delete">Bulk Delete</h3>

<pre><code>curl -X DELETE http://localhost:7474/load2neo/all-the-things</code></pre>

<h2 id="performance">Performance</h2>

<p>In limited tests, load2neo has shown good performance. The timings below were taken for a repeated load of a
<a href="https://raw.github.com/nigelsmall/load2neo/master/src/test/resources/40000.geoff">test file</a>
containing 40,000 nodes and 40,000 relationships on a quad-core <em>AMD Phenom&trade; II X4 965</em>
with 4GB RAM.</p>

<table>
<tr><th>turn</th><th style="text-align:right">parse time (ms)</th><th style="text-align:right">load time (ms)</th></tr>
<tr><td>1*</td><td align="right">1185</td><td align="right">253682</td><td>
<tr><td>2</td><td align="right">760</td><td align="right">2074</td><td>
<tr><td>3</td><td align="right">740</td><td align="right">1745</td><td>
<tr><td>4</td><td align="right">689</td><td align="right">1593</td><td>
<tr><td>5</td><td align="right">699</td><td align="right">1585</td><td>
<tr><td>6</td><td align="right">694</td><td align="right">1529</td><td>
<tr><td>7</td><td align="right">670</td><td align="right">1530</td><td>
<tr><td>8</td><td align="right">683</td><td align="right">1827</td><td>
<tr><td>9</td><td align="right">715</td><td align="right">1622</td><td>
<tr><td>10</td><td align="right">671</td><td align="right">1531</td><td>
<tr><td>11</td><td align="right">664</td><td align="right">1565</td><td>
<tr><td>12</td><td align="right">695</td><td align="right">1542</td><td>
<tr><td>13</td><td align="right">719</td><td align="right">1590</td><td>
<tr><td colspan="3"><hr></td></tr>
<tr><td>minimum</td><td align="right">664</td><td align="right">1529</td><td>
<tr><td>maximum</td><td align="right">760</td><td align="right">2074</td><td>
<tr><td>average</td><td align="right">700</td><td align="right">1644</td><td>
</table>

<p><em>* The first turn was discarded to allow the cache to warm up</em></p>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
