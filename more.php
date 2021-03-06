<?php
    include("header.php");
?>
<link rel="stylesheet" href="css/main.css" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/imtech_pager.js"></script>

    <div class="example">
    <h3><a href="#">Paragraph pagination sample</a></h3>
    <div id="content">
        <p>Sergey LUKYANENKO - The Boy and the Darkness - Chapter 1. The Sun Kitten.</p>
        <p>Everything happened because I got ill.</p>
        <p>It was already two in the afternoon, and I was lying in bed flicking through "Peter Pan" - I must have read it a hundred times over. I had long since pulled off the bandage my mother had tied around my neck in the morning, and thrown it into a corner. I simply can't understand - how can cotton wool soaked in vodka possibly help a cough? I don't argue with my mum, of course, but after she leaves I look after myself in my own way - namely, lie in bed with a book and wait for my germs to get tired of such a boring method of passing time. It usually helps - perhaps not at once, but after a day or three. A good thing, really, that the street outside looked quite miserable - the sun poking out for brief moments, only to make room for a patchy, nasty drizzle. Though, the sun never actually peeked into the room - our house is so unfortunately placed that it is in the shadows of the new nine-floor high-rises on every side. "The only use for such a flat is to grow mushrooms", - dad used to say, back when he still lived with us.</p>
        <p>I put my book down on the floor next to the bed, and lay on my back. Perhaps, had I shut my eyes now, nothing would have happened. But there I was, lying staring at the ceiling and listening to the ticking of the clock in the hallway.</p>
        <p>And a speck of sunlight jumped into the room through the glass. Small - the size of my hand - but surprisingly bright. As though the window was open, with bright summer sun outside. Someone was probably playing with a mirror on the balcony of the house across the street.</p>
        <p>The rabbit floated across the ceiling, climbed down a wall, made a vase on the dressing-table glint, and stopped, shaking slightly, on my headrest.</p>
        <p>- Don't go, - I said for some reason, knowing that in a moment the mirror would shift and the rabbit would leave my room forever. - Stay...</p>
        <p>And that's when it all started.</p>
        <p>The sun rabbit tore free of the bed and floated in the air. I didn't even realise at first that such things don't happen. It was only when the flat spot hanging in the air started puffing out to form a fuzzy orange ball that I understood - a miracle had happened.</p>
        <p>Four paws stretched from orange glowing fur, followed by a tail and a head. Green cat eyes blinked and gazed at me steadily. And overall, in fact, the rabbit looked more like a kitten than anything else. Except he was hanging in the air, glowing, and seemed light as the fairy fluff that floats away if one blows gently.</p>
        <p>- Hello, - purred the kitten. - Thank you for the invitation.</p>
        <p>I closed my eyes for a second, but when I opened them again, the kitten hadn't disappeared. In fact, he'd flown closer.</p>
        <p>- I don't believe in fairy tales, - I told myself. - I'm grown up now.</p>
        <p>- Well, compared to the girl who was holding the True Mirror, you are quite grown up, - declared the kitten, unperturbed, and lowered himself onto the blanket. I glanced over - to see if there would be smoke - but everything seemed all right. I could feel warmth with my chest, but not strong. And the kitten tilted his head and added: - But one can't really call you adult, either. How old are you? Ten, maybe?</p>
        <p>- Fourteen, - I replied, finding myself calming down at such a mundane question. - Who're you?</p>
        <p>- A sun rabbit, - replied the kitten, examining himself curiously. - What an appearance.. do I look like one?</p>
        <p>- Like what?</p>
        <p>- Like a sun rabbit.</p>
        <p>- More like a kitten.</p>
        <p>- Hardly better, - stated the Kitten sadly and stretched out. And I didn't think of anything better than repeating:</p>
        <p>- Who're you?</p>
        <p>- But we have already arrived at a consensus! - said the Kitten with sudden hurt. - A sun rabbit, or more precisely - a kitten, because I look far more like one! What is there not to understand?</p>
        <p>I found myself tongue-tied. Well, naturally, a small green animal that eats stones would simply be - a small green stone-eater. Simple. And a sun rabbit is a sun kitten, because he looks nothing like a rabbit.</p>
        <p>- So you mean - any rabbit can come to life if one just calls it? - I asked cautiously. For some reason it seemed to me the Kitten would be hurt at the question again. But he just shook his head proudly:</p>
        <p>- As if! Any! Only True Light, reflected in a True Mirror, can come to life.</p>
    </div>
    <div id="pagingControls"></div>
</div>

<script type="text/javascript">
var pager = new Imtech.Pager();
$(document).ready(function() {
    pager.paragraphsPerPage = 5; // set amount elements per page
    pager.pagingContainer = $('#content'); // set of main container
    pager.paragraphs = $('p', pager.pagingContainer); // set of required containers
    pager.showPage(1);
});
</script>

<hr style="clear:both;" />
<h2><a href="http://www.script-tutorials.com/how-to-create-easy-pagination-with-jquery/">back to original article page</a></h2>
 <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="../js/vendor.min.js"></script>
    <script src="../js/scripts.min.js"></script>
    <!-- Customizer scripts-->
    <script src="../customizer/customizer.min.js"></script>
  </body>

<!-- Mirrored from themes.rokaux.com/unishop/v3.0/template-1/shop-grid-ns.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Jun 2019 09:16:50 GMT -->
</html>