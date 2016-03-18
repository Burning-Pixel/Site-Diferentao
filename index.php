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


          
    <div id="container">
        
    <div id="content_home">
        
        <a href="<?php bloginfo('url'); ?>" title="Home"><div id="home_logo"></div></a>

        <!--PUBLICIDADE DO GOOGLE--> 
        <div id="publicidade_home">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Anuncio TOP -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-1746143701175258"
                 data-ad-slot="5247708527"
                 data-ad-format="auto">
            </ins>
            
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
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

    <div id="post_home">

        
        <div id="post_home_1" class="mosaic-block bar2">
            
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=7&showposts=1');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                 <div class="post" id="post-<?php the_ID(); ?>">

                     <a href="<?php the_permalink()?>"  class="mosaic-overlay">
                        <div class="details">
                            <p style="color: #f26234; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                            <p class="dt_cat_home"><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>
                            
                        </div>                    
                    </a>

                    <div class="mosaic-backdrop">
                        <?php the_post_thumbnail(array(480,450,true)); ?>
                    </div>
                 </div>

                 <?php endwhile; ?>
             <?php endif; ?>

        </div>
        
        <div id="post_home_2" class="mosaic-block bar2">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=7&showposts=1&offset=1');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                 <div class="post" id="post-<?php the_ID(); ?>">

                     <a href="<?php the_permalink()?>"  class="mosaic-overlay">
                        <div class="details">
                            <p style="color: #90c73e; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                            <p style="color: #90c73e;" class="dt_cat_home"><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>
                        </div>                    
                    </a>

                    <div class="mosaic-backdrop">
                        <?php the_post_thumbnail(array(500,350,true)); ?>
                    </div>
                 </div>

                 <?php endwhile; ?>
             <?php endif; ?>
        </div>
        
        <div id="post_home_3" class="mosaic-block bar2">
            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=7&showposts=1&offset=2');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                 <div class="post" id="post-<?php the_ID(); ?>">

                     <a href="<?php the_permalink()?>"  class="mosaic-overlay">
                        <div class="details">
                            <p style="color: #4680ee; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                            <p style="color: #4680ee;" class="dt_cat_home"><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>
                        </div>                    
                    </a>

                    <div class="mosaic-backdrop">
                        <?php the_post_thumbnail(array(500,350,true)); ?>
                    </div>
                 </div>

                 <?php endwhile; ?>
             <?php endif; ?>
        </div>

    </div>

</div>


<div id="content_novidades">
    
    <h1 style="margin: 35px 0 35px 0; color: #000">O QUE TEM DE NOVIDADE NO DIFERENTÃO</h1>
    
    <div id="post_noviadades" >
        
         <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=-11&showposts=3');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                
                <div id="post_noviadades_thumbs" class="mosaic-block bar2">
                    
                    <div class="post" id="post-<?php the_ID(); ?>">

                        <a href="<?php the_permalink()?>"  class="mosaic-overlay" style="bottom:-28px; height: 70px">
                           <div class="details">
                               <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                               <p class="dt_cat_home" style="color: <?php echo cor_categoria($post->ID)?>;" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

                           </div>                    
                       </a>

                       <div class="mosaic-backdrop">
                           <?php the_post_thumbnail(array(330,250,true)); ?>
                       </div>
                    </div>
                    
                </div>
                
                 <?php endwhile; ?>
             <?php endif; ?>
        
    </div>
    
    <div id="post_noviadades" >
        
         <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=-11&showposts=3&offset=3');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
        
                <div id="post_noviadades_thumbs" class="mosaic-block bar2">
                    
                    <div class="post" id="post-<?php the_ID(); ?>">

                        <a href="<?php the_permalink()?>"  class="mosaic-overlay mosaic_novidades" style="bottom:-28px; height: 70px">
                           <div class="details">
                               <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                               <p class="dt_cat_home" style="color: <?php echo cor_categoria($post->ID)?>;" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

                           </div>                    
                       </a>

                       <div class="mosaic-backdrop">
                           <?php the_post_thumbnail(array(330,250,true)); ?>
                       </div>
                    </div>
                    
                </div>
                
                 <?php endwhile; ?>
             <?php endif; ?>
        
    </div>
    
    <div id="post_noviadades" >
        
         <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             query_posts('cat=-11&showposts=3&offset=6');?>
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
        
                <div id="post_noviadades_thumbs" class="mosaic-block bar2">
                    
                    <div class="post" id="post-<?php the_ID(); ?>">

                        <a href="<?php the_permalink()?>"  class="mosaic-overlay mosaic_novidades" style="bottom:-28px; height: 70px">
                           <div class="details">
                               <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                               <p class="dt_cat_home" style="color: <?php echo cor_categoria($post->ID)?>;" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

                           </div>                    
                       </a>

                       <div class="mosaic-backdrop">
                           <?php the_post_thumbnail(array(330,250,true)); ?>
                       </div>
                    </div>
                    
                </div>
                
                 <?php endwhile; ?>
             <?php endif; ?>
        
    </div>
    
</div>

    <div id="content_top_3">
        <h1 style="margin: 35px 0 15px 0;">TOP 3 DE TODOS OS TEMPOS</h1>
        
        <?php
        $nova_consulta = new WP_Query( 
            array(
                'posts_per_page'      => 3,                 // Máximo de 5 artigos
                'no_found_rows'       => true,              // Não conta linhas
                'post_status'         => 'publish',         // Somente posts publicados
                'ignore_sticky_posts' => true,              // Ignora posts fixos
                'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
                'meta_key'            => 'tp_post_counter', // A nossa post meta
                'order'               => 'DESC'             // Ordem decrescente
            )
        );
        ?>

        <div class="mais-vistos">
            <?php if ( $nova_consulta->have_posts() ): ?>
                <?php while ( $nova_consulta->have_posts() ): ?>

                    <?php $nova_consulta->the_post(); ?>
                    <?php $tp_post_counter = get_post_meta( $post->ID, 'tp_post_counter', true );?>


                            <div id="post_noviadades_thumbs" class="mosaic-block bar2">

                            <div class="post" id="post-<?php the_ID(); ?>">

                                <a href="<?php the_permalink()?>"  class="mosaic-overlay mosaic_novidades" style="bottom:-28px; height: 70px">
                                   <div class="details">
                                       <p class="post_noviadades_thumbs_titulo" style="color: <?php echo cor_categoria($post->ID)?>; margin: 10px 0 0 20px;"><?php the_title()?></p><br/>
                                       <p class="dt_cat_home" style="color: <?php echo cor_categoria($post->ID)?>;" ><?php the_time('j.m.Y') ?> / <?php echo nome_categoria($post->ID); ?></p>

                                   </div>                    
                               </a>

                               <div class="mosaic-backdrop">
                                   <?php the_post_thumbnail(array(330,250,true)); ?>
                               </div>
                            </div>

                        </div>



                <?php endwhile; ?>
            <?php endif; // have_posts ?>

            <?php wp_reset_postdata(); ?>
        </div> <!-- .mais-vistos -->        
        
        <div id="content_fique_ligado">
            <h1 style="margin: 50px 0 15px 0;">FIQUE LIGADO</h1>
            
            <div id="fb">
                <div class="fb-like-box" data-href="http://www.facebook.com/canaldiferentao" data-width="470" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
            </div>
            
            <div id="tw">
                <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/canaldiferentao" data-widget-id="404733172845273088">Tweets de @canaldiferentao</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

            </div>
            
        </div>
        
        <div id="publicidade_top_3">
            
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Anuncio TOP -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-1746143701175258"
                 data-ad-slot="5247708527"
                 data-ad-format="auto">
            </ins>
            
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div> 

        <div id="frase_rodape">
            <h1 style="margin: 0 0 0 150px;">"SEJA A DIFERENÇA QUE VOCÊ DESEJA PARA O MUNDO"</h1>
            <h1 style="margin: 0 215px 0 0; float: right">GANDHI</h1>
        </div>
        
    </div> <!-- fim do top 3 -->
    
<?php get_footer(); ?>