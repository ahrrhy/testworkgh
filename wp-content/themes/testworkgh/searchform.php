<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>"  class="search-form">
    <div class="search">
        <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Type and hit Enter..."/>
        <label for="search-submit" class="label-submit">
            <input id="search-submit" type="submit" class="search-submit" name="search-submit" value="">
        </label>
    </div>
</form>