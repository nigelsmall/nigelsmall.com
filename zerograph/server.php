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

<h1>Zerograph Server</h1>

<p>The Zerograph server can operate a number of concurrent graph database services
across a range of ports but the default service listens on port 47470. This
service must be maintained to keep any others alive although others may be
spawned and dropped as required. On server startup, all pre-existing services
will be restarted on their respective ports.</p>
<p>To run the server:</p>
<div><div><pre>$ gradle run
</pre></div>
</div>
<p>If running as root, the databases created will be stored in <code>/var/zerograph</code>
by default. For other users, the <code>$HOME/.zerograph</code> directory will be used.
These defaults can be overridden using the <code>ZEROGRAPH_HOME</code> environment
variable.</p>
<p>A big benefit of the ZeroMQ infrastructure is a reduced impact to client
applications when server disruption occurs. When a client submits a request,
the server may or may not be available. If unavailable, the request will be
queued automatically until the server once again becomes available at which
point it will be processed as usual. No extra logic is required within the
client application to manage retries.</p>
<p>The Zerograph Application/Presentation Protocol (ZAPP) is used for all
communication between the client and the server. Details of this protocol can
be seen in the <a href="zapp.html">protocol specification document</a>.</p>

<h2 id="Resources">Resources</h2>
<p>The server exposes a number of resources, each of which provides a specific
set of functionality.</p>

<h3 id="Cypher">Cypher</h3>
<p>The <em>Cypher</em> resource provides an endpoint against which Cypher queries can be
executed.</p>
<dl class="function">
<dt>
<code class="descname">EXECUTE Cypher {&quot;query&quot;: …, &quot;params&quot;: …}</code></dt>
<dd><p>Execute a Cypher query with a set of named parameters.</p>
</dd></dl>

</div>

<h3 id="Graph">Graph</h3>
<p>The <em>Graph</em> resource represents a Neo4j graph database exposed as a Zerograph
service.</p>
<dl class="function">
<dt>
<code class="descname">GET Graph {&quot;host&quot;: …, &quot;port&quot;: …}</code></dt>
<dd><p>Fetch a representation of the specified graph database service, if such a
service exists.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">PATCH Graph {&quot;host&quot;: …, &quot;port&quot;: …}</code></dt>
<dd><p>Fetch a representation of the specified graph database service, creating a
new graph if none exists.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">DELETE Graph {&quot;host&quot;: …, &quot;port&quot;: …}</code></dt>
<dd><p>Drop the graph database instance bound to the port specified.</p>
</dd></dl>

</div>

<h3>Node</h3>
<p>The <em>Node</em> resource represents an individual Neo4j graph database node
identified by internal node ID.</p>
<dl class="function">
<dt>
<code class="descname">GET Node {&quot;id&quot;: …}</code></dt>
<dd><p>Fetch the node identified by id.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">SET Node {&quot;id&quot;: …, &quot;labels&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Replace the labels and properties on the node identified by id and return
the updated node.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">PATCH Node {&quot;id&quot;: …, &quot;labels&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Supplement the labels and properties on the node identified by id and return
the updated node.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">CREATE Node {&quot;labels&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Create and return a new node with the labels and properties specified.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">DELETE Node {&quot;id&quot;: …}</code></dt>
<dd><p>Delete the node identified by id.</p>
</dd></dl>

</div>

<h3>NodeSet</h3>
<p>The <em>NodeSet</em> resource represents a group of nodes that share a common label
and (optionally) property.</p>
<dl class="function">
<dt>
<code class="descname">GET NodeSet {&quot;label&quot;: …, &quot;key&quot;: …, &quot;value&quot;: …}</code></dt>
<dd><p>Fetch all nodes with the specified label, property key and property value.
If key is null or missing, only the label will be used for matching.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">PATCH NodeSet {&quot;label&quot;: …, &quot;key&quot;: …, &quot;value&quot;: …}</code></dt>
<dd><p>Create a node with the specified label and property if none exists. Return
all nodes with these criteria.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">DELETE NodeSet {&quot;label&quot;: …, &quot;key&quot;: …, &quot;value&quot;: …}</code></dt>
<dd><p>Delete all nodes with the specified label, property key and property value.
If key is null or missing, all nodes with that label will be deleted.</p>
</dd></dl>

</div>

<h3>Path</h3>
<p>...</p>
</div>

<h3>Rel</h3>
<p>The <em>Rel</em> resource represents an individual Neo4j graph database relationship
identified by internal relationship ID.</p>
<dl class="function">
<dt>
<code class="descname">GET Rel {&quot;id&quot;: …}</code></dt>
<dd><p>Fetch the path segment containing the relationship identified by <cite>id</cite>.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">SET Rel {&quot;id&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Replace the properties on the relationship identified by <cite>id</cite> and return the
path segment containing the updated relationship.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">PATCH Rel {&quot;id&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Supplement the properties on the relationship identified by <cite>id</cite> and return
the path segment containing the updated relationship.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">CREATE Rel {&quot;start&quot;: …, &quot;end&quot;: …, &quot;type&quot;: …, &quot;properties&quot;: …}</code></dt>
<dd><p>Create a new relationship with the type and properties specified and return
the surrounding path segment.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">DELETE Rel {&quot;id&quot;: …}</code></dt>
<dd><p>Delete the relationship identified by <cite>id</cite>.</p>
</dd></dl>

</div>

<h3>RelSet</h3>
<p>The <em>RelSet</em> resource represents a group of relationships that share common end
points and/or type.</p>
<dl class="function">
<dt>
<code class="descname">GET RelSet {&quot;start&quot;: …, &quot;end&quot;: …, &quot;type&quot;: …}</code></dt>
<dd><p>Fetch all path segments that contain relationships with the specified end
points and/or type. All criteria can be null or missing but at least one end
point must be provided.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">PATCH RelSet {&quot;start&quot;: …, &quot;end&quot;: …, &quot;type&quot;: …}</code></dt>
<dd><p>Ensure at least one relationship exists with the specified end points and
type and return all matching path segments. All criteria must be provided.</p>
</dd></dl>

<dl class="function">
<dt>
<code class="descname">DELETE RelSet {&quot;start&quot;: …, &quot;end&quot;: …, &quot;type&quot;: …}</code></dt>
<dd><p>Delete all path segments that contain relationships with the specified end
points and/or type. All criteria can be null or missing but at least one end
point must be provided.</p>
</dd></dl>

</div>

<h3>Zerograph</h3>
<p>The <em>Zerograph</em> resource represents the entire Zerograph server application and
can be used to retrieve details about the services available and system
variables.</p>
<dl class="function">
<dt>
<code class="descname">GET Zerograph {}</code></dt>
<dd><p>Fetch details of the Zerograph server application.</p>
</dd></dl>

</div>
</div>
</div>


</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
