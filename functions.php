<?php
if ( function_exists('register_sidebar') ) {
	register_sidebar( array('name'=>'Primary Sidebar') );
	register_sidebar( array('name'=>'Secondary Sidebar') );
}
?>
<?php
function widget_mytheme_search() {
?>
<li><h2>Search</h2>
<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/"> <input type="text" value="type, hit enter" onfocus="if (this.value == 'type, hit enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'type, hit enter';}" size="18" maxlength="50" name="s" id="s" /> </form> </li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
?>
<?php
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }

?>
<?php
function footer_wp_link() {
    return 'Powered by <a href="http://WordPress.org/" title="WordPress">WordPress</a>';
}
add_shortcode('wp-link', 'footer_wp_link');	

function footer_credit_link() {
    return 'Development by <a href="http://empirethemes.com/" title="Empire Themes">ET</a>';
}
add_shortcode('credit-link', 'footer_credit_link');	

function footer_copy_text() {
    return '&copy; '  . date('Y') .' '. get_bloginfo('name') .'';
}
add_shortcode('copyright-text', 'footer_copy_text');	

function footer_all_rights() {
    return 'All Rights Reserved';
}
add_shortcode('all-rights', 'footer_all_rights');	

function footer_built_on() {
    return 'Built on <a href="http://empirethemes.com/et-starter/">ET-Starter</a>';
}
add_shortcode('built-on', 'footer_built_on');	

?>
<?php
$themename = "ET-Starter";
$shortname = "et";

$options = array (	
			
	array(	"type" => "open"),
			
	array(	"name" => "Text in Footer:",
			"desc" => "You can use the following shortcodes in your footer: [copyright-text] [all-rights-reserved] [wp-link] [credit-link] [built-on]",
            "id" => $shortname."_footer_info",
            "std" => "[copyright-text]. [all-rights]. [wp-link]. [credit-link].",
            "type" => "textarea"),
    
    array(	"type" => "close"),
   
	array(	"type" => "open"),
    
   	array(	"name" => "Google Analytics Code:",
			"desc" => "Paste your Google Analytics code here",
            "id" => $shortname."_google",
            "type" => "textarea"),
    
    array(	"type" => "close"),
	
	array(	"type" => "open"),
	
	array(  "name" => "Would you like a two column theme?",
			"desc" => "Yes, if checked.",
            "id" => $shortname."_threecolumn_disable",
            "type" => "checkbox",
            "std" => "false"),
	
	array(	"type" => "close"),

	array(	"type" => "open"),
	
	array( "name" => "Main Content Order",
			"desc" => "If you have two columns activated, 'secondary sidebar' is removed from column order and content-middle turns into single column theme",
			"id" => $shortname."_columnorder",
			"options" => array("content-middle", "content-left", "content-right"),
			"std" => "content-middle",
			"type" => "select"),
			
	array(	"type" => "close"),
	
);



function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page(Theme." Options", "".Theme." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2 style="font-style:normal;">Theme Options</h2>

<div style="width:600px; overflow:hidden;">

<div>

<div style="background:#dcf3db; padding:10px 20px; margin:20px 0; border:1px solid #c9e6c8; -moz-border-radius: 6px; -khtml-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px;"><p>Thank you for downloading our <strong><i><?php echo $themename; ?></i></strong> WordPress theme. Need help? Please visit our <a href="http://empirethemes.com/forums/">Forums</a>.</p></div>

<div  style="background:#fbfbfa; border:1px solid #efefef; -moz-border-radius: 6px; -khtml-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px;">
<h3 style="font:normal 18px georgia; background:#f1f1f1; margin:0; padding:10px 20px;">License Information</h3>

<div  style="padding:20px;">

<h3 style="font:normal 14px georgia; margin:0; padding:0;">Credit Links</h3>
<p>Our credit links are not required to remain intact, but is appreciated.</p>

<h3 style="font:normal 14px georgia; margin:0; padding:0;">License</h3>
<p>Our themes are released under the GPL license. Which allows you to use our themes for personal and commercial projects.</p>


</div>
</div>

<div style="background:#fbfbfa;  margin:20px 0 20px 0;border:1px solid #e6e6e6; -moz-border-radius: 6px; -khtml-border-radius: 6px; -webkit-border-radius: 6px; border-radius: 6px;">
<h3 style="font:normal 18px georgia; background:#f1f1f1; margin:0; padding:10px 20px;">Theme Settings</h3>
<div style="padding:20px 20px 0 20px;">
<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
		 <table width="100%" border="0" style="padding:10px 0;">
		
        
        
		<?php break;
		
		case "close":
		?>
		</table><div style="margin:0 0 4px 0; padding:0 0 4px 0; border-bottom:1px solid #e9e9e9;"></div>
   
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" ><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="40%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="60%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="40%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="60%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:100px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
            
        </tr>

        <tr>
            <td><?php echo $value['desc']; ?></td>
        </tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="40%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="60%"><select name="<?php echo $value['id']; ?>" style="width:150px;" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select><?php echo $value['notes']; ?></td>
       </tr>
                
       <tr>
            <td><?php echo $value['desc']; ?></td>
       </tr>
		

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="40%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="60%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        <?php echo $value['desc']; ?> <?php echo $value['notes']; ?>
                        </td>
            </tr>
                      
           

        
        
		<?php
        break;
            
		case "input":
		?>
			<tr>
				 <td width="40%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
				<td width="60%">
				<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_settings($value['id']) != "") { echo get_settings($value['id']); } else { echo $value['std']; } ?>" style="border: 1px solid #DDDDDD"/>
				<?php echo $value['notes']; ?>
				</td>
			</tr>
            
            
            
        <?php 		break;
	
 
} 
}
?>

</table>

<p class="submit" style="clear:left;">
<input name="save" type="submit" class="button-primary" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</div>
</form>
</div>
</div>

</div>
</div>
</div>
<?php
}

add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php

if(function_exists('register_nav_menu')) {  

add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}
}

    /** Tell WordPress to run yourtheme_setup() when the 'after_setup_theme' hook is run. */
    add_action( 'after_setup_theme', 'starter_setup' );

    if ( ! function_exists('starter_setup') ):
    /**
    * @uses add_custom_image_header() To add support for a custom header.
    * @uses register_default_headers() To register the default custom header images provided with the theme.
    *
    * @since 3.0.0
    */
    function starter_setup() {

    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Your changeable header business starts here
    define( 'HEADER_TEXTCOLOR', '' );
    // No CSS, just IMG call. The %s is a placeholder for the theme template directory URI.
    define( 'HEADER_IMAGE', '%s/images/headers/4.jpg' );

    // The height and width of your custom header. You can hook into the theme's own filters to change these values.
    // Add a filter to yourtheme_header_image_width and yourtheme_header_image_height to change these values.
    define( 'HEADER_IMAGE_WIDTH', apply_filters( 'starter_header_image_width', 940 ) );
    define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'starter_header_image_height', 198 ) );

    // We'll be using post thumbnails for custom header images on posts and pages.
    // We want them to be 940 pixels wide by 198 pixels tall (larger images will be auto-cropped to fit).
    set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

    // Don't support text inside the header image.
    define( 'NO_HEADER_TEXT', true );

    // Add a way for the custom header to be styled in the admin panel that controls
    // custom headers. See yourtheme_admin_header_style(), below.
    add_custom_image_header( '', 'starter_admin_header_style' );

    // … and thus ends the changeable header business.

    // Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
    register_default_headers( array (
    '1' => array (
    'url' => '%s/images/headers/1.jpg',
    'thumbnail_url' => '%s/images/headers/1-thumbnail.jpg',
    'description' => __( '1', 'starter' )
    ),
    '2' => array (
    'url' => '%s/images/headers/2.jpg',
    'thumbnail_url' => '%s/images/headers/2-thumbnail.jpg',
    'description' => __( '2', 'starter' )
    ),
    '3' => array (
    'url' => '%s/images/headers/3.jpg',
    'thumbnail_url' => '%s/images/headers/3-thumbnail.jpg',
    'description' => __( '3', 'starter' )
    ),
    '4' => array (
    'url' => '%s/images/headers/4.jpg',
    'thumbnail_url' => '%s/images/headers/4-thumbnail.jpg',
    'description' => __( '4', 'starter' )
    ),
    '5' => array (
    'url' => '%s/images/headers/5.jpg',
    'thumbnail_url' => '%s/images/headers/5-thumbnail.jpg',
    'description' => __( '5', 'starter' )
    ),
    '6' => array (
    'url' => '%s/images/headers/6.jpg',
    'thumbnail_url' => '%s/images/headers/6-thumbnail.jpg',
    'description' => __( '6', 'starter' )
    ),
    '7' => array (
    'url' => '%s/images/headers/7.jpg',
    'thumbnail_url' => '%s/images/headers/7-thumbnail.jpg',
    'description' => __( '7', 'starter' )
    ),
    '8' => array (
    'url' => '%s/images/headers/8.jpg',
    'thumbnail_url' => '%s/images/headers/8-thumbnail.jpg',
    'description' => __( '8', 'starter' )
    )
    ) );
    }
    endif;

    if ( ! function_exists( 'starter_admin_header_style' ) ) :
    /**
    * Styles the header image displayed on the Appearance > Header admin panel.
    *
    * Referenced via add_custom_image_header() in starter_setup().
    *
    * @since 3.0.0
    */
    function starter_admin_header_style() {
    ?>
    <style type="text/css">
    #headimg {
    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
    }
    #headimg h1, #headimg #desc {
    display: none;
    }
    </style>
    <?php
    }
    endif;

if(function_exists('add_custom_background')) { add_custom_background(); }


    function gerar_iframe_youtube($link_do_video){
        $iframe_youtube = 'https://www.youtube.com/embed/' . substr($link_do_video,32);
        
        return $iframe_youtube;
    }
    
    
//    FUNÇÃO QUE RESGATA QUAL A THUMBNAIL DO POST
    function gerar_thumbnail_youtube($id_post){
        if (has_post_thumbnail( $id_post ) ):
            $thumbnail_youtube = wp_get_attachment_image_src( get_post_thumbnail_id( $id_post->ID ), 'single-post-thumbnail' );         
        endif;
        
        return $thumbnail_youtube[0];
    }
    
//    PEGAR O NOME DA CATEGORIA DO POST
  function nome_categoria($id_post){  
    global $post;
    $categoria = get_the_category($id_post);
    $nomeCategoria = $categoria[0]->cat_name;
    
    return $nomeCategoria;
  }
  
//    GERAR COR PARA CATEGORIA DO POST
  function cor_categoria($id_post){
    global $post;
    $categoria = get_the_category($id_post);
    
        switch ($categoria[0]->term_id) {
            case 1:
                $cor_categoria = '';
            break;

            case 2:
                $cor_categoria = '#34cec9';
                break;

            case 3:
                $cor_categoria = '#f26234';
                break;

            case 4:
                $cor_categoria = '#7E40F4';
                break;

            case 5:
                $cor_categoria = '#faba13';
                break;

            case 6:
                $cor_categoria = '#4680ee';
                break;
            case 7:
                $cor_categoria = '#faba13';
                break;

            case 8:
                $cor_categoria = '#90c73e';
                break;

            case 9:
                $cor_categoria = '#F312FF';
                break;

            case 10:
                $cor_categoria = '#faba13';
                break;

            case 11:
                $cor_categoria = '#6f9d29';
                break;

            case 15:
                $cor_categoria = '#DBDE08';
                break;

            case 13:
                $cor_categoria = '#067117';
                break;

            case 272:
                $cor_categoria = '#4680ee';
                break;

        }
    
        return $cor_categoria;
    }
  
  
//    GERAR COR PARA CATEGORIA POR CATEGORIA
  function cat_cor($id_cat){
    
        switch ($id_cat) {
            case 1:
                $cor_categoria = '';
            break;

            case 2:
                $cor_categoria = '#34cec9';
                break;

            case 3:
                $cor_categoria = '#f26234';
                break;

            case 4:
                $cor_categoria = '#7E40F4';
                break;

            case 5:
                $cor_categoria = '#faba13';
                break;

            case 6:
                $cor_categoria = '#4680ee';
                break;
            case 7:
                $cor_categoria = '#faba13';
                break;

            case 8:
                $cor_categoria = '#90c73e';
                break;

            case 9:
                $cor_categoria = '#F312FF';
                break;

            case 10:
                $cor_categoria = '#faba13';
                break;

            case 11:
                $cor_categoria = '#6f9d29';
                break;

            case 15:
                $cor_categoria = '#DBDE08';
                break;

            case 13:
                $cor_categoria = '#067117';
                break;

            case 272:
                $cor_categoria = '#4680ee';
                break;

        }
    
        return $cor_categoria;
    }
  
  
  // Verifica se não existe nenhuma função com o nome tutsup_session_start
if ( ! function_exists( 'tutsup_session_start' ) ) {
    // Cria a função
    function tutsup_session_start() {
        // Inicia uma sessão PHP
        if ( ! session_id() ) session_start();
    }
    // Executa a ação
    add_action( 'init', 'tutsup_session_start' );
}

// Verifica se não existe nenhuma função com o nome tp_count_post_views
if ( ! function_exists( 'tp_count_post_views' ) ) {
    // Conta os views do post
    function tp_count_post_views () {	
        // Garante que vamos tratar apenas de posts
        if ( is_single() ) {
        
            // Precisamos da variável $post global para obter o ID do post
            global $post;
            
            // Se a sessão daquele posts não estiver vazia
            if ( empty( $_SESSION[ 'tp_post_counter_' . $post->ID ] ) ) {
                
                // Cria a sessão do posts
                $_SESSION[ 'tp_post_counter_' . $post->ID ] = true;
            
                // Cria ou obtém o valor da chave para contarmos
                $key = 'tp_post_counter';
                $key_value = get_post_meta( $post->ID, $key, true );
                
                // Se a chave estiver vazia, valor será 1
                if ( empty( $key_value ) ) { // Verifica o valor
                    $key_value = 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } else {
                    // Caso contrário, o valor atual + 1
                    $key_value += 1;
                    update_post_meta( $post->ID, $key, $key_value );
                } // Verifica o valor
                
            } // Checa a sessão
            
        } // is_single
        
        return;
        
    }
    add_action( 'get_header', 'tp_count_post_views' );
}

/* POSTS RELACIONADOS */

function my_related_posts($posts_per_page) { 
    
    if($posts_per_page != null){
        $args = array(
            'posts_per_page' => $posts_per_page,
            'post_in'  => get_the_tag_list(),
        ); 
        
    }else{        
        $args = array(
            'posts_per_page' => 6,
            'post_in'  => get_the_tag_list(),
        ); 
    }
    
    $the_query = new WP_Query( $args ); 
    
    while ( $the_query->have_posts() ) : $the_query->the_post();
    ?> 
   
    <div id="post_noviadades_thumbs" class="mosaic-block bar2">

        <div class="post" id="post-<?php the_ID(); ?>">

            <a href="<?php the_permalink()?>"  class="mosaic-overlay">
               <div class="details">
                   <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                   <p class="dt_cat_home"><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

               </div>                    
           </a>

           <div class="mosaic-backdrop">
               <img class="post_novidades_imagem" height="170" width="310" src="<?php  echo gerar_thumbnail_youtube($post->ID); ?>">
           </div>
        </div>

    </div>

    <?php
    endwhile; 
    echo '<div class="clear"></div></section>'; 
    wp_reset_postdata(); 
}

function my_breadcrumb() {
    if ( !is_front_page() ) {
           echo '<p class="breadcrumb"><span class="breadcrumb_info">You are here:</span> <a href="';
           echo get_option('home');
           echo '">';
           bloginfo('name');
           echo "</a> &raquo; ";
           }

           if ( is_category() || is_single() ) {
                   $category = get_the_category();
                   $ID = $category[0]->cat_ID;
                   echo get_category_parents($ID, TRUE, ' &raquo;  ', FALSE );
           }

           if(is_single() || is_page()) {the_title();}
           if(is_tag()){ echo "Tag: ".single_tag_title('',FALSE); }
           if(is_404()){ echo "404 - Page not Found"; }
           if(is_search()){ echo "Search"; }
           if(is_year()){ echo get_the_time('Y'); }

           echo "</p>";

}

// LImitar o titulo do post

function title_excerpt_novidades($maxchars) {
    $title = get_the_title($post->ID);
    $title = substr($title,0,$maxchars);
    echo $title;
}


// LIMITAR CARACTERES NO TITULO
function title_length($maxchars) 
{
 $title = get_the_title($post->ID);
 $title = substr($title,0,$maxchars);
 $tamanhotitulo=strlen($title);
 if ($tamanhotitulo < $maxchars)
 echo $title;
 else
 echo $title . '...';
}

//POSTS ALEATÓRIOS
function posts_aleatorios(){
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('orderby=rand&showposts=10');
    
    if (have_posts()) : while (have_posts()) : the_post(); ?>
        
                <div id="post_noviadades_thumbs" class="mosaic-block bar2">
                    <div class="post" id="post-<?php the_ID(); ?>">
                        <a href="<?php the_permalink()?>"  class="mosaic-overlay" style="bottom:-28px; height: 70px">
                            <div class="details">
                               <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php title_excerpt_novidades(30)?></p><br/>
                               <p class="dt_cat_home" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>
                            </div>
                        </a>
                        
                        
                        <div class="mosaic-backdrop">
                            <?php the_post_thumbnail(array(350,250,true)); ?>
                       </div>
                        
                    </div>
                </div>
<?php endwhile; 
    endif;
}

?>