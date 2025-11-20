<?php
/**
 * The template for displaying the for viewing entries
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rosebudthornjd
 */
get_header(); ?>
<main class="rbt-dashboard">
    <h1>Rose Bud Thorn Journal</h1>

    <?php
    $entries = new WP_Query(array(
        'post_type'      => 'rbt_entry',
        'posts_per_page' => 10,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ( $entries->have_posts() ) : ?>
        <div class="rbt-entry-list">
            <?php while ( $entries->have_posts() ) : $entries->the_post(); ?>
                <article class="rbt-entry-card">
                    <h2><?php echo get_the_date('M j, Y g:i A')?></h2>

                    <p><strong>Rose:</strong> <?php echo esc_html( get_field('rose') ); ?></p>
                    <p><strong>Bud:</strong> <?php echo esc_html( get_field('bud') ); ?></p>
                    <p><strong>Thorn:</strong> <?php echo esc_html( get_field('thorn') ); ?></p>

                    <?php if ( get_field('stage') ) : ?>
                        <p><strong>Stage:</strong> <?php echo esc_html( ucfirst( get_field('stage') ) ); ?></p>
                    <?php endif; ?>

                    <?php if ( get_field('suggested_action') ) : ?>
                        <p><strong>Suggested Action:</strong> <?php echo esc_html( get_field('suggested_action') ); ?></p>
                    <?php endif; ?>
                </article>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    <?php else : ?>
        <p>No entries yet. Add one in the admin.</p>
    <?php endif; ?>

</main>

<?php get_footer();