<?php 
	$getBanners = getAllDataWithStatus('services_banners','0');				
?>
		<div id="layerslider" style="width:100%;height:600px;">
				<!-- first slide -->
				<?php while($getBannerData = $getBanners->fetch_assoc()){?>
				<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
					<img src="<?php echo $base_url . 'uploads/services_banner_images/'.$getBannerData['banner'] ?>" class="ls-bg" alt="Slide background">					
					<h3 class="ls-l slide_typo" style="top: 45%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;"><?php echo $getBannerData['title'];?></h3>
					<p class="ls-l slide_typo_2" style="top:52%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">Sample Text Replace with original text</p>
					<?php 
						$getCatId = $getBannerData['service_category_id'];
							if(!empty($getCatId)) { ?>
							<a class="ls-l button_intro_2 outline" style="top:370px; left:50%;white-space: nowrap;" data-ls="durationin:2000;delayin:1400;easingin:easeOutElastic;" href='all_tour_list.php?cid=<?php echo $getBannerData['service_category_id']?>'>Read more</a>
						<?php }?>	
					?>
				</div>
				<?php }?>
				<!-- second slide -->
			</div>
			