<?php
$search_query = get_search_query();

// The Loop
if (have_posts() && trim($search_query) != "") {
    echo '<ul class="doc-category">';
    while (have_posts()) {
        the_post();
        get_template_part('templates/loop-content');
    }
    echo '</ul>';
} else {
    ?>
    <div class="alert alert-warning">
        <?php echo '<style>';?>
        <?php echo  '.content-info { margin-top: 14%; }';?>
        <?php echo  '</style>';?>
        <?php if(trim($search_query) == ""){?>
        <?php _e('搜索值为空', 'wedocs'); ?>
        <?php }else{?>
        <?php _e('没有搜索到与' . $search_query . '相关的东西', 'wedocs'); ?>
        <?php }?>
    </div>
    <?php
}
?>
<!---->
<?php //if ($wp_query->max_num_pages > 1) : ?>
<!--    <nav class="post-nav">-->
<!--        <ul class="pager">-->
<!--            <li class="previous">--><?php //next_posts_link(__('&larr; Older posts', 'wedocs')); ?><!--</li>-->
<!--            <li class="next">--><?php //previous_posts_link(__('Newer posts &rarr;', 'wedocs')); ?><!--</li>-->
<!--        </ul>-->
<!--    </nav>-->
<?php //endif; ?>