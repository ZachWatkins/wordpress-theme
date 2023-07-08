<?php
/**
 * Title: Hidden No Results Content
 * Slug: wordpresstheme/hidden-no-results-content
 * Inserter: no
 *
 * @package WordPress Theme
 */

?>
<!-- wp:paragraph -->
<p>
<?php echo esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Message explaining that there are no results returned from a search', 'wordpresstheme' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'wordpresstheme' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'wordpresstheme' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'wordpresstheme' ); ?>","buttonUseIcon":true} /-->
