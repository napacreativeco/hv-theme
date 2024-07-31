<?php /* Template name: Music */ 

get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/compiled/page--music.css" />

<main class="music-template">
    <?php the_content(); ?>

    <?php
    $args = array(
        'post_type'      => 'release',
        'posts_per_page' => 10,
    );
    $loop = new WP_Query($args);
    ?>

    <div class="releases-container">
        <ul class="releases-loop">
            <?php
            while ( $loop->have_posts() ) {
                $loop->the_post();
                ?>
                <li class="release-card">
                    <div class="left">
                        <div class="image">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="High Vis - <?php the_title(); ?>" />
                        </div>
                    </div>
    
                    <div class="right">
                        <div class="top">
                            <div class="title">
                                <h2><?php the_title(); ?></h2>
                            </div>
                            <div class="release-date">
                                <p><?php the_field('release_date'); ?></p>
                            </div>
                            <div class="record-label">
                                <p><?php the_field('record_label'); ?></p>
                            </div>
                        </div>

                        <div class="bottom">
                            <div class="links">

                                <?php 
                                $preorder_links = get_field('preorder_links'); 
                                $purchase_links = get_field('purchase_links');
                                $stream_links = get_field('stream_links');
                                $presave_links = get_field('presave_links');
                                ?>
                            
                                <?php if ( !empty($purchase_links) ) { ?>
                                    <details class="purchase">
                                        <summary>
                                            <span>Purchase</span>
                                            <span><?php get_template_part('template-parts/icon--arrow-down'); ?></span>
                                        </summary>
                                        <div class="details-body">
                                            <?php the_field('purchase_links'); ?>
                                        </div>
                                    </details>
                                <?php } ?>

                                <?php if ( !empty($preorder_links) ) { ?>
                                    <details class="preorder">
                                        <summary>
                                            <span>Pre-order</span>
                                            <span><?php get_template_part('template-parts/icon--arrow-down'); ?></span>
                                        </summary>
                                        <div class="details-body">
                                            <?php the_field('preorder_links'); ?>
                                        </div>
                                    </details>
                                <?php } ?>

                                <?php if ( !empty($stream_links) ) { ?>
                                    <details class="stream">
                                        <summary>
                                            <span>Listen</span>
                                            <span><?php get_template_part('template-parts/icon--arrow-down'); ?></span>
                                        </summary>
                                        <div class="details-body">
                                            <?php the_field('stream_links'); ?>
                                        </div>
                                    </details>
                                <?php } ?>

                                <?php if ( !empty($presave_links) ) { ?>
                                    <details class="presave">
                                        <summary>
                                            <span>Pre-save</span>
                                            <span><?php get_template_part('template-parts/icon--arrow-down'); ?></span>
                                        </summary>
                                        <div class="details-body">
                                            <?php the_field('presave_links'); ?>
                                        </div>
                                    </details>
                                <?php } ?>
                                
                            </div>
                        </div>

                    </div>

                </li>
                <?php
            }
            ?>
        </ul>
    </div>


</main>

<script>
    class Accordion {
        constructor(el) {
            // Store the <details> element
            this.el = el;
            // Store the <summary> element
            this.summary = el.querySelector('summary');
            // Store the <div class="content"> element
            this.content = el.querySelector('.details-body');

            // Store the animation object (so we can cancel it if needed)
            this.animation = null;
            // Store if the element is closing
            this.isClosing = false;
            // Store if the element is expanding
            this.isExpanding = false;
            // Detect user clicks on the summary element
            this.summary.addEventListener('click', (e) => this.onClick(e));
        }

        onClick(e) {
            // Stop default behaviour from the browser
            e.preventDefault();
            // Add an overflow on the <details> to avoid content overflowing
            this.el.style.overflow = 'hidden';
            // Check if the element is being closed or is already closed
            if (this.isClosing || !this.el.open) {
            this.open();
            // Check if the element is being openned or is already open
            } else if (this.isExpanding || this.el.open) {
            this.shrink();
            }
        }

        shrink() {
            // Set the element as "being closed"
            this.isClosing = true;
            
            // Store the current height of the element
            const startHeight = `${this.el.offsetHeight}px`;
            // Calculate the height of the summary
            const endHeight = `${this.summary.offsetHeight}px`;
            
            // If there is already an animation running
            if (this.animation) {
            // Cancel the current animation
            this.animation.cancel();
            }
            
            // Start a WAAPI animation
            this.animation = this.el.animate({
            // Set the keyframes from the startHeight to endHeight
            height: [startHeight, endHeight]
            }, {
            duration: 400,
            easing: 'ease-out'
            });
            
            // When the animation is complete, call onAnimationFinish()
            this.animation.onfinish = () => this.onAnimationFinish(false);
            // If the animation is cancelled, isClosing variable is set to false
            this.animation.oncancel = () => this.isClosing = false;
        }

        open() {
            // Apply a fixed height on the element
            this.el.style.height = `${this.el.offsetHeight}px`;
            // Force the [open] attribute on the details element
            this.el.open = true;
            // Wait for the next frame to call the expand function
            window.requestAnimationFrame(() => this.expand());
        }

        expand() {
            // Set the element as "being expanding"
            this.isExpanding = true;
            // Get the current fixed height of the element
            const startHeight = `${this.el.offsetHeight}px`;
            // Calculate the open height of the element (summary height + content height)
            const endHeight = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
            
            // If there is already an animation running
            if (this.animation) {
            // Cancel the current animation
            this.animation.cancel();
            }
            
            // Start a WAAPI animation
            this.animation = this.el.animate({
                // Set the keyframes from the startHeight to endHeight
                height: [startHeight, endHeight]
            }, {
                duration: 400,
                easing: 'ease-out'
            });
            // When the animation is complete, call onAnimationFinish()
            this.animation.onfinish = () => this.onAnimationFinish(true);
            // If the animation is cancelled, isExpanding variable is set to false
            this.animation.oncancel = () => this.isExpanding = false;
        }

        onAnimationFinish(open) {
            // Set the open attribute based on the parameter
            this.el.open = open;
            // Clear the stored animation
            this.animation = null;
            // Reset isClosing & isExpanding
            this.isClosing = false;
            this.isExpanding = false;
            // Remove the overflow hidden and the fixed height
            this.el.style.height = this.el.style.overflow = '';
        }
    }

    document.querySelectorAll('details').forEach((el) => {
        new Accordion(el);
    });
</script>


<?php get_footer(); ?>