<?php 
    
    function test_function() {
        
        wp_enqueue_style('google-fonts','//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-awesome','//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('main_styles',get_theme_file_uri('/build/style-index.css'));
        wp_enqueue_style('extra_styles',get_theme_file_uri('/build/index.css'));
        wp_enqueue_script('main_scripts',get_theme_file_uri('/build/index.js'),NULL,'1.0',true);
        wp_enqueue_style('main_styles',get_stylesheet_uri());
        
    };

    add_action('wp_enqueue_scripts','test_function');

    function test_features() {

        register_nav_menu('headerMenuLocation','Header Menu Location');
        register_nav_menu('footerMenuOne','footer Menu One');
        register_nav_menu('footerMenuTwo','footer Menu Two');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_image_size('image400',400,260,true);
        add_image_size('image480',480,650,true);
        add_image_size('pageBanner',1500,350,true);
    };

    add_action('after_setup_theme','test_features');

    function adjust_query($query){
        if(!is_admin() AND is_post_type_archive('program') AND is_main_query()){
            $query ->set('orderby','title');
            $query ->set('order','ASC');
            $query ->set('post_per_page',10);
        };
    };

    add_action('pre_get_posts','adjust_query');

    function pageBanner($bannerdata){ ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo $bannerdata['backgroundImage']['url']; ?>)"></div>
                <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p><?php echo $bannerdata['subtitle'] ?></p>
                </div>
            </div>
        </div>
    <?php };

?>