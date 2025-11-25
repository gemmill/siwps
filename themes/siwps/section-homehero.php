<div id="home_hero">
    <div id="home_gallery">
        <?php get_template_part('component', 'gallery'); ?>
    </div>
</div>

<div id="home_info">
    <div class="tab">
        <?php the_content(); ?>
    </div>

    <div class="tab">
    <?php
    $research_post = get_page_by_path('the-politics-and-global-economy-page-lab', OBJECT, 'programs');
    if ($research_post) {
        echo get_the_post_thumbnail($research_post->ID, 'medium');
        echo '<h2>' . esc_html(get_the_title($research_post->ID)) . '</h2>';
    } else {
        echo '<p>Research post not found.</p>';
    }
    ?>
    </div>

    <div class="tab">
        <?php get_template_part('component', 'emailform'); ?>
    </div>
</div>
<!-- // replace carousel w/ something like this iew-source:https://tympanus.net/Development/AnimatedResponsiveImageGrid/index2.html -->
