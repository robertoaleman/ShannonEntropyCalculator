

<h1>PHP Class Calculate Shannon Entropy in an Image</h1>
<p>Author: Roberto Aleman, ventics.com , license: GNU AGPLv3</p>
<h2 class=""><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Shannon Entropy Level Table</span></span></h2>
<span class=""><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Here is a simplified table to interpret entropy levels in the context of images:</span></span></span>
<ul class="">
 	<li class=""><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">0 to 1</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> : Very low randomness (little variability in colors).</span></span></li>
 	<li class=""><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">1 to 3</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> : Low to moderate randomness (little color diversity).</span></span></li>
 	<li class=""><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">3 to 5</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> : Moderate to high randomness (acceptable color diversity).</span></span></li>
 	<li class=""><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">5 to 7</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> : High randomness (good color diversity).</span></span></li>
 	<li class=""><strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">7 to 8</span></span></strong><span style="vertical-align: inherit;"><span style="vertical-align: inherit;"> : Very high randomness (almost all colors are equally likely).</span></span></li>
</ul>
<h2 class="">Explanation of the Code to Calculate Shannon Entropy in an Image</h2>
<span class="">The code calculate the <strong>Shannon entropy</strong> of an image, allowing us to measure the level of randomness or color diversity within the image. Below is a detailed explanation of how the code works and why it generates scales in the image.</span>
<h3 class="">1. <strong>Loading the Image</strong></h3>
<span class="">The code begins by loading an image from a PNG file using the <code >imagecreatefrompng()</code> function. This allows the script to work with the image in a format that PHP can manipulate.</span>
<div >
<div >
<div class="">
<div class="">php</div>
<div class=""></div>
</div>
<div class="">
<pre class=""><code class=""><span class=""><span class="">$this</span>-&gt;image = imagecreatefrompng(<span class="">$imagePath</span>);
</span></code></pre>
</div>
</div>
</div>
<h3 class="">2. <strong>Obtaining Dimensions</strong></h3>
<span class="">The dimensions of the image (width and height) are obtained to iterate over each pixel:</span>
<div >
<div >
<div class="">
<div class="">php</div>
<div class=""></div>
</div>
<div class="">
<pre class=""><code class=""><span class=""><span class="">$this</span>-&gt;width = imagesx(<span class="">$this</span>-&gt;image);
</span><span class=""><span class="">$this</span>-&gt;height = imagesy(<span class="">$this</span>-&gt;image);
</span></code></pre>
</div>
</div>
</div>
<h3 class="">3. <strong>Calculating the Color Histogram</strong></h3>
<span class="">The next step is to count the frequency of each color in the image. This is done through a loop that traverses each pixel and uses <code >imagecolorat()</code> to get the color index of each pixel. The frequency of each color is stored in an array called <code >$histogram</code>.</span>
<div >
<div >
<div class="">
<div class="">php</div>
<div class=""></div>
</div>
<div class="">
<pre class=""><code class=""><span class=""><span class="">for</span> (<span class="">$y</span> = 0; <span class="">$y</span> &lt; <span class="">$this</span>-&gt;height; <span class="">$y</span>++) {
</span><span class="">    <span class="">for</span> (<span class="">$x</span> = 0; <span class="">$x</span> &lt; <span class="">$this</span>-&gt;width; <span class="">$x</span>++) {
</span><span class="">        <span class="">$colorIndex</span> = imagecolorat(<span class="">$this</span>-&gt;image, <span class="">$x</span>, <span class="">$y</span>);
</span><span class="">        <span class="">if</span> (!<span class="">isset</span>(<span class="">$histogram</span>[<span class="">$colorIndex</span>])) {
</span><span class="">            <span class="">$histogram</span>[<span class="">$colorIndex</span>] = 0;
</span><span class="">        }
</span><span class="">        <span class="">$histogram</span>[<span class="">$colorIndex</span>]++;
</span><span class="">    }
</span><span class="">}
</span></code></pre>
</div>
</div>
</div>
<h3 class="">4. <strong>Calculating Shannon Entropy</strong></h3>
<span class="">Once the histogram is obtained, Shannon entropy is calculated using the previously mentioned formula. For each color, its probability is calculated, and the entropy formula is applied:</span>
<div >
<div >
<div class="">
<div class="">php</div>
<div class=""></div>
</div>
<div class="">
<pre class=""><code class=""><span class=""><span class="">foreach</span> (<span class="">$histogram</span> <span class="">as</span> <span class="">$count</span>) {
</span><span class="">    <span class="">$probability</span> = <span class="">$count</span> / <span class="">$totalPixels</span>;
</span><span class="">    <span class="">if</span> (<span class="">$probability</span> &gt; 0) {
</span><span class="">        <span class="">$entropy</span> -= <span class="">$probability</span> * log(<span class="">$probability</span>, 2);
</span><span class="">    }
</span><span class="">}
</span></code></pre>
</div>
</div>
</div>
<h3 class="">5. <strong>Randomness Diagnosis</strong></h3>
<span class="">Finally, a diagnosis about the level of randomness of the image is provided based on the calculated entropy value. This is done by comparing the entropy value against predefined scales that reflect different levels of randomness.</span>
<div >
<div >
<div class="">
<div class="">php</div>
<div class=""></div>
</div>
<div class="">
<pre class=""><code class=""><span class=""><span class="">if</span> (<span class="">$entropy</span> &lt; 1) {
</span><span class="">    <span class="">return</span> <span class="">"Low entropy (little randomness)"</span>;
</span><span class="">} <span class="">elseif</span> (<span class="">$entropy</span> &lt; <span class="">$maxEntropy</span> / 2) {
</span><span class="">    <span class="">return</span> <span class="">"Moderate entropy (acceptable level of randomness)"</span>;
</span><span class="">} <span class="">elseif</span> (<span class="">$entropy</span> &lt; <span class="">$maxEntropy</span> * 0.75) {
</span><span class="">    <span class="">return</span> <span class="">"High entropy (good randomness)"</span>;
</span><span class="">} <span class="">else</span> {
</span><span class="">    <span class="">return</span> <span class="">"Very high entropy (high randomness)"</span>;
</span><span class="">}
</span></code></pre>
</div>
</div>
</div>
<h2 class="">Why Does It Generate Scales in an Image?</h2>
<span class="">Shannon entropy is used to measure the amount of information or uncertainty in a dataset. In the context of images, this translates to the diversity of colors present.</span>
<ul class="">
 	<li class=""><strong>Low Entropy</strong>: Indicates that the image has few colors or that the colors are very similar to each other, resulting in a less visually interesting image.</li>
 	<li class=""><strong>High Entropy</strong>: Suggests that the image has a wide variety of colors, which can make it more attractive and complex.</li>
</ul>
<span class="">The entropy scale allows for classifying images into different categories of randomness, which can be useful in applications such as image compression, quality analysis, and in creating image processing algorithms.</span>
