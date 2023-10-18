<?php 

    get_header();

    while (have_posts()) {
        the_post(); ?>
        <div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>)"></div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
          <p>Learn how the school of your dreams got started.</p>
        </div>
      </div>
    </div>
    
    <div class="container container--narrow page-section">
        <div class="generic-content">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Program home</a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
            <?php the_content(); ?>
        </div>

        <?php  
        $professor = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'professor',
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(
            array(
            'key' => 'program_relationship',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"'
            )
          )
        ));
        if($professor->have_posts()){
            echo '<hr class="section-break">';
            echo '<h2 class="headline headeline--medium">upcoming '. get_the_title() .' events</h2>';

            echo '<ul class="professor-cards"';
            while($professor -> have_posts()){
            $professor -> the_post(); ?>
                    <li class="professor-card__list-item">
                      <a class="professor-card" href="<?php the_permalink(); ?>">
                          <img src="<?php the_post_thumbnail_url(); ?>" class="professor-card__image">
                          <span class="professor-card__name"><?php the_title(); ?></span>
                      </a>
                    </li>
            <?php }
            echo '</ul>';
        }

     wp_reset_postdata();

     $homepageEvents = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'event',
      'orderby' => 'meta_key_num',
      'meta_key' => 'event_date',
      'order' => 'ASC',
      'meta_query' => array(
        array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => date('Ymd')
      ),
        array(
        'key' => 'program_relationship',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"'
        )
      )
    ));
    if($homepageEvents->have_posts()){
        echo '<hr class="section-break">';
        echo '<h2 class="headline headeline--medium">upcoming '. get_the_title() .' events</h2>';
        while($homepageEvents -> have_posts()){
        $homepageEvents -> the_post(); get_template_part('template-parts/event','excerpt'); }
    }
     ?>

    </div>
    <?php } 
    
    get_footer();

?>