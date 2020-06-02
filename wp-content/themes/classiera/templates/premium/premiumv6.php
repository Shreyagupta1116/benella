<?php 
	global $redux_demo;
	$premiumSECtitle = $redux_demo['premium-sec-title'];
	$premiumSECdesc = $redux_demo['premium-sec-desc'];	
	$classieraCurrencyTag = $redux_demo['classierapostcurrency'];
	$featuredCatOn = $redux_demo['featured-caton'];
	$classieraFeaturedCategories = $redux_demo['featured-ads-cat'];
	$classieraPremiumAdsCount = $redux_demo['premium-ads-counter'];
	$classieraPrimaryColor = $redux_demo['color-primary'];
	$category_icon_code = "";
	$category_icon_color = "";
	$catIcon = "";
	$catID = "";
	$classieraIconsStyle = $redux_demo['classiera_cat_icon_img'];
	$classiera_ads_typeOn = $redux_demo['classiera_ads_type'];
	if($classiera_ads_typeOn == 1){
		$adstypeQuery = array(
			'key' => 'classiera_ads_type',
			'value' => 'sold',
			'compare' => '!='
		);
	}else{
		$adstypeQuery = null;
	}
?>
<section class="classiera-premium-ads-v6 border-bottom section-pad">
	<?php if(!empty($premiumSECtitle)){ ?>
	<div class="section-heading-v6">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 center-block">
                    <h3 class="text-capitalize"><?php echo esc_html($premiumSECtitle); ?></h3>
					<?php if(!empty($premiumSECdesc)){ ?>
                    <p><?php echo esc_html($premiumSECdesc); ?></p>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
	<?php } ?>
	<div style="overflow: hidden;">
		<div style="margin-bottom: 40px;">			
			<div id="owl-demo" class="owl-carousel premium-carousel-v6" data-car-length="4" data-items="4" data-loop="true" data-nav="false" data-autoplay="true" data-autoplay-timeout="3000" data-dots="false" data-auto-width="false" data-auto-height="true" data-right="<?php if(is_rtl()){echo "true";}else{ echo "false";}?>" data-responsive-small="1" data-autoplay-hover="true" data-responsive-medium="2" data-responsive-large="4" data-responsive-xlarge="6" data-margin="15">
				<?php 
				$cat_id = get_cat_ID(single_cat_title('', false)); 
				global $paged, $wp_query, $wp;
				$args = wp_parse_args($wp->matched_query);
				$temp = $wp_query;
				$wp_query= null;
				if($featuredCatOn == 1){						
					$arags = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $classieraPremiumAdsCount,
						'cat' => $classieraFeaturedCategories,
						'orderby' => 'rand',
					);
				}else{
					$arags = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $classieraPremiumAdsCount,
						'orderby' => 'rand',
						'meta_query' => array(
							array(
								'key' => 'featured_post',
								'value' => '1',
								'compare' => '=='
							),
							$adstypeQuery,
						),
					);
				}
				$wp_query = new WP_Query($arags);
				$current = -1;
				while ($wp_query->have_posts()) : $wp_query->the_post();
					$featured_post = get_post_meta($post->ID, 'featured_post', true);
					if($featuredCatOn == 1){
						$featured_post = "1";
					}
					if($featured_post == "1") {
						$current++;
				?>
				<?php 
					$category = get_the_category();
					if(isset($category[0]->cat_ID)){
						$catID = $category[0]->cat_ID;
					}					
					if(isset($category[0]->category_parent) && $category[0]->category_parent == 0){				
						$tag = $category[0]->cat_ID;
						$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
						if (isset($tag_extra_fields[$tag])) {
							if(isset($tag_extra_fields[$tag]['category_icon_code'])){
								$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
							}
							if(isset($tag_extra_fields[$tag]['category_icon_color'])){
								$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
							}
							if(isset($tag_extra_fields[$tag]['your_image_url'])){
								$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
							}
						}
					}elseif(isset($category[1]->category_parent) && $category[1]->category_parent == 0){
						$tag = $category[0]->category_parent;
						$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
						if (isset($tag_extra_fields[$tag])) {
							if(isset($tag_extra_fields[$tag]['category_icon_code'])){
								$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
							}
							if(isset($tag_extra_fields[$tag]['category_icon_color'])){
								$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
							}
							if(isset($tag_extra_fields[$tag]['your_image_url'])){
								$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
							}
						}
					}else{
						if (isset($category[0]->category_parent)) {
							$tag = $category[0]->category_parent;
							$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
							if (isset($tag_extra_fields[$tag])) {
								if(isset($tag_extra_fields[$tag]['category_icon_code'])){
									$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
								}
								if(isset($tag_extra_fields[$tag]['category_icon_color'])){
									$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
								}
								if(isset($tag_extra_fields[$tag]['your_image_url'])){
									$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
						}
					}
					global $redux_demo;
					$classiera_cat_child = $redux_demo['classiera_cat_child'];
					if($classiera_cat_child == 'child'){
						foreach ($category as $cat){
							$tag = $cat->cat_ID;
							$tag_extra_fields = get_option(MY_CATEGORY_FIELDS);
							if (isset($tag_extra_fields[$tag])) {
								if(isset($tag_extra_fields[$tag]['category_icon_code'])){
									$category_icon_code = $tag_extra_fields[$tag]['category_icon_code'];
								}
								if(isset($tag_extra_fields[$tag]['category_icon_color'])){
									$category_icon_color = $tag_extra_fields[$tag]['category_icon_color'];
								}
								if(isset($tag_extra_fields[$tag]['your_image_url'])){
									$classieraCatIcoIMG = $tag_extra_fields[$tag]['your_image_url'];
								}
							}
						}
					}
					if(!empty($category_icon_code)) {
						$catIcon = stripslashes($category_icon_code);
					}
					if(empty($category_icon_color)) {
						$category_icon_color = $classieraPrimaryColor;
					}
					$postCatgory = get_the_category( $post->ID );
					$categoryLink = get_category_link($catID);
					$classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true);
					$post_currency_tag = get_post_meta($post->ID, 'post_currency_tag', true);
				?>
				<div class="classiera-box-div-v7 item match-height">
					<figure>
						<div class="premium-img">
							<div class="featured">
								<p><?php esc_html_e( 'Featured', 'classiera' ); ?></p>
							</div><!--featured-tag-->
							<?php 
								if(has_post_thumbnail()){
									$classieraIMGURL = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'classiera-370');
									$thumb_id = get_post_thumbnail_id($post->ID);
									$classieraALT = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
									?>
								<img class="img-responsive" src="<?php echo esc_url($classieraIMGURL[0]); ?>" alt="<?php echo esc_attr($classieraALT);  ?>">	
							<?php
								}else{
									$classieraDafult = get_template_directory_uri() . '/images/nothumb.png';
									?>
									<img class="img-responsive" src="<?php echo esc_url($classieraDafult); ?>" alt="<?php echo get_the_title(); ?>">
									<?php
								}
							?>							
						</div><!--premium-img-->
						<figcaption>
							<div class="caption-tags">
								<?php $post_price = get_post_meta($post->ID, 'post_price', true);?>
								<?php if(!empty($post_price)){?>
                                <span class="price btn btn-primary round btn-style-six active">
									<?php 
									if(is_numeric($post_price)){
										echo classiera_post_price_display($post_currency_tag, $post_price);
									}else{ 
										echo esc_attr($post_price); 
									}
									?>
								</span>
								<?php } ?>
								<?php $classiera_ads_type = get_post_meta($post->ID, 'classiera_ads_type', true); ?>
								<?php if(!empty($classiera_ads_type)){?>
                                <span class="buy-sale-tag btn btn-primary round btn-style-six active">
									<?php classiera_buy_sell($classiera_ads_type); ?>
								</span>
								<?php } ?>
                            </div>
							<div class="content">
								<h5><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
								<div class="category">
									<span><?php esc_html_e( 'Category', 'classiera' ); ?> : 
										<a href="<?php echo esc_url($categoryLink); ?>">
											<?php
											if(isset($postCatgory[0]->name)){
												echo esc_html($postCatgory[0]->name);
											}
											?>
										</a>
									</span>
								</div>
								<div class="description">
									<p><?php echo substr(get_the_excerpt(), 0,260); ?></p>
								</div>
								<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'view ad', 'classiera' ); ?> <i class="fas fa-long-arrow-alt-right"></i></a>
							</div>
						</figcaption>
					</figure>
				</div>
				<?php } ?>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
		<div class="navText">
			<?php if(is_rtl()){?>
			<a class="next btn btn-primary radius outline btn-style-six">
				<?php esc_html_e( 'Next', 'classiera' ); ?>
				<i class="icon-right fas fa-long-arrow-alt-right"></i>
			</a>
			<a class="prev btn btn-primary radius outline btn-style-six">
				<i class="icon-left fas fa-long-arrow-alt-left"></i>
				<?php esc_html_e( 'Previous', 'classiera' ); ?>
			</a>
			<?php }else{ ?>
			<a class="prev btn btn-primary radius outline btn-style-six">
				<i class="icon-left fas fa-long-arrow-alt-left"></i>
				<?php esc_html_e( 'Previous', 'classiera' ); ?>
			</a>
            <a class="next btn btn-primary radius outline btn-style-six">
				<?php esc_html_e( 'Next', 'classiera' ); ?>
				<i class="icon-right fas fa-long-arrow-alt-right"></i>
			</a>
			<?php } ?>			
		</div>
	</div>
</section>