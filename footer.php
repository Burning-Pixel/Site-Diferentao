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
<div id="footer">

    <div id="home_footer">
       
        <a href="<?php bloginfo('url'); ?>"><div id="logo_footer"></div></a>
        
        
        <div id="menu_rodape">
            
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
        
        
        <div id="midias_sociais" style="margin: 30px 0 0 0;">
        <a href="https://www.facebook.com/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_face"></div></a>
        <a href="https://twitter.com/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_tweeter"></div></a>
        <a href="https://www.youtube.com/user/canaldiferentao" target="blank"><div id="midias_sociais_item" class="ms_youtube"></div></a>
        <a href="https://plus.google.com/+DiferentaoBr/about" target="blank"><div id="midias_sociais_item" class="ms_gmais"></div></a>

        </div>
      
    </div>

</div>    

</div><!-- end container -->

<?php wp_footer(); ?>


</body>
</html>
