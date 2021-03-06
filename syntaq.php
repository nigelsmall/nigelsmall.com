<!DOCTYPE html>
<html lang="en">

<head>
<?php require '_head.php' ?>
<title>Syntaq - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<h1>Syntaq</h1>

<p>Syntaq is a lightweight markup language based on (and backward 
compatible with) <a href="http://www.wikicreole.org/">Creole</a>. The 
aim of the Creole project has been to create a markup language that 
adopts the best practices of other markup languages and is both 
intuitive and internally consistent. The Syntaq project provides both 
a continuation of this work and a
<a href="https://github.com/nigelsmall/syntaq">reference parser</a>.</p>

<a name="cheatsheet"></a>
<h2>Cheat Sheet</h2>

<table>
  <tr>
    <th width="47%">Markup</th>
    <th width="6%"></th>
    <th width="47%">Output</th>
  </tr>
  <tr>
    <td>= Page Heading</td>
    <td>&rarr;</td>
    <td><h1 class="naked">Page Heading</h1></td>
  </tr>
  <tr>
    <td>== Section Heading</td>
    <td>&rarr;</td>
    <td><h2 class="naked">Section Heading</h2></td>
  </tr>
  <tr>
    <td>=== Section Subheading</td>
    <td>&rarr;</td>
    <td><h3 class="naked">Section Subheading</h3></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>//italics, emphasis//</td>
    <td>&rarr;</td>
    <td><em>italics, emphasis</em></td>
  </tr>
  <tr>
    <td>**bold, strong emphasis**</td>
    <td>&rarr;</td>
    <td><strong>bold, strong emphasis</strong></td>
  </tr>
  <tr>
    <td>sub,,script,,</td>
    <td>&rarr;</td>
    <td>sub<sub>script</sub></td>
  </tr>
  <tr>
    <td>super^^script^^</td>
    <td>&rarr;</td>
    <td>super<sup>script</sup></td>
  </tr>
  <tr>
    <td>""inline quotation""</td>
    <td>&rarr;</td>
    <td><q>inline quotation</q></td>
  </tr>
  <tr>
    <td>``computer(code)``</td>
    <td>&rarr;</td>
    <td><code>computer(code)</code></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>"""<br>Block quotes can be included<br>within triple double-quotes!<br>"""</td>
    <td>&rarr;</td>
    <td><blockquote>Block quotes can be included within triple double-quotes!</blockquote></td>
  </tr>
  <tr>
    <td>```<br># block of computer code<br>def hello():<br>&nbsp;&nbsp;&nbsp;&nbsp;print("hello, world")<br>```</td>
    <td>&rarr;</td>
    <td><pre><code># block of computer code
def hello():
print("hello, world")</code></pre></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>[[http://w3.org/]]</td>
    <td>&rarr;</td>
    <td><a href="http://w3.org/">http://w3.org/</a></td>
  </tr>
  <tr>
    <td>[[http://w3.org/|W3C]]</td>
    <td>&rarr;</td>
    <td><a href="http://w3.org/">W3C</a></td>
  </tr>
  <tr>
    <td>{{w3c.png}}</td>
    <td>&rarr;</td>
    <td><img src="img/w3c.png"></td>
  </tr>
  <tr>
    <td>{{w3c.png|W3C}}</td>
    <td>&rarr;</td>
    <td><img src="img/w3c.png" title="W3C"></td>
  </tr>
  <tr>
    <td>[[http://w3.org/|{{w3c.png}}]]</td>
    <td>&rarr;</td>
    <td><a href="http://w3.org/"><img src="img/w3c.png"></a></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>* unordered list<br>* with<br>** sub-items</td>
    <td>&rarr;</td>
    <td><ul class="nomargin"><li>unordered list</li><li>with</li><ul><li>sub-items</li></ul></ul></td>
  </tr>
  <tr>
    <td># ordered list<br># with<br>## sub-items</td>
    <td>&rarr;</td>
    <td><ol class="nomargin"><li>ordered list</li><li>with</li><ol><li>sub-items</li></ol></ol></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>line breaks\\can be forced</td>
    <td>&rarr;</td>
    <td>line breaks<br>can be forced</td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>Paragraphs have blank<br>lines between them.<br><br>Just like this.</td>
    <td>&rarr;</td>
    <td><p>Paragraphs have blank<br>lines between them.</p><p>Just like this.</p></td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>above the horizontal rule<br>----<br>below the horizontal rule</td>
    <td>&rarr;</td>
    <td>above the horizontal rule<hr>below the horizontal rule</td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>|=Table|=Header|<br>|table|row|<br>|left&nbsp;&nbsp;&nbsp;&nbsp;|aligned&nbsp;&nbsp;|<br>|&nbsp;centre&nbsp;|&nbsp;aligned&nbsp;|<br>|&nbsp;&nbsp;&nbsp;right|&nbsp;&nbsp;aligned|</td>
    <td>&rarr;</td>
    <td>
      <table>
        <tr><th>Table</th><th>Header</th></tr>
        <tr><td>table</td><td>row</td></tr>
        <tr><td align="left">left</td><td align="left">aligned</td></tr>
        <tr><td align="center">centre</td><td align="center">aligned</td></tr>
        <tr><td align="right">right</td><td align="right">aligned</td></tr>
      </table>
    </td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
  <tr>
    <td>{{{<br>== [[Nowiki]]:<br>//**don't** format//<br>}}}</td>
    <td>&rarr;</td>
    <td>== [[Nowiki]]:<br>//**don't** format//</td>
  </tr>
  <tr><td colspan="3"><hr></td></tr>
</table>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
