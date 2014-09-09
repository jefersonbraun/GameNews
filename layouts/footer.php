<?php 
	
	/**
	 *
	 * Template footer
	 *
	 **/
	
	// create an access to the template main object
	global $tpl;
	
	// disable direct access to the file	
	defined('GAVERN_WP') or die('Access denied');
	
?>

	<footer id="gk-footer" class="gk-page">
		<?php if(get_option($tpl->name . '_template_footer_logo', 'Y') == 'Y') : ?>
		<img src="<?php echo gavern_file_uri('images/gavernwp.png'); ?>" id="gk-framework-logo" alt="GavernWP" />
		<?php endif; ?>
		
		<?php 			
			if(gk_show_menu('footermenu')) {
				wp_nav_menu(array(
				      'theme_location'  => 'footermenu',
					  'container'       => 'menu', 
					  'container_class' => 'menu-{menu slug}-container', 
					  'container_id'    => 'gkFooterMenu',
					  'menu_class'      => 'menu ' . $tpl->menu['footermenu']['style'], 
					  'menu_id'         => 'footer-menu',
					  'echo'            => true,
					  'fallback_cb'     => 'wp_page_menu',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					  'depth'           => $tpl->menu['footermenu']['depth']
				));
			}
		?>
		
		<?php if(get_option($tpl->name . '_styleswitcher_state', 'Y') == 'Y') : ?>
		<div id="gk-style-area">
			<?php for($i = 0; $i < count($tpl->styles); $i++) : ?>
			<div class="gk-style-switcher-<?php echo $tpl->styles[$i]; ?>">
				<?php 
					$j = 1;
					foreach($tpl->style_colors[$tpl->styles[$i]] as $stylename => $link) : 
				?> 
				<a href="#<?php echo $link; ?>" id="gk-color<?php echo $j; ?>"><?php echo $stylename; ?></a>
				<?php 
					$j++;
					endforeach; 
				?>
			</div>
			<?php endfor; ?>
			
			<div id="gk-backgrounds">
		    	<a href="#" id="gkBg1" title="<?php _e('Background I', GKTPLNAME); ?>">1</a>
		    	<a href="#" id="gkBg2" title="<?php _e('Background II', GKTPLNAME); ?>">2</a>
		    	<a href="#" id="gkBg3" title="<?php _e('Background III', GKTPLNAME); ?>">3</a>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="gk-copyrights">
			<?php echo str_replace('\\', '', htmlspecialchars_decode(get_option($tpl->name . '_template_footer_content', ''))); ?>
		</div>
	</footer>
	
	<?php if(gk_is_active_sidebar('social') || gk_show_menu('usermenu') || gk_show_menu('topnav')) : ?>
	<div id="gk-topbar"<?php if(is_admin_bar_showing()) : ?> class="adminbar-exists"<?php endif; ?>>
		<div class="gk-page-wrap">
			<?php gk_dynamic_sidebar('social'); ?>
			
			<?php gavern_menu('topnav', 'gk-topnav', array('walker' => new GKMenuWalker(), 'container' => 'menu')); ?>
			
			<?php gavern_menu('usermenu', 'gk-usermenu', array('walker' => new GKMenuWalker(), 'container' => 'menu')); ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php gk_load('social'); ?>
	
	<?php do_action('gavernwp_footer'); ?>
	<?php 
		echo stripslashes(
			htmlspecialchars_decode(
				str_replace( '&#039;', "'", get_option($tpl->name . '_footer_code', ''))
			)
		); 
	?>
	
	<?php wp_footer(); ?>
	
	<?php do_action('gavernwp_ga_code'); ?>
</body>
</html>
