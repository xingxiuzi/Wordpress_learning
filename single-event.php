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
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Event home</a> <span class="metabox__main"><?php the_title(); ?></span>
            </p>
        </div>
            <?php the_content(); ?>
        </div>
        <?php 
        $relatedPrograms = get_field('program_relationship');
        if($relatedPrograms){
          echo '<hr class="section-break">';
          echo '<h2 class="headline headeline--midium">related Programs</h2>';
          echo '<ul class="link-list min-list">';
          foreach($relatedPrograms as $program){ ?>
          <li><a href="<?php the_permalink($program); ?>"><?php echo get_the_title($program) ?></a></li>
          <?php };
          echo '</ul>';
        };
        ?>
    </div>
    <?php } 
    
    get_footer();

?>