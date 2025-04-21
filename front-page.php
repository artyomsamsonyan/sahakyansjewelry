<?php
/**
 * Template Name: Front Page
 */

get_header();
?>
<?php
// Hero Section
$hero_bg = get_field('hero_background');
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_button = get_field('hero_button_link');
// Step To Step Section
$step_to_step_title = get_field('step_to_step_title');
$steps_group = get_field('steps_group');
// Step To Step Section
$readymade_models_title = get_field('ready-made_models_title');
$readymade_models_by_type_group = get_field('ready-made_models_by_type_group');
// Softwares
$softwares_title = get_field(selector: 'softwares_title');
$softwares_group = get_field('softwares_group');
?>
<main class="home-page">
    <section class="heroSectionWrapper">
        <div class="container">
            <div class="heroSection">
                <video autoplay muted loop id="background-video">
                    <source src="<?php echo esc_url($hero_bg['url']); ?>" type="video/mp4">
                </video>
                <div class="backgroundFon"></div>
                <h1><?php echo esc_html($hero_title); ?></h1>
                <a href="<?php echo esc_url($hero_button['url']); ?>" class="discoverMoreBtn"> Dicover
                    More</a>
            </div>
        </div>
    </section>
    <section class="introSectionWrapper">
        <div class="introSection">
            <h2>
                <?php echo esc_html($hero_subtitle); ?>
            </h2>
        </div>
    </section>
    <section class="creationStepsSectionWrapper">
        <h2> <?php echo esc_html($step_to_step_title); ?></h2>
        <div class="creationStepsSection">
            <?php foreach ($steps_group as $key => $item) { ?>
                <div class="stepBox"
                    style="background-image: url(<?php echo esc_url(url: $item['background_image']['url']); ?>">
                    <div class="step">
                        <div class="index">
                            <?php echo esc_html(text: $key + 1) ?>
                        </div>
                        <div class="content">
                            <h3><?php echo esc_html($item['title']) ?></h3>
                            <p><?php echo esc_html($item['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
    <section class="modelsByTypeSectionWrapper">
        <h2> <?php echo esc_html($readymade_models_title) ?></h2>
        <div class="container">
            <div class="modelsByTypeSection">
                <?php foreach ($readymade_models_by_type_group as $item) { ?>
                    <div class="typeItem">
                        <div class="content">
                            <h3><?php echo esc_html($item['type']) ?></h3>
                            <a href="<?php echo esc_url($item['link']['url']) ?>">
                                <span>explore</span>
                            </a>
                        </div>
                        <img src="<?php echo esc_url($item['background_image']['url']) ?>"
                            alt="<?php echo esc_url($item['background_image']['alt']) ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class="workWithSectionWrapper">
        <div class="container">
            <div class="workWithSection">
                <h2><?php echo esc_html($softwares_title) ?></h2>
                <div class="softwaresGrid">
                    <?php foreach ($softwares_group as $item) { ?>
                        <div class="item">
                            <img src="<?php echo esc_url($item['background_image']['url']); ?>"
                                alt="<?php echo esc_url($item['background_image']['alt']); ?>">
                            <div class="contentBlur">
                                <span class="title"><?php echo esc_html($item['title']) ?></span>
                                <a target="_blank" href="<?php echo esc_url($item['link_to_software']['url']) ?>">
                                    <span>
                                        open website
                                    </span>
                                    <img src="<?php echo get_template_directory_uri(); ?>./assets/icons/arrowRightWhiteIcon.svg"
                                        alt="">
                                </a>
                            </div>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();