<!DOCTYPE html>
<html lang="en">

<head>
<?php require '_head.php' ?>
<title>Geoff - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<aside>Why "Geoff"? Geoff is a contrived acronym for <em>Graph Entity Offline File Format</em>.
More importantly, it was the name of my grandfather who gave me my first
computer, a <a href="http://en.wikipedia.org/wiki/Dragon_32/64">Dragon 32</a>, in 1983.
</aside>

<h1>Geoff</h1>

<p>Geoff is a text-based interchange format for <a href="http://neo4j.org/">Neo4j</a> graph data that should be
instantly readable to anyone familiar with
<a href="http://www.neo4j.org/learn/cypher">Cypher</a>, on which its syntax is based.</p>


<h2 id="implementations">Implementation</h2>

<aside>An earlier server plugin, <a href="https://github.com/neo4j-contrib/neo4j-geoff">neo4j-geoff</a>,
is also compatible with Neo4j 2.0 (thanks to generous assistance from
<a href="https://twitter.com/peterneubauer">Peter Neubauer</a>) but does not
provide support for labels, unlike load2neo.
</aside>

<p>The reference Geoff parser implementation is a Neo4j server extension called
<a href="load2neo">load2neo</a>. This works with Neo4j 2.0 and upwards and is
incompatible with earlier versions.
</p>

<p>A client side parser-loader also exists within
<a href="http://book.py2neo.org/en/latest/geoff/">py2neo</a>.
This has no label support and, due to its use of the REST API, is somewhat
less scalable than the server extensions. A demo of the XML to Geoff
conversion tool, distributed with py2neo, can be seen at <a href="http://api.nigelsmall.com/xml-geoff">http://api.nigelsmall.com/xml-geoff</a>.</p>

<h2 id="syntax">Syntax</h2>

<p>A Geoff document is composed of one or more subgraphs, each of which contains one or more paths made up from alternating nodes and relationships. For example:</p>

<pre><code class="language-geoff">(alice {"name":"Alice"})
(bob {"name":"Bob"})
(carol {"name":"Carol"})
(alice)&lt;-[:KNOWS]-&gt;(bob)&lt;-[:KNOWS]-&gt;(carol)&lt;-[:KNOWS]-&gt;(alice)
</code></pre>

<p>Multiple subgraphs may exist within a document and are separated by a sequence of four tildes: <code>~~~~</code>.</p>

<h3 id="nodes">Nodes</h3>

<p>Each node can have an identifier, a set of labels and a set of properties. None of these attributes are mandatory, and in the simplest case, a node may just be an empty set of parentheses: <code>()</code>. Node identifiers are local only to that subgraph and may be reused without overlap in other subgraphs, even in the same document. Identifiers are not carried over into Neo4j on a load operation.

<p>The examples below show some of the combinations possible:</p>

<pre><code class="language-geoff">(a)                          /* a simple named node */
(b {"name":"Bob"})           /* a node with one property */
(cat:Animal)                 /* a node with one label and no properties */
(dog:Animal {"name":"dog"})  /* a node with both label and property */
(dinner:Spam:Egg:Chips {"foo":"bar","answer":42})  /* several of each */
</code></pre>

<h3 id="properties">Properties</h3>

<aside>Geoff properties are represented using JSON, unlike Cypher properties which use the Cypher expression syntax. While these look similar, they are not the same.</aside>
<p>Properties are represented in JSON format and may be provided in single nodes, in longer paths or in both:</p>

<pre><code class="language-geoff">(alice {"name":"Alice"})
(bob {"name":"Bob"})
(alice {"age":33})<-[:KNOWS]->(bob {"age":44})
</code></pre>

<h3 id="relationships">Relationships</h3>

<p>Relationships are drawn using ASCII art and look very similar to those in Cypher. These contain a type and optional properties and may point forwards, backwards or in both directions; undirected relationships are not permitted. When loaded, two-way relationships will create two unidirectional relationships, both containing any properties specified.</p>

<p>Some relationship examples are below:</p>

<pre><code class="language-geoff">(alice)-[:KNOWS]->(bob)
(alice)-[:KNOWS {"since":1999}]->(bob)
(alice)&lt;-[:KNOWS {"since":1999}]-(bob)
(alice)&lt;-[:KNOWS {"since":1999}]-&gt;(bob)
</code></pre>

<p>Relationships may be listed separately or chained together to form longer paths, such as:</p>

<pre><code class="language-geoff">(a {"name":"Alice"})&lt;-[:KNOWS]-&gt;(b {"name":"Bob"})&lt;-[:KNOWS]-&gt;(c {"name":"Carol"})&lt;-[:KNOWS]-&gt;(a)&nbsp;
</code></pre>

<h2 id="uniqueness">Uniqueness</h2>

<p>Nodes and relationships can also be designated as unique. This means that when they are loaded, a check is done for existing nodes or relationships and a new one is only created if no such entity is found. Uniqueness is denotated by an exclamation mark immediately following a node label or relationship type which may itself also be followed by a property key name.</p>

<h3>Unique Node by Label and Property</h3>
<pre>(alice:Person<strong style="color:#FF3">!name</strong> {"name":"Alice","age":33})</pre>
<p>On load, if a <em>Person</em> node exists with a <em>name</em> property value of "Alice", then update that node's properties. Otherwise, create a new node with the properties specified.</p>

<h3>Unique Relationship by Type</h3>
<pre>(alice)-[:KNOWS<strong style="color:#FF3">!</strong> {"since":1999}]->(bob)</pre>
<p>On load, if a <em>KNOWS</em> relationship exists between <em>alice</em> and <em>bob</em>, then update its properties. Otherwise, create it.</p>

<h3>Unique Relationship by Type and Property</h3>
<pre>(alice)-[:KNOWS<strong style="color:#FF3">!since</strong> {"since":1999}]->(bob)</pre>
<p>On load, if a <em>KNOWS</em> relationship exists between <em>alice</em> and <em>bob</em> with a <em>since</em> property value of 1999, then update its properties. Otherwise, create it.</p>

<h2 id="spec">Full Syntax Specification</h2>

<p>A full specification for the Geoff syntax is described below:</p>

<pre>
document       := subgraph (_ boundary _ subgraph)*
boundary       := "~~~~"

subgraph       := [element (_ element)*]
element        := comment | hook | path

comment        := "/*" &lt;&lt;any text excluding sequence "*/"&gt;&gt; "*/"

hook           := ":" ~ label [~ ":" ~ key] ~ ":" "=&gt;" node

path           := node (forward_path | reverse_path | two_way_path)*
forward_path   := "-" relationship "-&gt;" node
reverse_path   := "&lt;-" relationship "-" node
two_way_path   := "&lt;-" relationship "-&gt;" node

node           := named_node | anonymous_node
named_node     := "(" ~ node_name [label_list] [_ property_map] ~ ")"
anonymous_node := "(" ~ [label_list] [_ property_map] ~ ")"
relationship   := "[" ~ ":" type ["!" [key]] [_ property_map] ~ "]"
label_list     := ":" label ["!" key] (":" label)*
label          := name | JSON_STRING
property_map   := "{" ~ [key_value (~ "," ~ key_value)* ~] "}"
node_name      := name | JSON_STRING
name           := (ALPHA | DIGIT | "_")+
type           := name | JSON_STRING
key_value      := key ~ ":" ~ value
key            := name | JSON_STRING
value          := array | JSON_STRING | JSON_NUMBER | JSON_BOOLEAN | JSON_NULL

array          := empty_array | string_array | numeric_array | boolean_array
empty_array    := "[" ~ "]"
string_array   := "[" ~ JSON_STRING (~ "," ~ JSON_STRING)* ~ "]"
numeric_array  := "[" ~ JSON_NUMBER (~ "," ~ JSON_NUMBER)* ~ "]"
boolean_array  := "[" ~ JSON_BOOLEAN (~ "," ~ JSON_BOOLEAN)* ~ "]"

* Mandatory whitespace is represented by "_" and optional whitespace by "~"
</pre>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
