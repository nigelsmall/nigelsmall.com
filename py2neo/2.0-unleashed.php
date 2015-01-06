<!DOCTYPE html>
<html lang="en">

<head>
<?php require '../_head.php' ?>
<title>Py2neo 2.0, Unleashed! - Nigel Small</title>
</head>

<body>

<?php require '../_header.php' ?>
<main>

<h1>Py2neo 2.0, Unleashed!</h1>

<p>It's been over three years since I first began work on <a href="https://github.com/nigelsmall/py2neo">py2neo</a>. If memory serves, the first version was written for Neo4j 1.3 and consisted of barely more than a few lines of hastily-thrown-together Python code. <a href="http://neo4j.com/">Neo4j</a> has obviously evolved considerably since then and now boasts <a href="http://neo4j.com/docs/stable/graphdb-neo4j-labels.html">labels</a>, a <a href="http://neo4j.com/docs/stable/graphdb-neo4j-schema.html">schema</a> and <a href="http://neo4j.com/docs/stable/query-transactions.html">Cypher transactions</a>. Actually, it also boasts Cypher as a core component - back in the day it was merely a plugin!</p>

<p>And so, inevitably, py2neo has to move on as well. I'd previously tacked on some of the new Neo4j 2.x series features but in doing so had introduced a bit more technical debt than I really wanted. A proper rewrite was needed. And so today (after quite a few months) I'm releasing <a href="http://py2neo.org/2.0">py2neo 2.0</a>. This brings with it a heavily refactored core, a cleaner API, better performance and a few new idioms.</p>

<p>So what's actually changed? Well, some old py2neo 1.6 code will run in 2.0 but not all of it - most code will require a tweak. But there are many benefits from upgrading to the new library so I'll highlight some of the big changes below...</p>


<h2>Naming</h2>

<p>The <strong>py2neo.neo4j</strong> namespace has been deprecated completely. That is: while it still exists, most references to it can simply be replaced by just <strong><a href="http://py2neo.org/2.0/essentials.html">py2neo</a></strong>. And <strong>GraphDatabaseService</strong> is now just known as <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Graph">Graph</a></strong>. So the code that was previously written as...</p>

<pre><code>from py2neo.neo4j import GraphDatabaseService
graph = GraphDatabaseService()
</code></pre>

<p>...can now be written as...</p>

<pre><code>from py2neo import Graph
graph = Graph()
</code></pre>

<p>That's a bit cleaner - I hope you'll agree :-)</p>

<p>Another namespace change is the introduction of <strong><a href="http://py2neo.org/2.0/legacy.html">py2neo.legacy</a></strong>. This contains legacy nodes (those without labels for pre-2.0 server versions), legacy batch classes (batches are now more specific) and legacy indexes (for clarity on indexes, look <a href="http://nigelsmall.com/neo4j/index-confusion">here</a>). You might need these bits and bobs if you have some existing code to port over but they can be ignored for anything new.</p>


<h2>Constructors</h2>

<p>The <strong><a href="http://py2neo.org/2.0/essentials.html#node">Node</a></strong> and <strong><a href="http://py2neo.org/2.0/essentials.html#relationship">Relationship</a></strong> constructors have now become a lot more useful but have changed their signatures completely; they are therefore <em>not</em> backward compatible. This shouldn't affect many apps as it would have been rare to construct a node directly by URI, but the equivalent of...</p>

<pre><code>node = Node("http://localhost:7474/db/data/node/1")
</code></pre>

<p>...is now...</p>

<pre><code>node = Node()
node.bind("http://localhost:7474/db/data/node/1")
</code></pre>

<p>This then leaves the constructor free to be used for passing in labels and properties. So, the <strong><a href="http://py2neo.org/2.0/essentials.html#node">Node</a></strong> class can now more comfortably serve as either a concrete or an abstract entity by having a <a href="http://py2neo.org/2.0/essentials.html#py2neo.Node.bind">bound</a> state.</p>

<p>The <strong><a href="http://py2neo.org/2.0/essentials.html#relationship">Relationship</a></strong> class has undergone a similar transformation and both <strong><a href="http://py2neo.org/2.0/essentials.html#node">Node</a></strong> and <strong><a href="http://py2neo.org/2.0/essentials.html#relationship">Relationship</a></strong> now expose a <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Node.cast">cast</a></strong> <em>classmethod</em> that replaces the <strong>node</strong> and <strong>rel</strong> functions in 1.6.</p>


<h2>Labels</h2>

<p><a href="http://neo4j.com/docs/stable/graphdb-neo4j-labels.html">Labels</a> are now (at last!) a first class feature of py2neo. Due to certain limitations in the REST interface, making this so wasn't straightforward until certain parts of the library's core had been rewritten. Now though, a node can be created <em>with</em> labels instead of having to add labels in a separate step:</p>

<pre><code>alice = Node("Person", name="Alice", email="alice@example.com")
bob = Node("Person", name="Bob", email="bob@mail.net")
graph.create(alice, bob)
</code></pre>

<p>Some other handy label-related functions have been introduced too:</p>

<p>Uniqueness constraints...</p>

<pre></code>graph.schema.create_uniqueness_constraint("Person", "email")
</code></pre>

<p>Merging nodes by label...</p>

<pre><code>graph.merge_one("Person", "email", "carol@somewhere.org")
</code></pre>

<p>Finding nodes by label...</p>

<pre><code>for person in graph.find("Person"):
    print(person)
</pre></code>


<h2><a href="https://en.wikipedia.org/wiki/List_of_Doctor_Dolittle_characters#The_Pushmi-pullyu">Push &amp; Pull</a></h2>

<p>One of the biggest changes in py2neo 2.0 is how data is synchorised between client and server. Previously, changes made to node properties (for instance) were sent instantly to the server. It therefore followed that changing several properties triggered several HTTP requests and this (obviously) didn't scale well.</p>

<p>So, in py2neo 2.0, data is only synchronised on an explicit <a href="http://py2neo.org/2.0/intro.html#pushing-pulling">pull or push</a>. This gives the application developer far more control over the HTTP requests that occur. This conversation can now even be monitored with the handy <strong><a href="http://py2neo.org/2.0/cookbook.html#monitoring-client-server-interaction">watch</a></strong> function.</a>


<h2>Cypher</h2>

<p>The story wouldn't of course be complete without mentioning Cypher. Py2neo 2.0 integrates <a href="http://py2neo.org/2.0/cypher.html">Cypher</a> in a much cleaner and more intuitive way and it all hinges on the new <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Graph.cypher">Graph.cypher</a></strong> attribute.</p> It's easy to <a href="http://py2neo.org/2.0/cypher.html#py2neo.cypher.CypherResource.execute">execute</a> a single statement...</p>

<pre><code>from py2neo import Graph
graph = Graph()
results = graph.cypher.execute("MATCH (n:Person) RETURN n")
</code></pre>

<p>...or just as easy to use a <a href="http://py2neo.org/2.0/cypher.html#transaction">transaction</a>...</p>

<pre><code>from py2neo import Graph

graph = Graph()
statement = "MERGE (n:Person {name:{N}}) RETURN n"

tx = graph.cypher.begin()

def add_names(*names):
    for name in names:
        tx.append(statement, {"N": name})
    tx.process()

add_names("Homer", "Marge", "Bart", "Lisa", "Maggie")
add_names("Peter", "Lois", "Chris", "Meg", "Stewie")

tx.commit()
</code></pre>


<h2>And the REST</h2>

<p>And that's it. Well... except for the <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Rel">Rel</a></strong>, <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Rev">Rev</a></strong> and <strong><a href="http://py2neo.org/2.0/essentials.html#py2neo.Path">Path</a></strong> classes, new <strong><a href="http://py2neo.org/2.0/server.html">server</a></strong> and <strong><a href="http://py2neo.org/2.0/store.html">store</a></strong> modules, a handful of <strong><a href="http://py2neo.org/2.0/batch.html">batch</a></strong> changes and a bunch of extensions and command line tools. The full set of documentation can be found <a href="http://py2neo.org/2.0/">here</a>, so have a browse, <a href="https://pypi.python.org/pypi/py2neo/2.0">download the package</a> and <a href="mailto:nigel@py2neo.org">get in touch</a> if you need any pointers.</p>

<p>I guess it's now time for me to start planning the next three years!</p>


</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
