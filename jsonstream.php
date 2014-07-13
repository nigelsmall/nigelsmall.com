<!DOCTYPE html>

<html lang="en">
<head>
<?php require '_head.php' ?>
<title>JSONStream - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<aside><a href="https://github.com/nigelsmall/jsonstream">JSONStream on GitHub</a>.</aside>

<h1>JSONStream</h1>

<p>JSONStream is a <a href="http://json.org">JSON</a> parser for Python that
can incrementally parse large JSON documents without needing to load the entire
document content into memory.
</p>
<p>The main routine scans a stream of data in a forward-only manner, yielding
each value as it is encountered along with the position of that value within
the overall document. Placeholder values for arrays and objects are also
yielded.
</p>
<p>The python programme below shows an example document and the code used to
iterate through the values it contains. The <code>JSONStream</code> constructor
can accept any iterable data source.
</p>
<pre><code class="python">from jsonstream import JSONStream

document = """\
{
    "people": [
        {
            "name": "Alice",
            "age": 33,
            "married": true
        },
        {
            "name": "Bob",
            "age": 44,
            "married": true
        },
        {
            "name": "Carol",
            "age": 55,
            "married": false
        }
    ]
}
"""

for path, value in JSONStream(document):
    print(path, value)
</code></pre>

<p>The output produced is then as follows:
</p>
<pre><code>() {}
('people',) []
('people', 0) {}
('people', 0, 'name') Alice
('people', 0, 'age') 33
('people', 0, 'married') True
('people', 1) {}
('people', 1, 'name') Bob
('people', 1, 'age') 44
('people', 1, 'married') True
('people', 2) {}
('people', 2, 'name') Carol
('people', 2, 'age') 55
('people', 2, 'married') False
</code></pre>

<p>Each pair of values yielded consists of a path tuple and a value. The path
tuple holds a key representing the position within the overall data structure,
using integers as array indices and strings as dictionary keys. Therefore a
path tuple containing <code>('people', 2, 'name')</code> points to the
<code>people</code> element of the top-level object, followed by item 2
(zero-based) within an array at that location, finally followed by the
<code>name</code> element of the object within that. The value returned is
simply the value at the position within the lowest level array or object.
</p>
<p>Values can also be empty list or dictionary objects. These act as
placeholders for upcoming data structures and are used so that each nested
structure yields at least one pair.
</p>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
