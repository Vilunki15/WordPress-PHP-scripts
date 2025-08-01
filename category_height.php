<?php
//When you have a lot of WooC categories, the category metabox height is way too small. 
//This modifies height to see more categories once!
//<?php is only for highlighting

function metabox_height() {
	echo '
	<style>
    #product_catdiv .tabs-panel {
        max-height: 1000px !important;
        overflow-y: auto !important;
    }
    </style>
	';
}
add_action('admin_head', 'metabox_height');
