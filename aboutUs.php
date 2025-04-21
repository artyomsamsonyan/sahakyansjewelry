<?php
/**
 * Template Name: About Us
 */
get_header();
?>
<?php
$contentArray = get_field(selector: 'content');
$get_in_touch_link = get_field(selector: 'get_in_touch_link');
?>

<main class="portfolio-page">
    <section class="pageTitleSectionWrapper">
        <div class="pageTitleSection">
            <div class="container">
                <h2>About US</h2>
            </div>
        </div>
    </section>
    <section class="pageContentSectionWrapper">
        <div class="pageContentSection">
            <div class="container">
                <div class="contentCol">
                    <?php foreach ($contentArray as $item) { ?>
                        <h4>
                            <?php echo esc_html($item['title']) ?>
                        </h4>
                        <?php echo $item['description'] ?>
                    <?php } ?>
                </div>
                <div class="contentCol fixed">
                    <a class="getInTouchBtn" href="<?php echo esc_url($get_in_touch_link['url']) ?>">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>