<?php
/**
 * The template for creating entries
 * Template Name: RBT New Entry
 * 

 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rosebudthornjd
 */
get_header();
?>

<main class="rbt-new-entry">
    <div class="rbt-container">
        <h1>New Rose Bud Thorn Entry</h1>

        <?php if ( isset($_GET['rbt_saved']) && $_GET['rbt_saved'] == '1' ) : ?>
            <div class="rbt-notice rbt-notice--success">
                Entry saved. 💾
                <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'rbt-dashboard' ) ) ); ?>">
                    View dashboard →
                </a>
            </div>
        <?php endif; ?>

        <form method="post" class="rbt-form">
            <?php wp_nonce_field('rbt_new_entry', 'rbt_form_nonce'); ?>

            <div class="rbt-field">
                <label for="rbt_rose">🌹 Rose (what went well?)</label>
                <textarea id="rbt_rose" name="rbt_rose" rows="4"></textarea>
            </div>

            <div class="rbt-field">
                <label for="rbt_bud">🌱 Bud (what has potential?)</label>
                <textarea id="rbt_bud" name="rbt_bud" rows="4"></textarea>
            </div>

            <div class="rbt-field">
                <label for="rbt_thorn">🌑 Thorn (what was hard?)</label>
                <textarea id="rbt_thorn" name="rbt_thorn" rows="4"></textarea>
            </div>

            <div class="rbt-field">
                <label for="rbt_stage">Emotional Stage</label>
                <select id="rbt_stage" name="rbt_stage">
                    <option value="">-- Select stage --</option>
                    <option value="fragment">Fragment</option>
                    <option value="freeze">Freeze</option>
                    <option value="distance">Distance</option>
                    <option value="stability">Stability</option>
                    <option value="trust">Trust</option>
                </select>
            </div>

            <div class="rbt-field">
                <label for="rbt_suggested_action">Suggested Action</label>
                <textarea id="rbt_suggested_action" name="rbt_suggested_action" rows="3"></textarea>
            </div>

            <button type="submit" class="rbt-button rbt-button--primary">
                Save Entry
            </button>

			<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'rbt-dashboard' ) ) ); ?>">
				View dashboard →
			</a>
        </form>
    </div>
</main>

<?php get_footer(); ?>