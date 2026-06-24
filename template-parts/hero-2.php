<?php
/**
 * Why Choose Us / Hero Section — used on the homepage (front-page.php).
 * Include via:
 *   get_template_part( 'template-parts/why-choose-us', null, array(
 *       'eyebrow'         => 'WHY CHOOSE US',
 *       'headline_line1'  => 'Beyond Furniture',
 *       'headline_line2'  => 'Creating a Lifestyle',
 *       'body_text'       => 'With thousands of satisfied customers ...',
 *       'cta_label'       => 'LEARN MORE',
 *       'cta_url'         => '/shop',
 *       'avatars'         => array(
 *           array( 'src' => 'https://...', 'alt' => '' ),
 *           // ... up to 5 avatar items
 *       ),
 *       'stat_primary'    => 'TRUSTED BY THOUSANDS',
 *       'stat_secondary'  => 'USED BY HOME',
 *       'hero_image_src'  => 'https://...',
 *       'hero_image_alt'  => 'Stylish living room scene ...',
 *   ) );
 *
 * Expected $args:
 *   'eyebrow'         (string) Small uppercase label above the headline.
 *   'headline_line1'  (string) First line of the main headline.
 *   'headline_line2'  (string) Second line of the main headline.
 *   'body_text'       (string) Short paragraph beneath the headline.
 *   'cta_label'       (string) Call-to-action button text.
 *   'cta_url'         (string) Call-to-action button href URL.
 *   'avatars'         (array)  Array of associative arrays with 'src' and 'alt' keys.
 *   'stat_primary'    (string) Bold stat label (e.g. "TRUSTED BY THOUSANDS").
 *   'stat_secondary'  (string) Secondary stat label (e.g. "USED BY HOME").
 *   'hero_image_src'  (string) URL of the hero product/lifestyle image.
 *   'hero_image_alt'  (string) Descriptive alt text for the hero image.
 */

// Destructure args with safe fallbacks.
$eyebrow        = $args['eyebrow']        ?? 'WHY CHOOSE US';
$headline_line1 = $args['headline_line1'] ?? 'Beyond Furniture';
$headline_line2 = $args['headline_line2'] ?? 'Creating a Lifestyle';
$body_text      = $args['body_text']      ?? 'With thousands of satisfied customers, Minicom is a trusted name in quality furniture. Our thoughtfully designed pieces bring comfort, style and functionality to every home. Experience the difference today!';
$cta_label      = $args['cta_label']      ?? 'LEARN MORE';
$cta_url        = $args['cta_url']        ?? '#shop';
$avatars        = $args['avatars']        ?? array();
$stat_primary   = $args['stat_primary']   ?? 'TRUSTED BY THOUSANDS';
$stat_secondary = $args['stat_secondary'] ?? 'USED BY HOME';
$hero_image_src = $args['hero_image_src'] ?? get_template_directory_uri() . '/assets/img/banner1-1.jpg';
$hero_image_alt = $args['hero_image_alt'] ?? 'Stylish living room scene featuring a yellow tufted armchair, a wooden side table with books, a striped cushion, a draped grey blanket, and a large monstera plant';
?>

<!-- Why Choose Us / Hero Section -->
<section class="why-choose-us section" aria-labelledby="why-choose-us-heading">
  <div class="container">
    <div class="why-choose-us__inner flex items-center">

      <!-- Left: Content Column -->
      <div class="why-choose-us__content">
        <p class="why-choose-us__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>

        <h2 id="why-choose-us-heading" class="why-choose-us__headline">
          <?php echo esc_html( $headline_line1 ); ?><br>
          <?php echo esc_html( $headline_line2 ); ?>
        </h2>

        <p class="why-choose-us__body">
          <?php echo esc_html( $body_text ); ?>
        </p>

        <div class="why-choose-us__actions flex items-center gap-4">
          <a href="<?php echo esc_url( $cta_url ); ?>" class="btn btn--primary btn--sm why-choose-us__cta">
            <?php echo esc_html( $cta_label ); ?> <span class="why-choose-us__cta-arrow" aria-hidden="true">→</span>
          </a>

          <div class="why-choose-us__social-proof flex items-center gap-4">
            <?php if ( ! empty( $avatars ) ) : ?>
            <figure class="why-choose-us__avatars" aria-label="Customer avatars">
              <div class="why-choose-us__avatar-stack" aria-hidden="true">
                <?php foreach ( $avatars as $avatar ) :
                  $avatar_src = $avatar['src'] ?? '';
                  $avatar_alt = $avatar['alt'] ?? '';
                ?>
                  <img
                    src="<?php echo esc_url( $avatar_src ); ?>"
                    alt="<?php echo esc_attr( $avatar_alt ); ?>"
                    class="why-choose-us__avatar-img"
                  >
                <?php endforeach; ?>
              </div>
            </figure>
            <?php endif; ?>

            <div class="why-choose-us__stat">
              <strong class="why-choose-us__stat-line"><?php echo esc_html( $stat_primary ); ?></strong>
              <span class="why-choose-us__stat-line"><?php echo esc_html( $stat_secondary ); ?></span>
            </div>
          </div>
        </div>
      </div>
      <!-- /Left Content Column -->

      <!-- Right: Hero Product Image -->
      <figure class="why-choose-us__image-wrap" aria-hidden="true">
        <img
          src="<?php echo esc_url( $hero_image_src ); ?>"
          alt="<?php echo esc_attr( $hero_image_alt ); ?>"
          class="why-choose-us__image"
        >
      </figure>
      <!-- /Right Hero Product Image -->

    </div>
  </div>
</section>