<!DOCTYPE html>

<html lang="en">
<head>
<?php require '_meta.php' ?>
<?php require '_style.php' ?>
<title>Colour - Nigel Small</title>
</head>

<body>

<?php require '_header.php' ?>
<main>

<style>
.palette {
    position: relative;
    width: 576px;
    height: 640px;
    display: inline-block;
}
.light_on_dark { background-color: #000; color: #FFF }
.dark_on_light { background-color: #FFF; color: #000 }

.colour {
    position: absolute;
    display: inline-block;
    border: 0px solid #7F7F7F;
     -moz-border-radius: 60px;
    -webkit-border-radius: 60px;
    -khtml-border-radius: 60px;
    border-radius: 60px;
    display: table-cell;
    text-align: center;
    vertical-align: middle;
    font-family: serif;
    font-style: italic;
    font-size: 12px;
    font-weight: bold;
    cursor: pointer;
}
.light_on_dark .colour { border-color: #999; color: #000; }
.dark_on_light .colour { border-color: #666; color: #FFF; }
</style>

<h1>Colour</h1>

<h2>Basic Colour Terms</h2>
</ul>
<li>Black</li>
<li>White</li>
<li>Red</li>
<li>Green</li>
<li>Yellow</li>
<li>Blue</li>
<li>Brown</li>
<li>Grey</li>
<li>Orange</li>
<li>Purple</li>
<li>Pink</li>
<li>Azure</li>
</ul>

<h2>Additive Colour Wheel</h2>
<p>The additive colour wheel is built around the primary colours red, 
green and blue.
</p>
<div id="additive" class="palette light_on_dark"></div>

<h2>Subtractive Colour Wheel</h2>
<p>The additive colour wheel is built around the primary colours red, 
yellow and blue.
</p>
<div id="subtractive" class="palette dark_on_light"></div>

<script>

var isArray = function(x){return Object.prototype.toString.call(x)==="[object Array]"}
var setText = function(e,t){while(e.childNodes.length>1)e.removeChild(e.firstChild);e.appendChild(e.ownerDocument.createTextNode(t))}

var TAU = 6.283185307179586;

function drawBox(container, x, y, w, h, colour) {
    if (isArray(colour)) {
        var name = colour[0], colour = colour[1];
    } else {
        var name = "";
    }
    var d = document.createElement("div");
    d.setAttribute("class", "colour");
    d.style.left = x - (w / 2) + "px";
    d.style.top = y - (h / 2) + "px";
    d.style.width = w + "px";
    d.style.height = h + "px";
    d.style.backgroundColor = colour;
    d.style.lineHeight = (h - 1) + "px";
    setText(d,name);
    container.appendChild(d);
}

function drawPalette(container, palette, radius, size) {
    var cw = container.offsetWidth, ch = container.offsetHeight,
        cx = cw / 2, cy = ch / 2;
    var plen = palette.length;
    for (var i = 0; i < plen; i++) {
        var angle = (i - (plen / 4)) * TAU / plen;
        drawBox(container, cx + radius * Math.cos(angle), cy + radius * Math.sin(angle), size, size, palette[i]);
    }
}

var additive = document.getElementById("additive");
drawPalette(additive, [
    ["","#FFFFFF"]
], 0, 48);
drawPalette(additive, [
    "#FFBFBF", "#FFFFBF", "#BFFFBF", "#BFFFFF", "#BFBFFF", "#FFBFFF"
], 50, 48);
drawPalette(additive, [
    "#FF8080", "#FFC080", "#FFFF80", "#C0FF80", "#80FF80", "#80FFC0",
    "#80FFFF", "#80C0FF", "#8080FF", "#C080FF", "#FF80FF", "#FF80C0"
], 100, 48);
drawPalette(additive, [
    ["","#FF0000"], ["","#FF8000"], ["","#FFFF00"], ["","#80FF00"],
    "#00FF00", "#00FF80", "#00FFFF", "#0080FF",
    "#0000FF", "#8000FF", "#FF00FF", "#FF0080"
], 166, 80);
drawPalette(additive, [
    "#800000", "#804000", "#808000",
    "#408000", "#008000", "#008040",
    "#008080", "#004080", "#000080",
    "#400080", "#800080", "#800040"
], 232, 48);
drawPalette(additive, [
    "#400000", "#404000", "#004000", "#004040", "#000040", "#400040"
], 282, 48);

var subtractive = document.getElementById("subtractive");
drawPalette(subtractive, [
    ["", "#000000"]
], 0, 48);
drawPalette(subtractive, [
    "#30000C", "#381100", "#403500", "#00291B", "#002330", "#190030"
], 50, 48);
drawPalette(subtractive, [
    "#630019", ["","#6B0400"], "#732200", ["","#784400"], "#806A00", ["","#1A6900"],
    "#004F35", ["","#005756"], "#00435E", ["","#000A61"], "#320061", ["","#630056"]
], 100, 48);
drawPalette(subtractive, [
    ["red","#C40032"], ["vermillion","#D40700"], ["orange","#E34400"], ["amber","#F08800"], ["yellow","#FFD300"], ["chartreuse","#34CF00"],
    ["green","#009F6B"], ["cyan","#00ADAB"], ["blue","#0087BD"], ["indigo","#0013BF"], ["violet","#6400C2"], ["magenta","#C400AA"]
], 166, 80);
drawPalette(subtractive, [
    "#C4627B", "#D46E6A", "#E39472", "#F0BC78", "#FFE980", "#81CF68",
    "#509F85", "#57ADAC", "#5FA2BD", "#6069BF", "#9361C2", "#C462B7"
], 232, 48);
drawPalette(subtractive, [
    "#C493A0","","#E3BBAA","","#FFF4BF","",
    "#779F92","","#8EB0BD","","#AB92C2",""
], 282, 48);

</script>

</main>
<?php require '_footer.php' ?>
<?php require '_tracker.php' ?>

</body>
</html>
