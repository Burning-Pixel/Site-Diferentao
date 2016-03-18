<?php
/*
Template Name: teste parallax
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

<html>
    
    <head>
        
        <style>
            #container{
                background: cyan;
                border: 0px solid;
                margin: 0 auto;
            }
            
            #content{
                width: 960px;
                margin: 0 auto;
                background: red;
                overflow: hidden;
            }
            
            #content_1, #content_2, #content_3{
                height: 1490px;
                float: left;
                padding: 5px;
                margin: 5px 0px;
                background: greenyellow;
                width: 100%;
                
            }
            
            #menu{
                width: 100%;
                float: left;
                background: teal;
                height: 50px;
                
            }
            
            #menu li{
                float: left;
                background: yellow;
                height: 50px;
                list-style: none;
                padding: 0 5px;
                margin: 0px;
                overflow: hidden;
            }
            
        </style>
   
        
    </head>
    
    <body>
        
        <div id="container">
            
            <div id="content">
                
                <div id="menu">
                    <ul>
                        <li id="1" class="bt_menu">
                           content_1 
                        </li>
                        
                        <li id="2" class="bt_menu">
                           content_2 
                        </li>
                        
                        <li id="3" class="bt_menu">
                           content_3
                        </li>
                    </ul>
                </div>
                
                <div id="content_1">
                    <p>Lorem 1</p>
                </div>
                
                <div id="content_2">
                    <p>Lorem 2</p>
                </div>
                
                <div id="content_3">
                    <p>Lorem 3</p>
                </div>
                
            </div>
            
        </div>

    </body>
</html>