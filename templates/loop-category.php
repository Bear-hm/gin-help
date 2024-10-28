<li class="category">
    <h3><a href="<?php echo get_term_link($category); ?>"><?php echo $category->name; ?></a></h3>
    <div class="inside">
        <?php if (!empty($category->description)) { ?>
            <?php echo $category->description; ?>
        <?php } ?>
        <?php
        $args = array(
            'hide_empty' => false,
            'orderby' => 'term_id',
            'child_of' => $category->term_id,
            'title_li' => '',
            'show_option_none' => ''
        );
        $posts = get_posts(array(
            'cat' => $args['child_of'], // 分类ID
            'posts_per_page' => 3,
        ));

        // 如果有文章，则显示分类名称和文章列表
        if ($posts) {
            $category = get_category($args['child_of']);
            ?>
            <ul>
                <?php
                foreach ($posts as $post) {
                    setup_postdata($post);
                    ?>

                    <a href="<?php the_permalink(); ?>">
                        <li class="list-disc-category">
                            <span class="line-clamp-3"><?php the_title(); ?></span>
                        </li>
                    </a>

                    <?php
                }
                ?>
            </ul>
            <?php
        }
                wp_list_categories( $args );
        $childrens = get_terms( 'category', $args );

        if ( $childrens ) {
            echo '<ul class="child-cats">';
            foreach ($childrens as $child) {
                 printf( '<li><a href="%s">%s</a></li>', get_term_link( $child ), $child->name );
            }
            echo '</ul>';
        }
        ?>
    </div>
</li>