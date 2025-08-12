<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="search-input-group">
        <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>
