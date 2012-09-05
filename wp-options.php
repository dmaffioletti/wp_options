<?php

if( ! empty( $_POST ) ){
	
	if( $_POST['action'] == 'save' ){
	
		/**/
		//get sidebar
		$argelia_home_sidebar_logo_show      = $_POST['argelia_home_sidebar_logo_show'];
		$argelia_home_sidebar_logo_bg        = $_POST['argelia_home_sidebar_logo_bg'];
		$argelia_home_sidebar_links_show     = $_POST['argelia_home_sidebar_links_show'];
		$argelia_home_sidebar_links_title    = $_POST['argelia_home_sidebar_links_title'];
		$argelia_home_sidebar_posts_show     = $_POST['argelia_home_sidebar_posts_show'];
		$argelia_home_sidebar_posts_title     = $_POST['argelia_home_sidebar_posts_title'];
		$argelia_home_sidebar_posts_category = $_POST['argelia_home_sidebar_posts_category'];
		
		//save sidebar
		argelia_save( 'argelia_home_sidebar_logo_show'      , $argelia_home_sidebar_logo_show );
		argelia_save( 'argelia_home_sidebar_logo_bg'        , $argelia_home_sidebar_logo_bg );
		argelia_save( 'argelia_home_sidebar_links_show'     , $argelia_home_sidebar_links_show );
		argelia_save( 'argelia_home_sidebar_links_title'    , $argelia_home_sidebar_links_title );
		argelia_save( 'argelia_home_sidebar_posts_show'     , $argelia_home_sidebar_posts_show );
		argelia_save( 'argelia_home_sidebar_posts_category' , $argelia_home_sidebar_posts_category );
	
		//get content
		$argelia_home_content_slide_show     = $_POST['argelia_home_sidebar_slide_show'];
		$argelia_home_content_slide_category = $_POST['argelia_home_sidebar_slide_category'];
		$argelia_home_content_slide_numero   = $_POST['argelia_home_sidebar_slide_numero'];
		$argelia_home_content_slide_bg       = $_POST['argelia_home_sidebar_slide_bg'];
		$argelia_home_content_panel_show     = $_POST['argelia_home_content_panel_show'];
		$argelia_home_content_panel_title    = $_POST['argelia_home_content_panel_title'];
		$argelia_home_content_panel_bg       = $_POST['argelia_home_content_panel_bg'];
		$argelia_home_content_panel_type     = $_POST['argelia_home_content_panel_type'];
	
		//save content
		argelia_save( 'argelia_home_content_slide_show'     , $argelia_home_content_slide_show );
		argelia_save( 'argelia_home_content_slide_category' , $argelia_home_content_slide_category );
		argelia_save( 'argelia_home_content_slide_numero'   , $argelia_home_content_slide_numero );
		argelia_save( 'argelia_home_content_slide_bg'       , $argelia_home_content_slide_bg );
		argelia_save( 'argelia_home_content_panel_show'     , $argelia_home_sidebar_posts_show );
		argelia_save( 'argelia_home_content_panel_title'    , $argelia_home_content_panel_title );
		argelia_save( 'argelia_home_content_panel_bg'       , $argelia_home_content_panel_bg );
		argelia_save( 'argelia_home_content_panel_type'     , $argelia_home_content_panel_type );

		//get default
		$argelia_home_bg = $_POST['argelia_home_bg'];
		$argelia_home_menu_header_bg = $_POST['argelia_home_menu_header_bg'];
		$argelia_home_menu_footer_show = $_POST['argelia_home_menu_footer_show'];
		$argelia_home_menu_footer_bg = $_POST['argelia_home_menu_footer_bg'];
		
		//save default
		argelia_save( 'argelia_home_bg'                 , $argelia_home_bg );
		argelia_save( 'argelia_home_menu_header_bg'     , $argelia_home_menu_header_bg );
		argelia_save( 'argelia_home_menu_footer_show'   , $argelia_home_menu_footer_show );
		argelia_save( 'argelia_home_menu_footer_bg'     , $argelia_home_menu_footer_bg );
		/**/
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
    		<p><strong>Configurações salvas</strong></p>
		</div>';
}

add_action( 'admin_menu', 'argelia_init' );
function argelia_init(){
	add_theme_page('Layout', 'Layout', 'administrator', 'layout', 'argelia_admin');
}

function argelia_admin() { 
?>

		<style>
			div.menu{}
			div.menu ul li{ display: inline; margin:0; }
			div.menu ul li a{ padding:10px 20px; background:#999; text-decoration:none; -webkit-border-radius: 10px 10px 0 0; -moz-border-radius: 10px 10px 0 0; -o-border-radius: 10px 10px 0 0; border-radius: 10px 10px 0 0; }
			div.menu ul li a:hover{ background:#CCC; }
			form#argelia_form{ width:96%; background:#eee; padding:2%; margin-top:-5px; }
			form#argelia_form table th{ width: 200px; }
			form#argelia_form table th, form#argelia_form table td{ text-align:left; height:35px; }
			
			div.menu ul li a.current{ background:#eee; }
			
			span.ex{ color:#999; font-size:10px; }
			
			.title-th{
				background:#CCC;
				color:#000;
				font-size:18px;
				padding:10px;
			}
			
			table{
				width:100%;
			}
			
			table th{
				width:25%;	
				padding:5px 10px;
				margin-top:20px;
			}
			
        </style>

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
                
                <table class="table-main group">
                    <tbody>
                    
                    	
                    
                    	<tr valign="top">
                    		<th scope="row"><label for="argelia_home_bg">Link da imagem de fundo:</label></th>
                    		<td>
                            	<?php $main_ornamentos = get_option('argelia_home_bg'); ?>
                            	<input name="argelia_home_bg" id="argelia_home_bg" type="text" value="<?php if( $argelia_home_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_main_ornamentos">Link da imagem do menu superior:</label></th>
                    		<td>
                            	<?php $argelia_home_menu_header_bg = get_option('argelia_home_menu_header_bg'); ?>
                            	<input name="argelia_home_menu_header_bg" id="argelia_home_menu_header_bg" type="text" value="<?php if( $argelia_home_menu_header_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
 
						<tr valign="top">
                    		<th scope="row"><label for="argelia_home_footer_menu_show">Mostrar rodapé:</label></th>
                    		<td>
                            	<?php $argelia_home_footer_menu_show = get_option('argelia_home_footer_menu_show'); ?>
                            	<input name="argelia_home_footer_menu_show" id="argelia_home_footer_menu_show" type="checkbox" value="1" <?php if( $argelia_home_footer_menu_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr> 
 
 
                    
                    	<tr valign="top">
                    		<th scope="row"><label for="argelia_home_footer_menu_bg">Link da imagem de fundo do menu do rodapé:</label></th>
                    		<td>
                            	<?php $argelia_home_menu_header_bg = get_option('argelia_home_menu_header_bg'); ?>
                            	<input name="argelia_home_menu_header_bg" id="argelia_home_menu_header_bg" type="text" value="<?php if( $argelia_home_menu_header_bg ){ echo  $argelia_home_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                        
                    </tbody>
                </table>
                
                
                
                
                
                
                <table class="table-home group">
                    <tbody>
                    
                    	<tr valign="top">
                    		<th colspan="2" scope="row" class="title-th">
                            	SIDEBAR
                            </th>
                    	</tr>
                        
                        
                    
                    	<tr valign="top">
                    		<th scope="row">
                            	<label for="argelia_home_sidebar_logo_show">Mostrar logomarca:</label>
                            </th>
                    		<td>
                            	<?php $argelia_home_sidebar_logo_show = get_option('argelia_home_sidebar_logo_show'); ?>
                            	<input name="argelia_home_sidebar_logo_show" id="argelia_home_sidebar_logo_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_logo_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_sidebar_logo_bg">Linda da logomarca:</label></th>
                    		<td>
                            	<?php $argelia_home_sidebar_logo_bg = get_option('argelia_home_sidebar_logo_bg'); ?>
                            	<input name="argelia_home_sidebar_logo_bg" id="argelia_home_sidebar_logo_bg" type="text" value="<?php if( $argelia_home_sidebar_logo_bg ){ echo  $argelia_home_sidebar_logo_bg; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row">
                            	<label for="argelia_home_sidebar_links_show">Mostrar links:</label>
                            </th>
                    		<td>
                            	<?php $argelia_home_sidebar_links_show = get_option('argelia_home_sidebar_links_show'); ?>
                            	<input name="argelia_home_sidebar_links_show" id="argelia_home_sidebar_links_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_links_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_sidebar_links_title">Título da área de links:</label></th>
                    		<td>
                            	<?php $argelia_home_sidebar_links_title = get_option('argelia_home_sidebar_links_title'); ?>
                            	<input name="argelia_home_sidebar_links_title" id="argelia_home_sidebar_links_title" type="text" value="<?php if( $argelia_home_sidebar_links_title ){ echo  $argelia_home_sidebar_links_title; } ?>">
                                <span class="ex">Ex: http://www.enderencodosite.com/imagem.jpg</span>
                            </td>
                    	</tr>
                    
                    
                    
                    
                    	<tr valign="top">
                    		<th scope="row">
                            	<label for="argelia_home_sidebar_posts_show">Mostrar ultimos posts:</label>
                            </th>
                    		<td>
                            	<?php $argelia_home_sidebar_posts_show = get_option('argelia_home_sidebar_posts_show'); ?>
                            	<input name="argelia_home_sidebar_posts_show" id="argelia_home_sidebar_posts_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_posts_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                    
                    
                    	<tr valign="top">
                    		<th scope="row"><label for="argelia_home_sidebar_posts_title">Título da área de últimos posts:</label></th>
                    		<td>
                            	<?php $argelia_home_sidebar_posts_title = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_sidebar_posts_title" id="argelia_home_sidebar_posts_title" type="text" value="<?php if( $argelia_home_sidebar_posts_title ){ echo  $argelia_home_sidebar_posts_title; } ?>">
                                
                            </td>
                    	</tr>
                    
                    
                    	<tr valign="top">
                    		<th scope="row"><label for="argelia_home_sidebar_posts_category">Categoria dos últimos posts:</label></th>
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
                    		<th colspan="2" scope="row" class="title-th">
                            	CONTENT
                            </th>
                    	</tr>
                        
                    	
                        <tr valign="top">
                    		<th scope="row">
                            	<label for="argelia_home_content_slide_show">Mostrar slides:</label>
                            </th>
                    		<td>
                            	<?php $argelia_home_content_slide_show = get_option('argelia_home_content_slide_show'); ?>
                            	<input name="argelia_home_content_slide_show" id="argelia_home_content_slide_show" type="checkbox" value="1" <?php if( $argelia_home_sidebar_posts_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_content_slide_category">Montar slide da categoria:</label></th>
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
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_content_slide_numero">Número de slides:</label></th>
                    		<td>
                            	<?php $argelia_home_content_slide_numero = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_content_slide_numero" id="argelia_home_content_slide_numero" type="text" value="<?php if( $argelia_home_content_slide_numero ){ echo  $argelia_home_content_slide_numero; } ?>">
                                
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_content_slide_bg">Link da imagem de fundo do slide:</label></th>
                    		<td>
                            	<?php $argelia_home_content_slide_numero = get_option('argelia_home_sidebar_posts_title'); ?>
                            	<input name="argelia_home_content_slide_numero" id="argelia_home_content_slide_numero" type="text" value="<?php if( $argelia_home_content_slide_numero ){ echo  $argelia_home_content_slide_numero; } ?>">
                                
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row">
                            	<label for="argelia_home_content_panel_show">Mostrar painel:</label>
                            </th>
                    		<td>
                            	<?php $argelia_home_content_panel_show = get_option('argelia_home_content_panel_show'); ?>
                            	<input name="argelia_home_content_panel_show" id="argelia_home_content_panel_show" type="checkbox" value="1" <?php if( $argelia_home_content_panel_show == 1 ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        
                        
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_home_content_panel_title">Título do painel:</label></th>
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
                    		<th scope="row"><label for="argelia_page_imagem_destacada">Mostrar imagem destacada:</label></th>
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
                    		<th scope="row"><label for="argelia_post_imagem_destacada">Mostrar imagem destacada:</label></th>
                    		<td>
                            	<?php $post_imagem_destacada = get_option('argelia_post_imagem_destacada'); ?>
                            	<input name="argelia_post_imagem_destacada" id="argelia_post_imagem_destacada" type="checkbox" value="sim" <?php if( $post_imagem_destacada == 'sim' ){ echo  'checked'; } ?>>
                            </td>
                    	</tr>
                        
                        <tr valign="top">
                    		<th scope="row"><label for="argelia_post_data">Mostrar data:</label></th>
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
				 				
				$('.group').hide();
				$('.table-main').show()
				
				$('.link').click(function(){
					
					$('.link').removeClass('current');
					$(this).addClass('current');
					
					$('.group').hide();
					var table = $(this).attr('rel');
					$(table).show();
				});
				
			});			
		</script>
        
<?php } /* fim da função argelia_admin */ ?>