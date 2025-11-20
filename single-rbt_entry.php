<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rosebudthornjd
 */

get_header();
?>

<main class="rbt-single-entry">
	<div class="rbt-container">

		<a href="<?php echo esc_url( home_url('/rbt-dashboard/') ); ?>" class="rbt-back">
			← Back to Dashboard
		</a>

		<h1><?php echo get_the_date('M j, Y'); ?></h1>

		<section class="rbt-section">
			<h2>🌹 Rose</h2>
			<p><?php echo esc_html( get_field('rose') ); ?></p>
		</section>

		<section class="rbt-section">
			<h2>🌱 Bud</h2>
			<p><?php echo esc_html( get_field('bud') ); ?></p>
		</section>

		<section class="rbt-section">
			<h2>🌑 Thorn</h2>
			<p><?php echo esc_html( get_field('thorn') ); ?></p>
		</section>

		<?php if( get_field('stage') ) : ?>
		<section class="rbt-section">
			<h2>Emotional Stage</h2>
			<p class="rbt-stage-badge">
				<?php echo ucfirst( get_field('stage') ); ?>
			</p>
		</section>
		<?php endif; ?>

		<?php if( get_field('suggested_action') ) : ?>
		<section class="rbt-section">
			<h2>Suggested Action</h2>
			<p><?php echo esc_html( get_field('suggested_action') ); ?></p>
		</section>
		<?php endif; ?>

	</div>
</main>
<?php
get_footer();
