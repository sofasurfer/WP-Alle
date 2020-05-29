<?php
global $wp;
$vurl = home_url( $wp->request );
$vtitle = get_the_title();
?>
<div class="v-sharing">
    <a class="v-share-fb" href="https://www.facebook.com/sharer/sharer.php?u=<?= $vurl; ?>" target="_blank">Facebook</a>
    <a class="v-share-tw" href="https://twitter.com/intent/tweet?text=<?= $vtitle; ?>: <?= $vurl; ?>" target="_blank">Twitter</a>
    <a class="v-share-wa href="whatsapp://send?<?= $vtitle; ?>: <?= $vurl; ?>" data-action="share/whatsapp/share">Whatsapp</a>
    <a class="v-share-em" href="mailto:" data-action="share/whatsapp/share">E-Mail</a>
</div>