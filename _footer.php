<footer>

<style>
table.iconic {border-collapse:collapse}
table.iconic td {width:12px}
table.iconic td.icon {background-color:transparent;width:69px;height:69px;}
table.iconic a {text-decoration:none}
table.iconic a img {border:0;margin:0;vertical-align:bottom;-moz-border-radius:5px;border-radius:5px;-moz-box-shadow:2px 2px 5px #848480;-webkit-box-shadow:2px 2px 5px #848480;box-shadow:2px 2px 5px #848480}

table.palette {border-collapse:collapse;margin:0}
table.palette td {width:20px;height:6px}
table.palette .azure {background-color:cyan}
table.palette .black {background-color:#333333}
table.palette .blue {background-color:#0D4D88}
table.palette .brown {background-color:brown}
table.palette .green {background-color:#0D884D}
table.palette .grey {background-color:#808080}
table.palette .orange {background-color:orange}
table.palette .pink {background-color:pink}
table.palette .purple {background-color:purple}
table.palette .red {background-color:red}
table.palette .white {background-color:#FFFFFF}
table.palette .yellow {background-color:yellow}
</style>

<table class="iconic" cellpadding="0" cellspacing="0">
  <tr>
    <td class="icon"><a href="http://neo4j.org"><img border=0 src="/img/69/neo4j.png"></a></td>
    <td></td>
    <td class="icon"><a href="http://python.org"><img border=0 src="/img/69/python.png"></a></td>
    <td></td>
    <td class="icon"><a href="http://debian.org"><img src="/img/69/debian.png"></a></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
    <td></td>
    <td class="icon"></td>
  </tr>
</table>

<br>

<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons Licence" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br>
This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.

<!--br><br>

<center><table class="palette"><tr>
    <td class="black"></td>
    <td class="red"></td>
    <td class="green"></td>
    <td class="yellow"></td>
    <td class="blue"></td>
    <td class="brown"></td>
    <td class="grey"></td>
    <td class="orange"></td>
    <td class="purple"></td>
    <td class="pink"></td>
    <td class="azure"></td>
    <td class="white"></td>
</tr></table></center-->

</footer>

<style>
a h1 {color:#444440} a:hover h1 {color:rgb(13,136,76)}
a h2 {color:#444440} a:hover h2 {color:rgb(13,136,76)}
a h3 {color:#444440} a:hover h3 {color:rgb(13,136,76)}
a h4 {color:#444440} a:hover h4 {color:rgb(13,136,76)}
a h5 {color:#444440} a:hover h5 {color:rgb(13,136,76)}
a h6 {color:#444440} a:hover h6 {color:rgb(13,136,76)}
</style>

<script>
(function(){

    function wrap(el, wrapping) {
        var child = wrapping.cloneNode(true);

        // Cache the current parent and sibling.
        var parent  = el.parentNode;
        var sibling = el.nextSibling;

        // Wrap the element (is automatically removed from its current
        // parent).
        child.appendChild(el);

        // If the element had a sibling, insert the wrapper before
        // the sibling to maintain the HTML structure; otherwise, just
        // append it to the parent.
        if (sibling) {
            parent.insertBefore(child, sibling);
        } else {
            parent.appendChild(child);
        }
    }

    
    function permalinkHeadings(tag) {
        var headings = document.getElementsByTagName(tag);
        for (var i = 0; i < headings.length; i++) {
            var id = headings[i].id;
            if (id !== "") {
                var a = document.createElement("a");
                a.setAttribute("href", document.location.href + "#" + id);
                wrap(headings[i], a);
            }
        }
    }
    
    permalinkHeadings("h1");
    permalinkHeadings("h2");
    permalinkHeadings("h3");
    permalinkHeadings("h4");
    permalinkHeadings("h5");
    permalinkHeadings("h6");

}())
</script>

