<?php
/**
 * The main template file for display gallery page.
 *
 * @package WordPress
*/

/**
*	Get Current page object
**/
$page = get_page($post->ID);
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

//Check if gallery template
global $photograhy_page_gallery_id;
if(!empty($photograhy_page_gallery_id))
{
	$current_page_id = $photograhy_page_gallery_id;
}

//Check if password protected
get_template_part("/templates/template-password");

//Get gallery images
$all_photo_arr = get_post_meta($current_page_id, 'wpsimplegallery_gallery', true);

//Get global gallery sorting
$all_photo_arr = photography_resort_gallery_img($all_photo_arr);

get_header();

global $photography_topbar;

//Get gallery header
get_template_part("/templates/template-gallery-header");

//Register javascript
wp_enqueue_script('masonry');
wp_enqueue_script("photography-script-gallery-masonry", admin_url('admin-ajax.php')."?action=photography_script_gallery_masonry&id=portfolio_filter_wrapper&gutter=30", false, THEMEVERSION, true);
?>

<!-- Begin content -->
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
	<div id="portfolio_filter_wrapper" class="gallery two_cols portfolio-content section content clearfix" data-columns="2">
	
	<?php
		$tg_lightbox_enable_caption = kirki_get_option('tg_lightbox_enable_caption');
	
	    foreach($all_photo_arr as $key => $photo_id)
	    {
	        $small_image_url = '';
	        $image_url = '';
	        
	        if(!empty($photo_id))
	        {
	        	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
	        	$small_image_url = wp_get_attachment_image_src($photo_id, 'photography-gallery-masonry', true);
	        	$mobile_image_url = wp_get_attachment_image_src($photo_id, 'medium_large', true);
	        	$poster_image_url = wp_get_attachment_image_src($photo_id, 'medium', true);
	        }
	        
	        //Get image meta data
	        $image_alt = get_post_meta($photo_id, '_wp_attachment_image_alt', true);
	?>
	<div class="element grid classic2_cols <?php echo esc_attr(photography_get_hover_effect()); ?>">
	
		<div class="one_half gallery2 static filterable gallery_type animated<?php echo esc_attr($key+1); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
		
			<?php 
			    if(isset($image_url[0]) && !empty($image_url[0]))
			    {
			?>		
			    <a data-rel="photography_gallery_<?php echo esc_attr($current_page_id); ?>" <?php echo photography_get_lightbox_caption_attr($photo_id, true, $poster_image_url[0]); ?> href="<?php echo esc_url($image_url[0]); ?>" <?php echo photography_get_progressive_attr($photo_id, $small_image_url[0], $mobile_image_url[0], true, 'fancy-gallery'); ?>>
			        <img src="<?php echo esc_url(photography_get_progressive_preview_image($photo_id, 'photography-gallery-masonry')); ?>" alt="<?php echo esc_attr($image_alt); ?>" class="preview" />
			    </a>
			<?php
			    }		
			?>
		
		</div>
		
	</div>
	<?php
		}
	?>
		
	</div>
	
	</div>

</div>
</div>
<br class="clear"/><br/>
</div>
<?php get_footer(); ?>
<!-- End content -->