<?php
/**
 * Template Name: Portfolio
 */
get_header();
?>

<main class="portfolio-page">
    <section class="pageTitleSectionWrapper">
        <div class="pageTitleSection">
            <div class="container">
                <h2>Our Products</h2>
                <?php
                $model_types = [];
                $args = [
                    'post_type' => 'model',
                    'posts_per_page' => -1,
                    'fields' => 'ids',
                ];

                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    foreach ($query->posts as $post_id) {
                        $type = get_field('model_type', $post_id);
                        if ($type && !in_array($type, $model_types)) {
                            $model_types[] = $type;
                        }
                    }
                }
                wp_reset_postdata();
                ?>

                <?php if (!empty($model_types)): ?>
                    <div class="productFilterButtons">
                        <div class="filterButtons">
                            <?php foreach ($model_types as $type): ?>
                                <input type="checkbox" id="<?php echo sanitize_title($type); ?>" name="filter"
                                    value="<?php echo esc_attr($type); ?>">
                                <label for="<?php echo sanitize_title($type); ?>"
                                    class="button"><?php echo esc_html($type); ?></label>
                            <?php endforeach; ?>
                        </div>
                        <button class="showAllButton">Show All</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="portfolioModelsListSectionWrapper">
        <div class="container">
            <div class="portfolioModelsListSection">
                <div class="portfolioModelsList">
                    <?php
                    $args = ['post_type' => 'model', 'posts_per_page' => 50, 'paged' => 1];
                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                        while ($query->have_posts()):
                            $query->the_post();
                            $model_name = get_the_title();
                            $model_images = get_field('model_images');
                            $model_type = get_field('model_type');
                            $model_description = get_field('model_description');
                            $link_to_contact_us = get_field('link_to_contact_us');
                            $contact_email = get_field('contact_email');
                            $model_ref_number = get_field('model_ref_number');
                            ?>
                            <div class="modelCard" data-type="<?php echo esc_attr($model_type); ?>">
                                <img src="<?php echo esc_url($model_images[0]['image']['url'] ?? ''); ?>"
                                    alt="<?php echo esc_attr($model_name); ?>">
                                <h4><?php echo esc_html($model_name); ?></h4>
                                <div class="viewLink">
                                    <button class="viewModelBtn" data-name="<?php echo esc_attr($model_name); ?>"
                                        data-images='<?php echo json_encode($model_images); ?>'
                                        data-description='<?php echo json_encode($model_description); ?>'
                                        data-email="<?php echo esc_attr($contact_email); ?>"
                                        data-ref="<?php echo esc_attr($model_ref_number); ?>"
                                        data-link="<?php echo esc_attr($link_to_contact_us['url']); ?>">
                                        View Model
                                    </button>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="loadMoreButtonWrapper">
                    <button id="load-more-btn" data-page="2">Load More</button>
                </div>
            </div>
        </div>
    </section>
    <div class="singleModelPopUpWrapper">
        <div class="singleModelPopUp">
            <div class="popupImage">
                <div class="swiper singleModelSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"></div>
                        <div class="swiper-slide"></div>
                    </div>
                    <div class="swiper-button-prev">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/icons/arrowRectangleLeftIcon.png"
                            alt="arrowRectangleLeftIcon">
                    </div>
                    <div class="swiper-button-next">
                        <img src="<?php echo get_template_directory_uri(); ?> /assets/icons/arrowRectangleRightIcon.png"
                            alt="arrowRectangleRightIcon">
                    </div>
                </div>
            </div>
            <div class="popupContent">
                <h4 class="title"></h4>
                <div class="description">
                    <span class="subtitle">Model Description:</span>
                    <ul></ul>
                </div>
                <div class="contactInfo">
                    <a href="#" class="phone"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/icons/phoneBlackIcon.png"
                            alt="phone Icon"> <span>Contact Us</span></a>
                    <a href="#" class="email"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/icons/emailBlackIcon.png"
                            alt="email Icon"> <span></span></a>
                </div>
                <div class="shareInfo">
                    <a href="" class="shareLink">
                        <img src="<?php echo get_template_directory_uri(); ?>./assets/icons/shareIcon.png"
                            alt="share Icon">
                        <span>Share</span>
                    </a>
                    <a class="refNumber"></a>
                </div>
            </div>
        </div>
        <button class="closePopUp">Close</button>
    </div>
</main>

<?php get_footer(); ?>