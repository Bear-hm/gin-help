<?php while (have_posts()) : the_post(); ?>
    <?php $skip_sidebar = get_post_meta( $post->ID, 'skip_sidebar', true ); ?>

    <div class="col-md-12">

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?> itemscope itemtype="http://schema.org/Article">

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

                <?php if ( function_exists( 'wedocs_get_option' ) && wedocs_get_option( 'print', 'wedocs_settings', 'on' ) == 'on' ): ?>
                    <a href="#" class="wedocs-print-article wedocs-hide-print wedocs-hide-mobile" title="<?php echo esc_attr( __( 'Print this article', 'wedocs' ) ); ?>"><i class="wedocs-icon wedocs-icon-print"></i></a>
                <?php endif; ?>
            </header>

            <div class="entry-content" itemprop="articleBody">

                <?php the_content(); ?>

                <?php
                $children = wp_list_pages("title_li=&order=menu_order&child_of=". $post->ID ."&echo=0&post_type=" . $post->post_type);

                if ( $children ) {
                    echo '<div class="article-child well">';
                    echo '<h3>' . __( 'Articles', 'wedocs' ) . '</h3>';
                    echo '<ul>';
                    echo $children;
                    echo '</ul>';
                    echo '</div>';
                }
                ?>
            </div>
            <?php

            if ( $skip_sidebar != 'yes' ) {

                if ( function_exists( 'wedocs_doc_nav' ) ) {
                    wedocs_doc_nav();
                }

                if ( function_exists( 'wedocs_get_template_part' ) && function_exists( 'wedocs_get_option' ) ) {

                    if ( wedocs_get_option( 'helpful', 'wedocs_settings', 'on' ) == 'on' ) {
                        wedocs_get_template_part( 'content', 'feedback' );
                    }

                    if ( wedocs_get_option( 'email', 'wedocs_settings', 'on' ) == 'on' ) {
                        wedocs_get_template_part( 'content', 'modal' );
                    }
                }
            }
            ?>

        </article>
    </div><!-- .col-md-# -->
<?php endwhile; ?>
