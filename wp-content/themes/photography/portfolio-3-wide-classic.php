<?php
/**
 * Template Name: Portfolio 3 Columns Wide Classic
 * The main template file for display portfolio page.
 *
 * @package WordPress
*/

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

global $photography_page_content_class;
$photography_page_content_class = 'wide';

global $photography_screen_class;
$photography_screen_class = 'single_gallery';

//Include custom header feature
get_template_part("/templates/template-header");

$filter = 1;
if(!photography_is_filterable_portfolio())
{
	$fitler = 0;
}

//Get portfolio grid title style
$tg_portfolio_grid_info_style = kirki_get_option( "tg_portfolio_grid_info_style" );

//Register javascript
wp_enqueue_script('masonry');
wp_register_script("photography-script-gallery-masonry", admin_url('admin-ajax.php')."?action=photography_script_gallery_masonry&id=portfolio_filter_wrapper&gutter=0&filter=".$filter."&next_action=photography_portfolio_classic&columns=3&type=grid&layout=wide&page_id=".$current_page_id, false, THEMEVERSION, true);
		
$params = array(
  'ajaxurl' => admin_url('admin-ajax.php'),
  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
);

wp_localize_script("photography-script-gallery-masonry", 'tgAjax', $params );
wp_enqueue_script("photography-script-gallery-masonry", admin_url('admin-ajax.php')."?action=photography_script_gallery_masonry&id=portfolio_filter_wrapper&gutter=0&filter=".$filter."&next_action=photography_portfolio_classic&columns=3&type=grid&layout=wide&page_id=".$current_page_id, false, THEMEVERSION, true);
?>

<!-- Begin content -->
<?php
	//Get number of portfolios per page
	$tg_portfolio_items = kirki_get_option('tg_portfolio_items');
	
	//Get all portfolio items for paging
	global $wp_query;
	
	if(is_front_page())
	{
	    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
	}
	else
	{
	    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	}
	
	$query_string = 'paged='.$paged.'&orderby=menu_order&order=ASC&post_type=portfolios&numberposts=-1&suppress_filters=0&posts_per_page='.$tg_portfolio_items;

	if(!empty($term))
	{
		$ob_term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		$custom_tax = $wp_query->query_vars['taxonomy'];
	    $query_string .= '&posts_per_page=-1&'.$custom_tax.'='.$term;
	}
	query_posts($query_string);

	//Include project filterable options
	get_template_part("/templates/template-portfolio-filterable");
?>
    
<div class="inner">

	<div class="inner_wrapper nopadding">
	
	<?php
	    if(!empty($post->post_content) && empty($term))
	    {
	?>
	    <div class="standard_wrapper"><?php echo photography_apply_content($post->post_content); ?></div><br class="clear"/><br/>
	<?php
	    }
	    elseif(!empty($term) && !empty($ob_term->description))
	    { 
	?>
	    <div class="standard_wrapper"><?php echo esc_html($ob_term->description); ?></div><br class="clear"/><br/>
	<?php
	    }
	?>
	
	<div id="page_main_content" class="sidebar_content full_width nopadding fixed_column">
	
	<div id="portfolio_filter_wrapper" class="gallery three_cols portfolio-content section content clearfix wide" data-columns="3">
	
	<?php
		$key = 0;
		if (have_posts()) : while (have_posts()) : the_post();
			$key++;
			$image_url = '';
			$portfolio_ID = get_the_ID();
					
			if(has_post_thumbnail($portfolio_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'large', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-grid', true);
			    $mobile_image_url = wp_get_attachment_image_src($image_id, 'medium_large', true);
	        	$poster_image_url = wp_get_attachment_image_src($image_id, 'medium', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Get portfolio category
			$portfolio_item_set = '';
			$portfolio_item_sets = wp_get_object_terms($portfolio_ID, 'portfoliosets');
			
			if(is_array($portfolio_item_sets))
			{
			    foreach($portfolio_item_sets as $set)
			    {
			    	$portfolio_item_set.= $set->slug.' ';
			    }
			}
	?>
	<div class="element grid classic3_cols masonry <?php echo esc_attr(photography_get_hover_effect('portfolio')); ?> <?php echo esc_attr($portfolio_item_set); ?>" data-type="<?php echo esc_attr($portfolio_item_set); ?>">
	
		<div class="one_third gallery3 classic static filterable gallery_type animated<?php echo esc_attr($key+1); ?> <?php echo esc_attr($tg_portfolio_grid_info_style); ?>" data-id="post-<?php echo esc_attr($key+1); ?>">
			<?php 
				if(!empty($image_url[0]))
				{
			?>		
					<?php
						$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
						$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
						
						switch($portfolio_type)
						{
						case 'External Link':
							$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
					?>
					<a target="_blank" href="<?php echo esc_url($portfolio_link_url); ?>" <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true); ?>>
						<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="preview"/>
						<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-chain"></i>
							</div>
						</div>
		            </a>
					
					<?php
						break;
						//end external link
						
						case 'Portfolio Content':
        				default:
        			?>
        			<a href="<?php echo esc_url(get_permalink($portfolio_ID)); ?>" <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true); ?>>
        				<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="preview" />
        				<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-mail-forward"></i>
							</div>
						</div>
		            </a>
	                
	                <?php
						break;
						//portfolio content
        				
        				case 'Image':
					?>
					<a data-rel="photography_portfolio_<?php echo esc_attr($current_page_id); ?>" <?php echo photography_get_portfolio_lightbox_caption_attr(get_the_title(), $poster_image_url[0]); ?> href="<?php echo esc_url($image_url[0]); ?>" <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true, 'fancy-gallery'); ?>>
						<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="preview" />
						<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-search-plus"></i>
							</div>
						</div>
	                </a>
					
					<?php
						break;
						//end image
						
						case 'Youtube Video':
					?>
					
					<a data-rel="photography_portfolio_<?php echo esc_attr($current_page_id); ?>" href="https://www.youtube.com/embed/<?php echo esc_attr($portfolio_video_id); ?>" <?php echo photography_get_portfolio_lightbox_caption_attr(get_the_title(), $poster_image_url[0]); ?> data-options="width:900, height:488" <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true, 'lightbox_youtube'); ?>>
						<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="preview" />
						<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-play"></i>
							</div>
						</div>
		            </a>
					
					<?php
						break;
						//end youtube
					
					case 'Vimeo Video':
					?>
					<a data-rel="photography_portfolio_<?php echo esc_attr($current_page_id); ?>" href="https://player.vimeo.com/video/<?php echo esc_attr($portfolio_video_id); ?>?badge=0" <?php echo photography_get_portfolio_lightbox_caption_attr(get_the_title(), $poster_image_url[0]); ?> data-options="width:900, height:506" <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true, 'lightbox_vimeo'); ?>>
						<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="preview" />
						<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-play"></i>
							</div>
						</div>
		            </a>
					
					<?php
						break;
						//end vimeo
						
					case 'Self-Hosted Video':
					
						//Get video URL
						$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
						$preview_image = wp_get_attachment_image_src($image_id, 'large', true);
					?>
					<a data-rel="photography_portfolio_<?php echo esc_attr($current_page_id); ?>"  href="<?php echo esc_url($portfolio_mp4_url); ?>" data-src="<?php echo esc_url($portfolio_mp4_url); ?>" <?php echo photography_get_portfolio_lightbox_caption_attr(get_the_title(), $poster_image_url[0]); ?> <?php echo photography_get_progressive_attr($image_id, $small_image_url[0], $mobile_image_url[0], true, 'lightbox_vimeo'); ?>>
						<img src="<?php echo esc_url(photography_get_progressive_preview_image($image_id, 'photography-gallery-grid')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" data-options="width:900, height:506" class="preview" />
						<div class="portfolio_classic_icon_wrapper">
							<div class="portfolio_classic_icon_content">
								<i class="fa fa-play"></i>
							</div>
						</div>
		            </a>
					
					<?php
						break;
						//end self-hosted
					?>
					
					<?php
						}
						//end switch
					?>
					
					<div id="portfolio_desc_<?php echo esc_attr($portfolio_ID); ?>" class="portfolio_desc portfolio3 wide filterable">
        			    <h5><?php echo get_the_title(); ?></h5>
					    <div class="post_detail"><?php echo get_the_excerpt(); ?></div>
				    </div>
			<?php
				}		
			?>
		</div>
	</div>
	<?php
		endwhile; endif;
	?>
		
	</div>
	
	<?php
	    if($wp_query->max_num_pages > 1)
	    {
	    	if (function_exists("photography_pagination")) 
	    	{
	?>
			<br class="clear"/>
	<?php
	    	    photography_pagination($wp_query->max_num_pages);
	    	}
	    	else
	    	{
	    	?>
	    	    <div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
	    	<?php
	    	}
	    ?>
	    <div class="pagination_detail">
	     	<?php
	     		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	     	?>
	     	<?php esc_html_e('Page', 'photography-translation' ); ?> <?php echo esc_html($paged); ?> <?php esc_html_e('of', 'photography-translation' ); ?> <?php echo esc_html($wp_query->max_num_pages); ?>
	     </div>
	     <br class="clear"/><br/>
	     <?php
	     }
	?>
	</div>

</div>
</div>
</div>
<?php get_footer(); ?>
<!-- End content -->