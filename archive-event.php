<?php 
get_header(); ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('images/ocean.jpg'); ?>)"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php 
    
    the_archive_title()
    ?></h1>
    <div class="page-banner__intro">
      <p><?php the_archive_description() ?></p>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
     <?php  
     $homepageEvents = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'event',
      'orderby' => 'meta_key_num',
      'meta_key' => 'event_date',
      'order' => 'ASC',
      'meta_query' => array(array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => date('Ymd')
      ))
    ));
     while($homepageEvents -> have_posts()){
      $homepageEvents -> the_post(); get_template_part('template-parts/event','excerpt'); }
      echo paginate_links();
     ?>
</div>
<?php get_footer();
?>