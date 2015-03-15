<?php
if (!$hideTitle=get_post_meta( get_the_ID(), 'hidetitle', 'yes' ))
{
?>
<header>
    <h1 class="entry-title"><?php the_title(); ?></h1>
</header>
<?php    
}
?>
