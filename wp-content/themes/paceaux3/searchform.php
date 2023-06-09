<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" placeholder="<?php echo __('Search', 'drop-shipping')?>" value="<?php echo get_search_query(); ?>" name="s" id="s" />
			
			</form>