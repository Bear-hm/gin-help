<header class="banner navbar navbar-default navbar-static-top" role="banner">
	<div class="container">
		<!--		<nav class="collapse navbar-collapse" role="navigation">-->
		<!--			--><?php
							//				if ( has_nav_menu('primary_navigation') ) :
							//					wp_nav_menu( array( 'theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav') );
							//				endif;
							//			
							?>
		<!--		</nav>-->
	</div>
</header>

<div class="top-search-form" id="top-search-form">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-1">
				<div class="text-center">
					<a href="/" class="btn btn-link">帮助中心</a>
				</div>
			</div>
			<div class="col-md-8 col-md-offset-2">
				<form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
					<div class="input-group">
						<label class="hide"><?php _e('Search for:', 'wedocs'); ?></label>
						<input type="search" value="<?php if (is_search()) {
														echo get_search_query();
													} ?>" name="s" class="search-field form-control input-lg" placeholder="<?php _e('Search', 'wedocs'); ?> <?php bloginfo('name'); ?>">
						<input type="hidden" name="search_param" value="<?php echo is_search() ? esc_attr($_REQUEST['search_param']) : 'all'; ?>" id="search_param">
						
						<div class="input-group-btn">
							<?php
							$param = isset($_GET['search_param']) ? sanitize_text_field($_GET['search_param']) : 'all';

							if (is_search() && $param != 'all') {
								$page_id = (int) $param;

								if ($search_title = get_post_field('post_title', $page_id, 'display')) {
									echo esc_html($search_title);
								} else {
									_e('All Docs', 'wedocs');
								}
							} else {
								_e('All Docs', 'wedocs');
							} ?>
							</span> <span class="caret"></span>
							</button> -->
							<ul class="dropdown-menu">
								<?php
								$docs = get_pages(array(
									'parent'    => 0,
									'post_type' => 'docs'
								));

								foreach ($docs as $doc) {
									printf('<li><a href="#%s">%s</a></li>', $doc->ID, $doc->post_title);
								}
								?>
								<li class="divider"></li>
								<li><a href="#all"><?php _e('All Docs', 'wedocs'); ?></a></li>
							</ul>
							<button type="submit" class="el-input__suffix btn btn-primary btn-lg">
								<span class="i-icon i-icon-search">
								<svg t="1730103202401" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2855" width="26" height="26" data-spm-anchor-id="a313x.search_index.0.i4.117c3a81c4uqdO"><path d="M448 192c140.8 0 256 115.2 256 256 0 57.6-19.2 115.2-54.4 156.8l160 160c12.8 12.8 12.8 32 0 44.8s-28.8 12.8-41.6 3.2l-3.2-3.2-160-160C563.2 684.8 505.6 704 448 704c-140.8 0-256-115.2-256-256s115.2-256 256-256z m0 64c-105.6 0-192 86.4-192 192s86.4 192 192 192 192-86.4 192-192-86.4-192-192-192z" fill="#13c798" p-id="2856" data-spm-anchor-id="a313x.search_index.0.i6.117c3a81c4uqdO" class="selected"></path><path d="M336 416c19.2 0 32 12.8 32 32 0 41.6 32 76.8 73.6 80h6.4c19.2 0 32 12.8 32 32s-12.8 32-32 32c-80 0-144-64-144-144 0-19.2 12.8-32 32-32z" fill="#13c798" p-id="2857" data-spm-anchor-id="a313x.search_index.0.i7.117c3a81c4uqdO" class="selected"></path></svg>
								</span>
							</button>
						</div><!-- /btn-group -->
					</div><!-- /input-group -->
				</form>
			</div>
		</div>
	</div>
</div>