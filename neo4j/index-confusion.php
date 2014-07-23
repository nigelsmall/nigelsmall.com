<!DOCTYPE html>

<html lang="en">
<head>
<?php require '../_head.php' ?>
<title>Neo4j Index Confusion - Nigel Small</title>
</head>

<body>

<?php require '../_header.php' ?>
<main>

<h1>Neo4j Index Confusion</h1>

<p>Since the release of Neo4j 2.0 and the introduction of schema indexes, I have had to answer an increasing number of questions arising from confusion between the two types of index now available: <a href="http://docs.neo4j.org/chunked/stable/graphdb-neo4j-schema.html">schema indexes</a> and <a href="http://docs.neo4j.org/chunked/stable/indexing.html">legacy indexes</a>. For clarification, <strong>these are two completely different concepts and are not interchangable or compatible in any way</strong>. It is important, therefore, to make sure you know which you are using.</p>

<h2>Legacy Indexes</h2>

<p>Prior to the release of Neo4j 2.0, legacy indexes were just called indexes. These were powered by <a href="http://lucene.apache.org/">Lucene</a> outside the graph and allowed nodes and relationships to be indexed under a <em>key:value</em> pair. From the perspective of the REST interface, <a href="http://docs.neo4j.org/chunked/stable/rest-api-indexes.html">most things called "index"</a> will still refer to these legacy indexes. Specifically with py2neo, <a href="http://nigelsmall.com/py2neo/indexes/">any operation that contains the word "index"</a> that is not part of the "schema" object, will refer to legacy indexes.</p>

<p>Legacy indexes also provide full text search capabilities. This is something not (yet) provided by schema indexes so is one of the few reasons for sticking with legacy indexes in Neo4j 2.0<a href="#thanks-luanne">*</a>.</small></p>

<p>Note: Legacy indexes were generally used as pointers to start nodes for a query; they provided no ability to speed up queries.</p>

<h2>Schema Indexes</h2>

<p>Neo4j 2.0 introduced <a href="http://docs.neo4j.org/chunked/stable/graphdb-neo4j-labels.html">labels</a>. Labels can be used for path matching and - along with properties - are used as the basis for <a href="http://docs.neo4j.org/chunked/stable/graphdb-neo4j-schema.html#graphdb-neo4j-schema-indexes">schema indexes</a> and <a href="http://docs.neo4j.org/chunked/stable/graphdb-neo4j-schema.html#graphdb-neo4j-schema-constraints">uniqueness constraints</a>. <strong>Schema indexes can speed up queries</strong>, unlike legacy indexes.</p>

<p>Note: <strong>Only schema indexes are aware of labels; legacy indexes are completely and utterly unaware of labels.</strong></p>

<p>Further Note: Schema indexes are also <strong>only available for nodes</strong> whereas legacy indexes allowed relationships to be indexed as well. The use cases for relationship indexing were few and could generally be worked around by introducing extra nodes.</p>

<h2>So which should I use?</h2>

<p>If you are using Neo4j 2.0 or above and do not have to support legacy code from a pre-2.0 era, use only schema indexes and avoid legacy indexes. Conversely, if you are stuck with an earlier version of Neo4j and are unable to upgrade, you only have one type of index available to you anyway.</p>

<p>If you need full text indexing, regardless of server version, you will need to use legacy indexes.</p>

<p>The more complicated scenarios are those that involve a period of transition from one type of index to another. In these cases, make sure you are fully aware of the differences and try, wherever possible, to use either schema or legacy indexes but not both. Mixing the two will often lead to more confusion.</p>

<p>And if in doubt, ask a question on the <a href="https://groups.google.com/forum/#!forum/neo4j">Neo4j mailing list</a>.</p>

<hr>

<p><small id="thanks-luanne" style="color:#888">* Hat tip to <a href="http://twitter.com/luannem">Luanne</a> for reminding me to include this!</small></p>

</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
