<?php 

    get_header();

    while (have_posts()) {
        the_post(); pageBanner(array(
          'subtitle' => get_field('page_banner_subtitle'),
          'backgroundImage' => get_field('page_banner_image')
        )); ?>
    <div class="container container--narrow page-section">
        <div class="generic-content">
            <div class="row group">
                <div class="one-third"><?php the_post_thumbnail('image480'); ?></div>
                <div class="two-thirds"><?php the_content(); ?></div>
            </div>
        </div>
        <?php 
        $relatedPrograms = get_field('program_relationship');
        if($relatedPrograms){
          echo '<hr class="section-break">';
          echo '<h2 class="headline headeline--midium">Subject Taught</h2>';
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