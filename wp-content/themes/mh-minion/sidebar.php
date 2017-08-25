
<div class="sidebar-right">
    <div id="search" >
        <?php get_search_form(); ?>
    </div>

    <?php
    if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : endif;
    ?>

</div>
