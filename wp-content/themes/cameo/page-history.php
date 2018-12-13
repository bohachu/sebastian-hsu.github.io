<?php
/**
 * The main template file for display page.
 *
 * @package WordPress
*/

//Check if single attachment page
if($post->post_type == 'attachment')
{
	get_template_part("single-attachment");
	die;
}

//Check if content builder preview
if(isset($_GET['rel']) && !empty($_GET['rel']) && isset($_GET['ppb_preview']))
{
	get_template_part("page-preview");
	die;
}

//Check if content builder preview page
if(isset($_GET['ppb_preview_page']))
{
	get_template_part("page-preview-page");
	die;
}

/**
*	Get Current page object
**/
if(!is_null($post))
{
	$page_obj = get_page($post->ID);
}

$current_page_id = '';

/**
*	Get current page id
**/

if(!is_null($post) && isset($page_obj->ID))
{
    $current_page_id = $page_obj->ID;
}

get_header(); 
?>

<?php
//Get page header display setting
$page_show_title = get_post_meta($current_page_id, 'page_show_title', true);

if(empty($page_show_title))
{
	//Get current page tagline
	$page_tagline = get_post_meta($current_page_id, 'page_tagline', true);

	$pp_page_bg = '';
	//Get page featured image
	if(has_post_thumbnail($current_page_id, 'full'))
    {
        $image_id = get_post_thumbnail_id($current_page_id); 
        $image_thumb = wp_get_attachment_image_src($image_id, 'full', true);
        
        if(isset($image_thumb[0]) && !empty($image_thumb[0]))
        {
        	$pp_page_bg = $image_thumb[0];
        }
    }
    
    //Check if add blur effect
	$tg_page_title_img_blur = kirki_get_option('tg_page_title_img_blur');
	
	$tg_page_title_font_alignment = kirki_get_option('tg_page_title_font_alignment');
	$tg_page_title_bg_vertical_alignment = kirki_get_option('tg_page_title_bg_vertical_alignment');
	
	//Check if enable content builder
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);
	
	global $photography_topbar;
?>
<div id="page_caption" class="<?php if(!empty($pp_page_bg)) { ?>hasbg parallax  <?php echo esc_attr($tg_page_title_bg_vertical_alignment); ?> <?php } ?> <?php if(!empty($photography_topbar)) { ?>withtopbar<?php } ?> <?php if(!empty($screen_class)) { ?>split<?php } ?> <?php if(!empty($ppb_enable)) { ?>ppb_enable<?php } ?>">
	<?php if(!empty($pp_page_bg)) { ?>
		<div id="bg_regular" style="background-image:url(<?php echo esc_url($pp_page_bg); ?>);"></div>
	<?php } ?>
	<?php
	    if(!empty($tg_page_title_img_blur))
	    {
	?>
	<div id="bg_blurred" style="background-image:url(<?php echo admin_url('admin-ajax.php').'?action=photography_blurred&src='.esc_url($pp_page_bg); ?>);"></div>
	<?php
	    }
	?>
	
	<div class="page_title_wrapper">
		<div class="page_title_inner <?php if($tg_page_title_font_alignment == 'left' OR $tg_page_title_font_alignment == 'right') { ?>standard_wrapper<?php } ?>">
			<h1 <?php if(!empty($pp_page_bg) && !empty($photography_topbar)) { ?>class ="withtopbar"<?php } ?>><?php the_title(); ?></h1>
			<?php
		    	if(!empty($page_tagline))
		    	{
		    ?>
		    	<?php
			    	$tg_page_tagline_alignment = kirki_get_option('tg_page_tagline_alignment');
	
		    		if(empty($pp_page_bg)) 
		    		{
		    	?>
		    		<hr class="title_break">
		    	<?php
		    		}
		    	?>
		    	<div class="page_tagline">
		    		<?php echo wp_kses_post($page_tagline); ?>
		    	</div>
		    <?php
		    	}
		    ?>
		</div>
	</div>
</div>
<?php
}
?>

<?php
	//Check if use page builder
	$ppb_form_data_order = '';
	$ppb_form_item_arr = array();
	$ppb_enable = get_post_meta($current_page_id, 'ppb_enable', true);
	
	global $photography_topbar;
?>
<?php
	if(!empty($ppb_enable))
	{
		//if dont have password set
		if(!post_password_required())
		{
		wp_enqueue_script("photography-custom-onepage", get_template_directory_uri()."/js/custom_onepage.js", false, THEMEVERSION, true);
?>
<div class="ppb_wrapper <?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($photography_topbar)) { ?>withtopbar<?php } ?>">
<?php
		photography_apply_builder($current_page_id);
?>
</div>
<?php		
		} //end if dont have password set
		else
		{
?>
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($photography_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width"><br/><br/>
<?php
			the_content();
?>
    		<br/><br/></div>
    	</div>
    </div>
</div>
<?php
		}
	}
	else
	{
?>
<!-- Begin content -->
<div id="page_content_wrapper" class="<?php if(!empty($pp_page_bg)) { ?>hasbg<?php } ?> <?php if(!empty($pp_page_bg) && !empty($photography_topbar)) { ?>withtopbar<?php } ?>">
    <div class="inner">
    	<!-- Begin main content -->
    	<div class="inner_wrapper">
    		<div class="sidebar_content full_width history_page">
					<div class="row history_content">
						<?php if (ICL_LANGUAGE_CODE == 'zh-hant'): ?>
						<div class="col-md-3 history_left">
							<!-- 院史-左側區塊 -->
							<?php echo do_shortcode('[content_block id=6158]');?>
						</div>
						<div class="col-md-9">
								<ul class="tab_btn row">
								  <li class="col-sm-3 col-xs-12">
										 <a  id="tab1" href="javascript:;" class="text-center tab_link active  ">廖俊智院長2016-現任</a>
									</li>
								 <li class=" col-sm-3 col-xs-12">
								 	<a id="tab2" href="javascript:;" class="text-center tab_link ">翁啟惠院長2006-2016</a>
								 </li>
								 
								 <li class=" col-sm-3 col-xs-12">
								 <a id="tab3" href="javascript:;" class="text-center tab_link ">李遠哲院長1994-2006</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								 	<a id="tab4" href="javascript:;" class="text-center tab_link">吳大猷院長1983-1994</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								 <a id="tab5" href="javascript:;" class="text-center tab_link" >錢思亮院長1970-1983</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								 	<a id="tab6" href="javascript:;" class="text-center tab_link">王世杰院長1962-1970</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								  <a id="tab7" href="javascript:;" class="text-center tab_link">胡適院長1958-1962</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								   <a id="tab8" href="javascript:;" class="text-center tab_link">朱家驊院長1940-1957</a>
								 </li>
								 <li class=" col-sm-3 col-xs-12">
								   <a id="tab9" href="javascript:;" class="text-center tab_link">蔡元培院長1928-1940</a>
								 </li>
								 
								</ul>
								<!-- 內容區-->
								<?php echo do_shortcode('[content_block id=6165]');?>
								
						</div>
						<!-- 英文版 -->
					<?php elseif (ICL_LANGUAGE_CODE == 'en'): ?>
							<div class="col-md-3 history_left">
							<!-- 院史-左側區塊 -->
							<?php echo do_shortcode('[content_block id=6199]');?>
						</div>
						<div class="col-md-9">
								<ul class="tab_btn row">
								  <li class="col-sm-4 col-xs-12">
										 <a  id="tab1" href="javascript:;" class="text-center tab_link active ">Liao James C. 2016-</a>
									</li>
								 <li class=" col-sm-4 col-xs-12">
								 	<a id="tab2" href="javascript:;" class="text-center tab_link ">Wong Chi-Huey 2006-2016</a>
								 </li>
								 
								 <li class=" col-sm-4 col-xs-12">
								 <a id="tab3" href="javascript:;" class="text-center tab_link">Lee Yuan T. 1994-2006</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
								 <a id="tab4" href="javascript:;" class="text-center tab_link">Wu Ta-You 1983-1994</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
							<a id="tab5" href="javascript:;" class="text-center tab_link" >Chien Shih-Liang 1970-1983</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
								 <a id="tab6" href="javascript:;" class="text-center tab_link">Wang Shih-Chieh 1962-1970</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
								  <a id="tab7" href="javascript:;" class="text-center tab_link">Hu Shih 1958-1962</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
								  <a id="tab8" href="javascript:;" class="text-center tab_link">Chu Chia-Hua 1940-1957</a>
								 </li>
								 <li class=" col-sm-4 col-xs-12">
								   <a id="tab9" href="javascript:;" class="text-center tab_link">Tasi Yuan-Pei 1928-1940</a>
								 </li>
								 
	</ul>
								<!-- 內容區 -->
								<?php echo do_shortcode('[content_block id=6202]');?>
							
						</div>
					<?php endif; ?>
					  
					</div>
					<!-- /row -->
    		</div>
    	</div>
    	<!-- End main content -->
    </div> 
</div>
<?php
}
?>
<?php get_footer(); ?>