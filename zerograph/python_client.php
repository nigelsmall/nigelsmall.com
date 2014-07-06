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

<h1>Zerograph Python Client</h1>

<div class="section" id="connecting-to-a-graph">
<h2>Connecting to a Graph<a class="headerlink" href="#connecting-to-a-graph" title="Permalink to this headline"></a></h2>
<p>To connect to a graph, use the <a class="reference internal" href="#zerograph.Graph.open" title="zerograph.Graph.open"><code class="xref py py-func docutils literal"><span class="pre">Graph.open()</span></code></a> method. If no arguments are
supplied to this method, defaults of <code class="docutils literal"><span class="pre">'localhost'</span></code> and <code class="docutils literal"><span class="pre">47470</span></code> are assumed.</p>
<div class="highlight-python"><div class="highlight"><pre><span class="gp">&gt;&gt;&gt; </span><span class="kn">from</span> <span class="nn">zerograph</span> <span class="kn">import</span> <span class="o">*</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">graph</span> <span class="o">=</span> <span class="n">Graph</span><span class="o">.</span><span class="n">open</span><span class="p">()</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">alice</span><span class="p">,</span> <span class="n">bob</span> <span class="o">=</span> <span class="n">graph</span><span class="o">.</span><span class="n">create</span><span class="p">(</span><span class="n">Node</span><span class="p">(</span><span class="n">name</span><span class="o">=</span><span class="s">&quot;Alice&quot;</span><span class="p">),</span> <span class="n">Node</span><span class="p">(</span><span class="n">name</span><span class="o">=</span><span class="s">&quot;Bob&quot;</span><span class="p">))</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">alice</span>
<span class="go">(118643 {&quot;name&quot;:&quot;Alice&quot;})</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">bob</span>
<span class="go">(118644 {&quot;name&quot;:&quot;Bob&quot;})</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">alice_bob</span><span class="p">,</span> <span class="o">=</span> <span class="n">graph</span><span class="o">.</span><span class="n">create</span><span class="p">(</span><span class="n">Relationship</span><span class="p">(</span><span class="n">alice</span><span class="p">,</span> <span class="s">&quot;KNOWS&quot;</span><span class="p">,</span> <span class="n">bob</span><span class="p">))</span>
<span class="gp">&gt;&gt;&gt; </span><span class="n">alice_bob</span>
<span class="go">(118643 {&quot;name&quot;:&quot;Alice&quot;})-[161512:KNOWS]-&gt;(118644 {&quot;name&quot;:&quot;Bob&quot;})</span>
</pre></div>
</div>
<dl class="class">
<dt id="zerograph.Graph">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Graph</code><big>(</big><em>host</em>, <em>port</em><big>)</big><a class="headerlink" href="#zerograph.Graph" title="Permalink to this definition"></a></dt>
<dd><p>A <cite>Graph</cite> instance holds a connection to a remote graph database
service.</p>
<dl class="method">
<dt id="zerograph.Graph.create">
<code class="descname">create</code><big>(</big><em>*entities</em><big>)</big><a class="headerlink" href="#zerograph.Graph.create" title="Permalink to this definition"></a></dt>
<dd><p>Create multiple remote entities.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.delete">
<code class="descname">delete</code><big>(</big><em>*entities</em><big>)</big><a class="headerlink" href="#zerograph.Graph.delete" title="Permalink to this definition"></a></dt>
<dd><p>Delete multiple remote entities.</p>
</dd></dl>

<dl class="classmethod">
<dt id="zerograph.Graph.drop">
<em class="property">classmethod </em><code class="descname">drop</code><big>(</big><em>host</em>, <em>port</em><big>)</big><a class="headerlink" href="#zerograph.Graph.drop" title="Permalink to this definition"></a></dt>
<dd><p>Close the graph database service on the host and port specified and
destroy the database behind it.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.execute">
<code class="descname">execute</code><big>(</big><em>query</em>, <em>*param_sets</em><big>)</big><a class="headerlink" href="#zerograph.Graph.execute" title="Permalink to this definition"></a></dt>
<dd><p>Execute a Cypher query, optionally multiple times with several
parameter sets.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Graph.host">
<code class="descname">host</code><a class="headerlink" href="#zerograph.Graph.host" title="Permalink to this definition"></a></dt>
<dd><p>The remote host name for this graph database service.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.node">
<code class="descname">node</code><big>(</big><em>node_id</em><big>)</big><a class="headerlink" href="#zerograph.Graph.node" title="Permalink to this definition"></a></dt>
<dd><p>Fetch a <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a> by internal ID.</p>
</dd></dl>

<dl class="classmethod">
<dt id="zerograph.Graph.open">
<em class="property">classmethod </em><code class="descname">open</code><big>(</big><em>host='localhost'</em>, <em>port=47470</em><big>)</big><a class="headerlink" href="#zerograph.Graph.open" title="Permalink to this definition"></a></dt>
<dd><p>Open a connection to a remote graph, creating a database on that
port if none is available.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Graph.port">
<code class="descname">port</code><a class="headerlink" href="#zerograph.Graph.port" title="Permalink to this definition"></a></dt>
<dd><p>The remote port number for this graph database service.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.pull">
<code class="descname">pull</code><big>(</big><em>*entities</em><big>)</big><a class="headerlink" href="#zerograph.Graph.pull" title="Permalink to this definition"></a></dt>
<dd><p>Update multiple local entities from remote entities.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.push">
<code class="descname">push</code><big>(</big><em>*entities</em><big>)</big><a class="headerlink" href="#zerograph.Graph.push" title="Permalink to this definition"></a></dt>
<dd><p>Update multiple remote entities from local entities.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Graph.relationship">
<code class="descname">relationship</code><big>(</big><em>rel_id</em><big>)</big><a class="headerlink" href="#zerograph.Graph.relationship" title="Permalink to this definition"></a></dt>
<dd><p>Fetch a <a class="reference internal" href="#zerograph.Relationship" title="zerograph.Relationship"><code class="xref py py-class docutils literal"><span class="pre">Relationship</span></code></a> by internal ID.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Graph.zerograph">
<code class="descname">zerograph</code><a class="headerlink" href="#zerograph.Graph.zerograph" title="Permalink to this definition"></a></dt>
<dd><p>The graph database service running on port 47470 associated with
this graph.</p>
</dd></dl>

</dd></dl>

</div>
<div class="section" id="nodes-rels-paths-more">
<h2>Nodes, Rels, Paths &amp; more<a class="headerlink" href="#nodes-rels-paths-more" title="Permalink to this headline"></a></h2>
<p>Graph database entities are primarily represented using the <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a>,
<a class="reference internal" href="#zerograph.Rel" title="zerograph.Rel"><code class="xref py py-class docutils literal"><span class="pre">Rel</span></code></a> and <a class="reference internal" href="#zerograph.Path" title="zerograph.Path"><code class="xref py py-class docutils literal"><span class="pre">Path</span></code></a> classes.</p>
<dl class="class">
<dt id="zerograph.Node">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Node</code><big>(</big><em>*labels</em>, <em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Node" title="Permalink to this definition"></a></dt>
<dd><p>A local representation of a Neo4j graph node that may be bound to a
node in a remote graph database.</p>
<dl class="attribute">
<dt id="zerograph.Node.bound">
<code class="descname">bound</code><a class="headerlink" href="#zerograph.Node.bound" title="Permalink to this definition"></a></dt>
<dd><p>Returns <code class="xref py py-const docutils literal"><span class="pre">True</span></code> if bound to a remote graph database.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Node.cypher_id">
<code class="descname">cypher_id</code><a class="headerlink" href="#zerograph.Node.cypher_id" title="Permalink to this definition"></a></dt>
<dd><p>A unique ID used in Cypher queries.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Node.exists">
<code class="descname">exists</code><a class="headerlink" href="#zerograph.Node.exists" title="Permalink to this definition"></a></dt>
<dd><p>Returns <code class="xref py py-const docutils literal"><span class="pre">True</span></code> if the entity to which this is bound exists
in the remote graph database.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Node.graph">
<code class="descname">graph</code><a class="headerlink" href="#zerograph.Node.graph" title="Permalink to this definition"></a></dt>
<dd><p>Returns the <a class="reference internal" href="#zerograph.Graph" title="zerograph.Graph"><code class="xref py py-class docutils literal"><span class="pre">Graph</span></code></a> to which this is bound.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Node.labels">
<code class="descname">labels</code><a class="headerlink" href="#zerograph.Node.labels" title="Permalink to this definition"></a></dt>
<dd><p>The set of text labels applied to this Node.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Node.properties">
<code class="descname">properties</code><a class="headerlink" href="#zerograph.Node.properties" title="Permalink to this definition"></a></dt>
<dd><p>The set of properties attached to this object.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.pull">
<code class="descname">pull</code><big>(</big><big>)</big><a class="headerlink" href="#zerograph.Node.pull" title="Permalink to this definition"></a></dt>
<dd><p>Update local node from remote node.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.push">
<code class="descname">push</code><big>(</big><big>)</big><a class="headerlink" href="#zerograph.Node.push" title="Permalink to this definition"></a></dt>
<dd><p>Update remote node from local node.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.replace">
<code class="descname">replace</code><big>(</big><em>*labels</em>, <em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Node.replace" title="Permalink to this definition"></a></dt>
<dd><p>Replace the labels and properties on this <code class="docutils literal"><span class="pre">Node</span></code> with those
provided.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.to_cypher">
<code class="descname">to_cypher</code><big>(</big><em>**kwargs</em><big>)</big><a class="headerlink" href="#zerograph.Node.to_cypher" title="Permalink to this definition"></a></dt>
<dd><p>Return a Cypher representation of this node.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.to_geoff">
<code class="descname">to_geoff</code><big>(</big><big>)</big><a class="headerlink" href="#zerograph.Node.to_geoff" title="Permalink to this definition"></a></dt>
<dd><p>Return a Geoff representation of this node.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Node.to_yaml">
<code class="descname">to_yaml</code><big>(</big><em>dumper</em>, <em>data</em><big>)</big><a class="headerlink" href="#zerograph.Node.to_yaml" title="Permalink to this definition"></a></dt>
<dd><p>Convert a Python object to a representation node.</p>
</dd></dl>

</dd></dl>

<dl class="class">
<dt id="zerograph.Rel">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Rel</code><big>(</big><em>type</em>, <em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Rel" title="Permalink to this definition"></a></dt>
<dd><p>A local representation of the type and properties of a Neo4j graph
relationship that may be bound to a relationship in a remote graph
database. A <code class="docutils literal"><span class="pre">Rel</span></code> does not hold information on its start or end nodes,
a <a class="reference internal" href="#zerograph.Relationship" title="zerograph.Relationship"><code class="xref py py-class docutils literal"><span class="pre">Relationship</span></code></a> is used for that instead.</p>
<dl class="attribute">
<dt id="zerograph.Rel.bound">
<code class="descname">bound</code><a class="headerlink" href="#zerograph.Rel.bound" title="Permalink to this definition"></a></dt>
<dd><p>Returns <code class="xref py py-const docutils literal"><span class="pre">True</span></code> if bound to a remote graph database.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Rel.cypher_id">
<code class="descname">cypher_id</code><a class="headerlink" href="#zerograph.Rel.cypher_id" title="Permalink to this definition"></a></dt>
<dd><p>A unique ID used in Cypher queries.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Rel.graph">
<code class="descname">graph</code><a class="headerlink" href="#zerograph.Rel.graph" title="Permalink to this definition"></a></dt>
<dd><p>Returns the <a class="reference internal" href="#zerograph.Graph" title="zerograph.Graph"><code class="xref py py-class docutils literal"><span class="pre">Graph</span></code></a> to which this is bound.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Rel.properties">
<code class="descname">properties</code><a class="headerlink" href="#zerograph.Rel.properties" title="Permalink to this definition"></a></dt>
<dd><p>The set of properties attached to this object.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Rel.replace">
<code class="descname">replace</code><big>(</big><em>*type_</em>, <em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Rel.replace" title="Permalink to this definition"></a></dt>
<dd><p>Replace the properties on this <code class="docutils literal"><span class="pre">Rel</span></code> with those provided.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Rel.to_yaml">
<code class="descname">to_yaml</code><big>(</big><em>dumper</em>, <em>data</em><big>)</big><a class="headerlink" href="#zerograph.Rel.to_yaml" title="Permalink to this definition"></a></dt>
<dd><p>Convert a Python object to a representation node.</p>
</dd></dl>

</dd></dl>

<dl class="class">
<dt id="zerograph.Rev">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Rev</code><big>(</big><em>type</em>, <em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Rev" title="Permalink to this definition"></a></dt>
<dd></dd></dl>

<dl class="class">
<dt id="zerograph.Path">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Path</code><big>(</big><em>node</em>, <em>*rels_and_nodes</em><big>)</big><a class="headerlink" href="#zerograph.Path" title="Permalink to this definition"></a></dt>
<dd><p>An alternating chain of <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a> and <a class="reference internal" href="#zerograph.Rel" title="zerograph.Rel"><code class="xref py py-class docutils literal"><span class="pre">Rel</span></code></a> objects.</p>
<dl class="attribute">
<dt id="zerograph.Path.end_node">
<code class="descname">end_node</code><a class="headerlink" href="#zerograph.Path.end_node" title="Permalink to this definition"></a></dt>
<dd><p>The last <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a> in this path.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Path.nodes">
<code class="descname">nodes</code><a class="headerlink" href="#zerograph.Path.nodes" title="Permalink to this definition"></a></dt>
<dd><p>Tuple of all <code class="docutils literal"><span class="pre">Nodes</span></code> in this path.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Path.rels">
<code class="descname">rels</code><a class="headerlink" href="#zerograph.Path.rels" title="Permalink to this definition"></a></dt>
<dd><p>Tuple of all <code class="docutils literal"><span class="pre">Rels</span></code> in this path.</p>
</dd></dl>

<dl class="attribute">
<dt id="zerograph.Path.start_node">
<code class="descname">start_node</code><a class="headerlink" href="#zerograph.Path.start_node" title="Permalink to this definition"></a></dt>
<dd><p>The first <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a> in this path.</p>
</dd></dl>

</dd></dl>

<dl class="class">
<dt id="zerograph.Relationship">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Relationship</code><big>(</big><em>start_node</em>, <em>rel</em>, <em>end_node</em><big>)</big><a class="headerlink" href="#zerograph.Relationship" title="Permalink to this definition"></a></dt>
<dd><p>A <a class="reference internal" href="#zerograph.Path" title="zerograph.Path"><code class="xref py py-class docutils literal"><span class="pre">Path</span></code></a> segment consisting of two <a class="reference internal" href="#zerograph.Node" title="zerograph.Node"><code class="xref py py-class docutils literal"><span class="pre">Node</span></code></a> objects and one
<a class="reference internal" href="#zerograph.Rel" title="zerograph.Rel"><code class="xref py py-class docutils literal"><span class="pre">Rel</span></code></a> object; this is analogous to a Neo4j Relationship.</p>
<dl class="attribute">
<dt id="zerograph.Relationship.cypher_id">
<code class="descname">cypher_id</code><a class="headerlink" href="#zerograph.Relationship.cypher_id" title="Permalink to this definition"></a></dt>
<dd><p>A unique ID used in Cypher queries.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.Relationship.replace">
<code class="descname">replace</code><big>(</big><em>**properties</em><big>)</big><a class="headerlink" href="#zerograph.Relationship.replace" title="Permalink to this definition"></a></dt>
<dd><p>Replace the properties on this Relationship with those provided.</p>
</dd></dl>

</dd></dl>

</div>
<div class="section" id="batches">
<h2>Batches<a class="headerlink" href="#batches" title="Permalink to this headline"></a></h2>
<dl class="class">
<dt id="zerograph.Batch">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Batch</code><big>(</big><em>graph</em><big>)</big><a class="headerlink" href="#zerograph.Batch" title="Permalink to this definition"></a></dt>
<dd><dl class="method">
<dt id="zerograph.Batch.append">
<code class="descname">append</code><big>(</big><em>method</em>, <em>resource</em>, <em>**args</em><big>)</big><a class="headerlink" href="#zerograph.Batch.append" title="Permalink to this definition"></a></dt>
<dd><p>Append a request.</p>
</dd></dl>

<dl class="classmethod">
<dt id="zerograph.Batch.single">
<em class="property">classmethod </em><code class="descname">single</code><big>(</big><em>graph</em>, <em>method</em>, <em>*args</em>, <em>**kwargs</em><big>)</big><a class="headerlink" href="#zerograph.Batch.single" title="Permalink to this definition"></a></dt>
<dd><p>Execute a single request.</p>
</dd></dl>

</dd></dl>

<dl class="class">
<dt id="zerograph.Pointer">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">Pointer</code><big>(</big><em>attributes</em><big>)</big><a class="headerlink" href="#zerograph.Pointer" title="Permalink to this definition"></a></dt>
<dd></dd></dl>

<dl class="class">
<dt id="zerograph.BatchPull">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">BatchPull</code><big>(</big><em>graph</em><big>)</big><a class="headerlink" href="#zerograph.BatchPull" title="Permalink to this definition"></a></dt>
<dd><dl class="method">
<dt id="zerograph.BatchPull.add">
<code class="descname">add</code><big>(</big><em>entity</em><big>)</big><a class="headerlink" href="#zerograph.BatchPull.add" title="Permalink to this definition"></a></dt>
<dd><p>Add an entity to the set of entities to be pulled.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.BatchPull.remove">
<code class="descname">remove</code><big>(</big><em>entity</em><big>)</big><a class="headerlink" href="#zerograph.BatchPull.remove" title="Permalink to this definition"></a></dt>
<dd><p>Remove an entity from the set of entities to be pulled.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.BatchPull.submit">
<code class="descname">submit</code><big>(</big><big>)</big><a class="headerlink" href="#zerograph.BatchPull.submit" title="Permalink to this definition"></a></dt>
<dd><p>Submit the batch to update all local entities.</p>
</dd></dl>

</dd></dl>

<dl class="class">
<dt id="zerograph.BatchPush">
<em class="property">class </em><code class="descclassname">zerograph.</code><code class="descname">BatchPush</code><big>(</big><em>graph</em><big>)</big><a class="headerlink" href="#zerograph.BatchPush" title="Permalink to this definition"></a></dt>
<dd><dl class="method">
<dt id="zerograph.BatchPush.add">
<code class="descname">add</code><big>(</big><em>entity</em><big>)</big><a class="headerlink" href="#zerograph.BatchPush.add" title="Permalink to this definition"></a></dt>
<dd><p>Add an entity to the set of entities to be pushed.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.BatchPush.remove">
<code class="descname">remove</code><big>(</big><em>entity</em><big>)</big><a class="headerlink" href="#zerograph.BatchPush.remove" title="Permalink to this definition"></a></dt>
<dd><p>Remove an entity from the set of entities to be pushed.</p>
</dd></dl>

<dl class="method">
<dt id="zerograph.BatchPush.submit">
<code class="descname">submit</code><big>(</big><big>)</big><a class="headerlink" href="#zerograph.BatchPush.submit" title="Permalink to this definition"></a></dt>
<dd><p>Submit the batch to update all remote entities.</p>
</dd></dl>

</dd></dl>

</div>
</div>


</main>
<?php require '../_footer.php' ?>
<?php require '../_tracker.php' ?>

</body>
</html>
