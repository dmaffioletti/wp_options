<?php

if( ! empty( $_POST ) ){
	
	if( $_POST['action'] == 'save' ){
				
		foreach( $_POST as $chave => $valor ){
			argelia_save( $chave, $valor );
		}
	}
	
	add_action('admin_notices', 'argelia_msg_update');

}

function argelia_save( $name, $value ){
	
	if ( get_option( $name ) != $value ) {
		update_option( $name , $value );
	} else {
		add_option( $name , $value, '', 'no' );
	}
	
}

function argelia_msg_update(){
    echo '<div id="message" class="updated fade">
    		<p><strong>CONFIGURAÇÕES SALVAS!</strong></p>
		</div>';
}

add_action( 'admin_menu', 'argelia_init' );
function argelia_init(){
	add_theme_page('Layout', 'Layout', 'administrator', 'layout', 'argelia_admin');
}

function argelia_admin() { 
?>

		<?php wp_enqueue_style('style-custom', get_bloginfo('template_directory') . '/includes/wp-options/wp-options.css'); ?>
        
    	<div class="wrap">
		
			<div id="icon-options-general" class="icon32"><br></div>
			<h2>Configurações do Layout</h2>
                        
            <div class="menu">
                <ul>
                    <li><a rel=".table-main" class="link current" href="javascript:;">Geral</a></li>
                    <li><a rel=".table-home" class="link" href="javascript:;">Home</a></li>
                    <li><a rel=".table-page" class="link" href="javascript:;">Página</a></li>
                    <li><a rel=".table-post" class="link" href="javascript:;">Post</a></li>
                </ul>
            </div>
            
			<form name="frm_argelia" id="argelia_form" method="post">
            
            	<input type="hidden" name="action" id="action" value="save">
                
                <table class="table-main group" border="0" cellspacing="0" cellpadding="5">
                    <tbody>
                    
                        <tr valign="top">
                    		<td colspan="3" scope="row" class="title-th">
                            	COMUM
                            </td>
                    	</tr>
                    
                    	<tr valign="top" class="area-style">
                        	<td rowspan="5" scope="row" class="img_target_comum">
                            
                            	
                            	
                            </td>
                    		<td scope="row"><label for="argelia_home_style">Estilo do site:</label></td>
                    		<td>
                            	<?php $argelia_home_style = get_option('argelia_home_style'); ?>
                            	<select name="argelia_home_style" id="argelia_home_style">
                                	<option value="green" <?php if( $argelia_home_style == 'green' ){ echo 'selected'; } ?>>Verde (padrão)</option>
                                    <option value="blue"<?php if( $argelia_home_style == 'blue' ){ echo 'selected'; } ?>>Azul</option>
                                    <option value="black"<?php if( $argelia_home_style == 'black' ){ echo 'selected'; } ?>>Preto</option>
                            	</select>
                            </td>
                    	</tr>
                    
                    	<tr valign="top" class="area-bg">
                    		<td scope="row"><label for="argelia_home_bg">Link da imagem de fundo:</label></td>
                    		<td>
                            	<?php $main_ornamentos = get_option('argelia_home_bg'); ?>
                            	<input name="argelia_home_bg" id="argelia_home_bg" type="text" value="<?php if( $argelia_home_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                
                        <tr valign="top" class="area-menu">
                    		<td scope="row"><label for="argelia_main_ornamentos">Link da imagem do menu superior:</label></td>
                    		<td>
                            	<?php $argelia_home_menu_header_bg = get_option('argelia_home_menu_header_bg'); ?>
                            	<input name="argelia_home_menu_header_bg" id="argelia_home_menu_header_bg" type="text" value="<?php if( $argelia_home_menu_header_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
 
						<tr valign="top" class="area-menu-footer">
                    		<td scope="row"><label for="argelia_home_footer_menu_show">Mostrar rodapé:</label></td>
                    		<td>
                            	<?php $argelia_home_footer_menu_show = get_option('argelia_home_footer_menu_show'); ?>
                            	<input name="argelia_home_footer_menu_show" id="argelia_home_footer_menu_show" type="checkbox" value="1" <?php if( $argelia_home_footer_menu_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr> 
 
 
                    
                    	<tr valign="top" class="area-menu-footer">
                    		<td scope="row"><label for="argelia_home_footer_menu_bg">Link da imagem de fundo do menu do rodapé:</label></td>
                    		<td>
                            	<?php $argelia_home_menu_header_bg = get_option('argelia_home_menu_header_bg'); ?>
                            	<input name="argelia_home_menu_header_bg" id="argelia_home_menu_header_bg" type="text" value="<?php if( $argelia_home_menu_header_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                        
                    </tbody>
                </table>
                
                
                
                
                
                
                <table class="table-home group" border="0" cellpadding="5" cellspacing="0">
                    <tbody>
                    
                    	<tr valign="top">
                    		<td colspan="3" scope="row" class="title-th">
                            	SIDEBAR
                            </td>
                    	</tr>
                        
                        
                    
                    	<tr valign="top" class="area-logo">
                    		<td widtd="25%" rowspan="7" scope="row" class="img_target_sidebar">
                            
                            	
                            
                            </td>
                    		<td><label for="argelia_home_sidebar_logo_show">Mostrar logomarca:</label></td>
                    		<td>
                            	<?php $argelia_home_sidebar_logo_show = get_option('argelia_home_sidebar_logo_show'); ?>
                            	<input name="argelia_home_sidebar_logo_show" id="argelia_home_sidebar_logo_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_logo_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-logo">
                    		<td>Link da logomarca:</td>
                    		<td>
                            	<?php $argelia_home_sidebar_logo_bg = get_option('argelia_home_sidebar_logo_bg'); ?>
                            	<input name="argelia_home_sidebar_logo_bg" id="argelia_home_sidebar_logo_bg" type="text" value="<?php if( $argelia_home_sidebar_logo_bg ){ echo  $argelia_home_sidebar_logo_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-links">
                    		<td><label for="argelia_home_sidebar_links_show2">Mostrar links:</label></td>
                    		<td>
                            	<?php $argelia_home_sidebar_links_show = get_option('argelia_home_sidebar_links_show'); ?>
                            	<input name="argelia_home_sidebar_links_show" id="argelia_home_sidebar_links_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_links_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-links">
                    		<td>Título da área de links:</td>
                    		<td>
                            	<?php $argelia_home_sidebar_links_title = get_option('argelia_home_sidebar_links_title'); ?>
                            	<input name="argelia_home_sidebar_links_title" id="argelia_home_sidebar_links_title" type="text" value="<?php if( $argelia_home_sidebar_links_title ){ echo  $argelia_home_sidebar_links_title; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                    
                    
                    
                    
                    	<tr valign="top" class="area-posts">
                    		<td><label for="argelia_home_sidebar_posts_show2">Mostrar ultimos posts:</label></td>
                    		<td>
                            	<?php $argelia_home_sidebar_posts_show = get_option('argelia_home_sidebar_posts_show'); ?>
                            	<input name="argelia_home_sidebar_posts_show" id="argelia_home_sidebar_posts_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_posts_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                    
                    
                    	<tr valign="top" class="area-posts">
                    		<td>Título da área de últimos posts:</td>
                    		<td>
                            	<?php $argelia_home_sidebar_posts_title = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_sidebar_posts_title" id="argelia_home_sidebar_posts_title" type="text" value="<?php if( $argelia_home_sidebar_posts_title ){ echo  $argelia_home_sidebar_posts_title; } ?>">
                                
                            </td>
                    	</tr>
                    
                    
                    	<tr valign="top" class="area-posts">
                    		<td>Categoria dos últimos posts:</td>
                    		<td>
                            	<?php $argelia_home_sidebar_posts_category = get_option('argelia_home_sidebar_posts_category'); ?>
                             	<select name="argelia_home_sidebar_posts_category">
                                <?php 
                                $categories = get_categories(); 
                                foreach ( $categories as $category ) {
									$selected = ( $argelia_home_sidebar_posts_category == $category->cat_ID ) ? ' selected' : '';
									$option = '<option value="'.$category->cat_ID.'"'. $selected .'>';
									$option .= $category->cat_name .'</option>';
									echo $option;
                                }
                                ?>
								</select>
                            </td>
                    	</tr>
                    
                    	
                        <tr valign="top">
                    		<td colspan="3" scope="row" class="title-th">
                            	CONTENT
                            </td>
                    	</tr>
                        
                    	
                        <tr valign="top" class="area-slide" class="area-slide">
                    		<td rowspan="6" scope="row" class="img_target_content">
                            	
                                
                            
                            </td>
                    		<td><label for="argelia_home_content_slide_show2">Mostrar slides:</label></td>
                    		<td>
                            	<?php $argelia_home_content_slide_show = get_option('argelia_home_content_slide_show'); ?>
                            	<input name="argelia_home_content_slide_show" id="argelia_home_content_slide_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_posts_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        <tr valign="top" class="area-slide">
                    		<td>Montar slide da categoria:</td>
                    		<td>
                            	<?php $argelia_home_content_slide_category = get_option('argelia_home_content_slide_category'); ?>
                             	<select name="argelia_home_content_slide_category">
                                <?php 
                                $categories = get_categories(); 
                                foreach ( $categories as $category ) {
									$selected = ( $argelia_home_content_slide_category == $category->cat_ID ) ? ' selected' : '';
									$option = '<option value="'.$category->cat_ID.'"'. $selected .'>';
									$option .= $category->cat_name .'</option>';
									echo $option;
                                }
                                ?>
								</select>
                            </td>
                    	</tr>
                        
                        
                        
                        <tr valign="top" class="area-slide">
                    		<td>Número de slides:</td>
                    		<td>
                            	<?php $argelia_home_content_slide_numero = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_content_slide_numero" id="argelia_home_content_slide_numero" type="text" value="<?php if( $argelia_home_content_slide_numero ){ echo  $argelia_home_content_slide_numero; } ?>">
                                
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-slide">
                    		<td>Link da imagem de fundo do slide:</td>
                    		<td>
                            	<?php $argelia_home_content_slide_numero = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_content_slide_numero" id="argelia_home_content_slide_numero" type="text" value="<?php if( $argelia_home_content_slide_numero ){ echo  $argelia_home_content_slide_numero; } ?>">
                                
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-painel">
                    		<td><label for="argelia_home_content_panel_show2">Mostrar painel:</label></td>
                    		<td>
                            	<?php $argelia_home_content_panel_show = get_option('argelia_home_content_panel_show'); ?>
                            	<input name="argelia_home_content_panel_show" id="argelia_home_content_panel_show" type="checkbox" value="1" <?php if( $argelia_home_content_panel_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top" class="area-painel-titulo">
                    		<td>Título do painel:</td>
                    		<td>
                            	<?php $argelia_home_content_panel_title = get_option('argelia_home_content_panel_title'); ?>
                            	<input name="argelia_home_content_panel_title" id="argelia_home_content_panel_title" type="text" value="<?php if( $argelia_home_content_panel_title ){ echo  $argelia_home_content_panel_title; } ?>">
                                
                            </td>
                    	</tr>
                        
                        
                        
                    </tbody>
                </table>
                
                
                
                
                
                
                <table class="table-page group">
                    <tbody>
                    
                    	<tr valign="top">
                    		<td scope="row"><label for="argelia_page_imagem_destacada">Mostrar imagem destacada:</label></td>
                    		<td>
                            	<?php $page_imagem_destacada = get_option('argelia_page_imagem_destacada'); ?>
                            	<input name="argelia_page_imagem_destacada" id="argelia_destacada" type="checkbox" value="sim" <?php if( $page_imagem_destacada == 'sim' ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                    	
                    </tbody>
                </table>
                
                
                
                
                
                <table class="table-post group">
                    <tbody>
                    
                    	<tr valign="top">
                    		<td scope="row"><label for="argelia_post_imagem_destacada">Mostrar imagem destacada:</label></td>
                    		<td>
                            	<?php $post_imagem_destacada = get_option('argelia_post_imagem_destacada'); ?>
                            	<input name="argelia_post_imagem_destacada" id="argelia_post_imagem_destacada" type="checkbox" value="sim" <?php if( $post_imagem_destacada == 'sim' ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        <tr valign="top">
                    		<td scope="row"><label for="argelia_post_data">Mostrar data:</label></td>
                    		<td>
                            	<?php $post_data = get_option('argelia_post_data'); ?>
                            	<input name="argelia_post_data" id="argelia_post_data" type="checkbox" value="sim" <?php if( $post_data == 'sim' ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                    	
                    </tbody>
                </table>
                
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Salvar Alterações"></p>
            
            </form>
			
    	</div>
        
        <script>
			jQuery(document).ready(function($) {
				 	
					
				
				//TABS+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
				$('.group').hide();
				$('.table-main').show()
				
				$('.link').click(function(){
					
					$('.link').removeClass('current');
					$(this).addClass('current');
					
					$('.group').hide();
					var table = $(this).attr('rel');
					$(table).show();
				});
				
				
				//COMUM+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
				
				$('.area-style').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_comum')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/site-skin.gif" border="0">');
				}).mouseout(function(){
					$('.img_target_comum').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});	
				
				
				$('.area-bg').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_comum')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-bg.jpg" border="0">');
				}).mouseout(function(){
					$('.img_target_comum').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});	
				
				$('.area-menu').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_comum')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-menu.jpg" border="0">');
				}).mouseout(function(){
					$('.img_target_comum').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});		
				
				$('.area-menu-footer').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_comum')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-menu-footer.jpg" border="0">');
				}).mouseout(function(){
					$('.img_target_comum').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});	
				
				
				//SIDEBAR+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
				$('.area-logo').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_sidebar')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-logo.jpg" border="0">');
				}).mouseout(function(){
					$('.img_target_sidebar').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				
				$('.area-links').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_sidebar')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-links.jpg" border="0">')	
				}).mouseout(function(){
					$('.img_target_sidebar').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				
				$('.area-posts').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_sidebar')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-posts.jpg" border="0">')	
				}).mouseout(function(){
					$('.img_target_sidebar').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				
				
				//CONTENT +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
				
				$('.area-slide').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_content')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-slide.jpg" border="0">')	
				}).mouseout(function(){
					$('.img_target_content').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				
				$('.area-painel').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_content')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-painel.jpg" border="0">')	
				}).mouseout(function(){
					$('.img_target_content').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				
				$('.area-painel-titulo').mouseover(function(){
					$(this).css({'background':'#FFC'});
					$('.img_target_content')
									.css({'background':'#FFC'})
									.html('<img src="<?php bloginfo('template_directory'); ?>/includes/wp-options/img/area-painel-titulo.jpg" border="0">')	
				}).mouseout(function(){
					$('.img_target_content').css({'background':'#F4F4F4'}).html('');
					$(this).css({'background':'#F4F4F4'});
				});
				

			});			
		</script>
        
<?php } /* fim da função argelia_admin */ ?>