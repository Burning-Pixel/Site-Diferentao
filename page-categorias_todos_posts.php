<?php
/*
Template Name: categorias todos os posts
*/
?>

<?php
	global $options;
		foreach ($options as $value) {
			if (get_settings( $value['id'] ) === FALSE) { 
				$$value['id'] = stripslashes( $value['std'] ); 
			} else { 
				$$value['id'] = stripslashes( get_settings( $value['id'] ) ); 
			} 
		}
?>
<?php get_header(); ?>

<div style="background: royalblue">
    <?php
    echo '<pre>';
    print_r($_REQUEST);
    echo '</pre>';
    ?>
</div>


<div id="container_single_1">
    
    <div id="single_diferentao_content">
        
        <div id="head_single">
                <a href="<?php bloginfo('url'); ?>" title="Home"><div id="home_logo"></div></a>

                  <div id="publicidade_home">

                  </div>

              <div id="midias_sociais">
                  <a href="https://www.facebook.com/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_face"></div></a>
                  <a href="https://twitter.com/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_tweeter"></div></a>
                  <a href="https://www.youtube.com/user/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_youtube"></div></a>
                  <a href="https://plus.google.com/+DiferentaoBr/about" target="blank"><div id="midias_sociais_item" class="ms_gmais"></div></a>

              </div>

              <div id="busca_home">
                  <form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
                      <input type="text" value="BUSCA" onfocus="if (this.value == 'BUSCA') {this.value = '';}" onblur="if (this.value == '') {this.value = 'BUSCA';}" size="18" maxlength="50" name="s" id="s" /> 
                  </form> 
              </div>

              <div id="menu_home">
                  <div id="menu">

                      <?php if ( function_exists('wp_nav_menu') ) { 
                            wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary-menu', 'depth' => '4', 'show_home' => 'true' ) ); }

                            else {?>

                              <ul>
                              <li class="<?php if (is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>

                          <?php wp_list_pages('title_li=&sort_column=menu_order&depth=4');   ?>
                              </ul>

                      <?php } ?>

                  </div>
              </div>
        </div>
    </div>
    
    <div id="single_diferentao_content_2">
        
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts('cat=' . $categoria->term_id . '&showposts=6');?>
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div id="page_post_thumbs" class="mosaic-block bar2">
                <div class="post" id="post-<?php the_ID(); ?>">
                    <a href="<?php the_permalink()?>"  class="mosaic-overlay" style="bottom:-28px; height: 70px">
                        <div class="details">
                           <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cat_cor($categoria->term_id)?>; margin: 10px 0 0 20px;"><?php title_excerpt_novidades(30)?></p><br/>
                           <p class="dt_cat_home" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>
                        </div>
                    </a>


                    <div class="mosaic-backdrop">
                        <?php the_post_thumbnail(array(330,250,true)); ?>
                   </div>

                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        
        <?php include(TEMPLATEPATH."/primary-sidebar.php");?>
        
    </div>
</div>
    
<div id="container_single_3">
    <div id="single_diferentao_content_3">
        
        <div id="content_single_3">
            <h1 class="single_h1" style="color: <?php echo $cor_cat?>;"> ASSISTA MAIS VÍDEOS DA CATEGORIA <?php echo $categoria;?></h1>
            <?php my_related_posts('')?>
            
            <h1 class="single_h1" style="color: #fff; margin: 30px 0 15px;">outras categorias</h1>
            
            <?php my_related_posts(2)?>
        </div>
        
        <div id="single_sidebar">
            
            <h1 class="single_h1" style="color: #fff;">posts mais recentes</h1>            
                <?php
                    $aRecentPosts = new WP_Query("showposts=3"); // 5 é o número de posts recentes que você deseja mostrar
                    while($aRecentPosts->have_posts()) : $aRecentPosts->the_post();?>
            
            <div id="post_noviadades_thumbs" class="mosaic-block bar2" style="width:250px">

                            <div class="post" id="post-<?php the_ID(); ?>">

                                <a href="<?php the_permalink()?>"  class="mosaic-overlay mosaic_novidades" style="bottom:-28px; height: 70px">
                                   <div class="details">
                                       <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                                       <p class="dt_cat_home" style="color: <?php echo cor_categoria($post->ID)?>;" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

                                   </div>                    
                               </a>

                               <div class="mosaic-backdrop">
                                   <img class="post_novidades_imagem" height="140" width="250" src="<?php  echo gerar_thumbnail_youtube($post->ID); ?>">
                               </div>
                            </div>

                       </div>
                    
                <?php endwhile; ?>
                    
            <div class="fb-like-box" data-href="http://www.facebook.com/canaldiferentao" data-width="250" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
        </div>
        
    </div>

    <div id="single_diferentao_content_3" style="margin: 0 auto 0px auto;">
        <div id="frase_rodape">
            <h1 style="margin: 0 0 0 150px;">"SEJA A DIFERENÇA QUE VOCÊ DESEJA PARA O MUNDO"</h1>
            <h1 style="margin: 0 215px 0 0; float: right">GANDHI</h1>
        </div>
    </div>
    
    

    <?php get_footer(); ?>
</div>