<?php
/**
 * Template Name: Contact
 */
get_header();
?>

<?php
$description = get_field(selector: 'description');
$phone_number = get_field(selector: 'phone_number');
$email_address = get_field(selector: 'email_address');
$whatsapp_number = get_field(selector: 'whatsapp_number');
$telegram_username = get_field(selector: 'telegram_username');
?>

<main class="portfolio-page">
    <section class="pageTitleSectionWrapper">
        <div class="pageTitleSection">
            <div class="container">
                <h2>Contact us</h2>
            </div>
        </div>
    </section>
    <section class="pageContentSectionWrapper">
        <div class="pageContentSection">
            <div class="container">
                <div class="contentCol contact">
                    <?php echo $description ?>
                    <div class="contactInfo">
                        <a target="_blank"  href="tel:+<?php echo esc_html($phone_number) ?>" class="phone"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/icons/phoneBlackIcon.png"
                                alt="phone Icon"> <span>+<?php echo esc_html($phone_number) ?></span></a>
                        <a target="_blank"  href="mailto:<?php echo esc_html($email_address) ?>" class="email"><img
                                src="<?php echo get_template_directory_uri(); ?>/assets/icons/emailBlackIcon.png"
                                alt="email Icon"> <span><?php echo esc_html($email_address) ?></span></a>
                    </div>
                    <div class="messengersBox">
                        <a target="_blank"  class="messengerLink" href="https://wa.me/+<?php echo esc_html($whatsapp_number) ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/whatsappIcon.png"
                                alt="email Icon"> <span>Contact us on Whatsapp</span>
                        </a>
                        <a target="_blank" class="messengerLink" href="https://t.me/<?php echo esc_html($telegram_username) ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/telegramIcon.png"
                                alt="email Icon"> <span>Contact us on Telegram</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>