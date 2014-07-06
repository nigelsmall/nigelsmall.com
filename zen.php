<!DOCTYPE html>

<html lang="en">
<head>
<?php require '_meta.php' ?>
<?php require '_style.php' ?>
<title>The Zen of Cypher - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main class="wide">

<h1>The Zen of Cypher</h1>

<ul>
<li>Write functions() in lower case, KEYWORDS in upper.</li>
<li><code>START</code> each keyword clause<br>
    <code>ON</code> a new line.
<li>Use either <code>camelCase</code> or <code>snake_case</code> for node identifiers but be consistent.</li>
<li>Relationship type names should use <code>UPPER_CASE_AND_UNDERSCORES</code>.</li>
<li>Label names should use <code>CamelCaseWithInitialCaps</code>.</li>
<li><code>MATCH (clauses)--&gt;(should)--&gt;(always)--&gt;(use)--&gt;(parentheses)--&gt;(around)--&gt;(nodes)</code></li>
<li>Backticks `cân éscape odd-ch@racter$ & keyw0rd$` but should be a code smell.</li>
<li>Don't put <code>(extra) --&gt; (whitespace) - [:IN] -&gt; (patterns)</code></li>
<li>Except for <code>(line)--&gt;<br>
    (breaks)</code></li>
<li>If you want to wrap patterns across multiple lines, break <code>(after)--&gt;<br>
    (arrows)</code> but <code>(not)<br>
    --&gt;(before)</code></li>
<li>Try to chain patterns together <code>(instead)-[:OF]-&gt;(repeating),</code><br>
    <code>(repeating)--&gt;(nodes)</code>
<li><code>(right)&lt;-[:TO]-(left)&lt;-[:FROM]-(patterns)&lt;--(write)&lt;-[:TO]-(try)</code></li>
</ul>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
