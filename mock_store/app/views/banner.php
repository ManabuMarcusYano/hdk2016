<section class = "banner">
	<?php foreach($banners as $banner){?>
    	<div><a href = "<?php echo $banner->link_path; ?>"><img src="<?php echo $banner->img_path; ?>" class = "banner_img" /></a></div>
    <?php }?>
</section>