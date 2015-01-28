<?php if($informations->count() > 0){ ?>
<section class = "information">
	<?php foreach($informations as $information){?>
    	<h3><?php echo $information->title; ?></h3>
		<h2><?php echo date('Y/m/d', strtotime($information->started_at)); ?></h2>
		<p><?php echo $information->description; ?></p>
    <?php }?>
</section>
<?php } ?>