<?php
/*
1.the browser supports SVG
2.The user svg code is sanitized and doesn't include any scripts
3.make sure the viewBox of each svg fits thier dimentions for streching. 
to use js to calculate the width and hieght and save for each one.

TODO

/ add color control? ()
2. ,make the svg grow if content size changes, like adding a new row or line should strach the svg

/*

*
<!DOCTYPE html>
<html>
<head>
<style>
	div.fancy-container {
    position:relative;
    }
    .fancySVG {
    position: absolute; 
      top: 50%; 
      left: 50%; 
      transform: translate(-50%, -50%);
      z-index:0;
      
    
    }
    div.fancy-content {
    position: absolute; 
      top: 50%; 
      left: 50%; 
      transform: translate(-50%, -50%);
      z-index:1;
      
      
      
    }


    <svg width="100%" height="100%" preserveAspectRatio="none" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="yellow" />
</svg>


<svg width="100%" height="100%" viewBox="0 0 200 200" preserveAspectRatio="none">
  <polygon points="100,10 40,198 190,78 10,78 160,198"
           style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;" />
</svg>

//alien
<svg width="100%" height="100%" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8 16L3.54223 12.3383C1.93278 11.0162 1 9.04287 1 6.96005C1 3.11612 4.15607 0 8 0C11.8439 0 15 3.11612 15 6.96005C15 9.04287 14.0672 11.0162 12.4578 12.3383L8 16ZM3 6H5C6.10457 6 7 6.89543 7 8V9L3 7.5V6ZM11 6C9.89543 6 9 6.89543 9 8V9L13 7.5V6H11Z" fill="#000000"/>
</svg>

//MESSAGE
<svg 
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   width="100%"
   height="100%"
   viewBox="0 0 400 400.00001"
   id="svg2"
   version="1.1"
   inkscape:version="0.91 r13725"
   sodipodi:docname="bubble.svg"
   preserveAspectRatio="none">
  <defs
     id="defs4" />
  <sodipodi:namedview
     id="base"
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1.0"
     inkscape:pageopacity="0.0"
     inkscape:pageshadow="2"
     inkscape:zoom="0.98994949"
     inkscape:cx="-29.260858"
     inkscape:cy="66.532806"
     inkscape:document-units="px"
     inkscape:current-layer="layer1"
     showgrid="false"
     units="px"
     showguides="true"
     inkscape:guide-bbox="true"
     inkscape:window-width="1920"
     inkscape:window-height="1056"
     inkscape:window-x="0"
     inkscape:window-y="24"
     inkscape:window-maximized="1">
    <sodipodi:guide
       position="200.71429,121.42857"
       orientation="1,0"
       id="guide23298" />
  </sodipodi:namedview>
  <metadata
     id="metadata7">
    <rdf:RDF>
      <cc:Work
         rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:title />
      </cc:Work>
    </rdf:RDF>
  </metadata>
  <g
     inkscape:label="Capa 1"
     inkscape:groupmode="layer"
     id="layer1"
     transform="translate(0,-652.36216)">
    <path
       style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:1;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
       d="m 0,0 0,300 68.572266,0 0,100 0.105468,0 L 94.625,400 159.26172,300 400,300 400,0 Z m 25,25 350,0 0,250 -226.89579,0.35672 -54.531944,85.49094 0,-60.84766 0.01172,0 0.01563,-25 L 25,275 Z"
       transform="translate(0,652.36216)"
       id="rect23285"
       inkscape:connector-curvature="0"
       sodipodi:nodetypes="cccccccccccccccccccc" />
  </g>
</svg>







</style>
</head>
<body>


<div class="fancy-container" style="
    width: 300px;
    height: 200px;
">
<div class="fancy-content">
    <p>star!!</p>
    </div>
	<div class="fancySVG">
	<svg  width="100%" height="100%" viewBox="0 0 200 200">
  	<polygon points="100,10 40,198 190,78 10,78 160,198"
  	style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;" />
	Sorry, your browser does not support inline SVG.
	</svg>
    </div>
    
    
</div>
 
</body>
</html>




<svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="100%" height="100%" viewBox="-10 -10 420 420" id="svg2" version="1.1" inkscape:version="0.91 r13725" sodipodi:docname="bubble.svg" preserveAspectRatio="none" style="
    transform: translateX();
    transform: translateX(6px);
">
  <defs id="defs4"></defs>
  <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0" inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="0.98994949" inkscape:cx="-29.260858" inkscape:cy="66.532806" inkscape:document-units="px" inkscape:current-layer="layer1" showgrid="false" units="px" showguides="true" inkscape:guide-bbox="true" inkscape:window-width="1920" inkscape:window-height="1056" inkscape:window-x="0" inkscape:window-y="24" inkscape:window-maximized="1">
    <sodipodi:guide position="200.71429,121.42857" orientation="1,0" id="guide23298"></sodipodi:guide>
  </sodipodi:namedview>
  <metadata id="metadata7">
    <rdf:rdf>
      <cc:work rdf:about="">
        <dc:format>image/svg+xml</dc:format>
        <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type>
        <dc:title></dc:title>
      </cc:work>
    </rdf:rdf>
  </metadata>
  <g inkscape:label="Capa 1" inkscape:groupmode="layer" id="layer1" transform="translate(0,-652.36216)">
    <path style="opacity:1;fill:#000000;fill-opacity:1;stroke:none;stroke-width:1;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1" d="m 0,0 0,300 68.572266,0 0,100 0.105468,0 L 94.625,400 159.26172,300 400,300 400,0 Z m 25,25 350,0 0,250 -226.89579,0.35672 -54.531944,85.49094 0,-60.84766 0.01172,0 0.01563,-25 L 25,275 Z" transform="translate(0,652.36216)" id="rect23285" inkscape:connector-curvature="0" sodipodi:nodetypes="cccccccccccccccccccc"></path>
  </g>SVG Width
71
SVG Height
100
scale SVG height
px px
145
SVG Y offset
px px
30

</svg>

*/

https://g.co/gemini/share/a0777bbc102f
*/
abstract class ElementorTable extends \Elementor\Widget_Base {

    protected function register_controls(): void {
        
    }

}