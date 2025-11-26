<div id="home_hero">
    <div id="home_gallery">
        <?php get_template_part('component', 'gallery'); ?>
    </div>
</div>

<div id="home_info">
    <div class="tab">
        <div class="the_date">
            <?php
            $news_item_id = get_field('sticky_news_item');
            if ($news_item_id) :
                $news_item = get_post($news_item_id);
              
                ?>
                <h2><?php echo get_the_title($news_item->ID); ?></h2>
                <?php echo get_the_excerpt($news_item->ID); ?>
            <?php else: ?>
                <h2><?php echo get_the_title(); ?></h2>
                <?php echo get_the_excerpt(); ?>
            <?php endif; ?>
        </div>

    </div>

    <div class="tab">
        <?php
        $research_post = get_page_by_path('the-politics-and-global-economy-page-lab', OBJECT, 'programs');
        if ($research_post) :
            ?>
            <h2><?php echo get_the_title($research_post->ID); ?></h2>
            <?php
            $the_image = get_field('gallery', $research_post->ID)[0];
            if ($the_image) :
                ?>
                <img class="home_info_image" src="<?php echo esc_url($the_image['sizes']['large']); ?>" alt="">
            <?php endif; ?>
        <?php else : ?>
            <p>Research post not found.</p>
        <?php endif; ?>
    </div>

    <div class="tab">
        <div>
            <?php
            $giving_post = get_page_by_path('giving', OBJECT);
            if ($giving_post) :
                ?>
                <h2><?php echo get_the_title($giving_post->ID); ?></h2>
                <?php echo esc_html(get_the_excerpt($giving_post->ID)); ?>
            <?php else : ?>
                <p>Giving post not found.</p>
            <?php endif; ?>
        </div>
        <div>
            <h2>SIWPS Newsletter</h2>
            <?php get_template_part('component', 'emailform'); ?>
        </div>
    </div>
</div>
<!-- // replace carousel w/ something like this iew-source:https://tympanus.net/Development/AnimatedResponsiveImageGrid/index2.html -->
