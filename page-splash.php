<?php /* Template name: Splash */ 

get_header('splash');
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/compiled/page--splash.css" />

<div class="splash-page">
    <div class="logo">
        <img src="https://highvisuk.com/wp-content/uploads/2024/07/highvis-logo-white.png" alt="High Vis" />
    </div>
    <div class="socials">
        <?php get_template_part('template-parts/social-media-icons'); ?>
    </div>
</div>

<?php get_footer(); ?>