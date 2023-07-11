<?php
/**
 * Title: Hidden No Results Content
 * Slug: wordpress-theme/hidden-no-results-content
 * Inserter: no
 *
 * @package WordPress Theme
 */

?>
<!-- wp:paragraph -->
<p>
<?php echo esc_html_x( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'Message explaining that there are no results returned from a search', 'wordpress-theme' ); ?>
</p>
<!-- /wp:paragraph -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'wordpress-theme' ); ?>","placeholder":"<?php echo esc_attr_x( 'Search...', 'placeholder for search field', 'wordpress-theme' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'wordpress-theme' ); ?>","buttonUseIcon":true} /-->
