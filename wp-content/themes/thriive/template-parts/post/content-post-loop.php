<?php if(is_mobile()){ ?>
<div class="log-wrapper text-center">
	<?php get_template_part('template-parts/post/content-post-header');?>
	<div class="col-md-12 text-left">
		<?php the_excerpt(); ?>
	</div>	
</div>
<div class="m-1 mb-4 divider col-12"></div>
<?php }else{?>
    <div class="col log-wrapper text-center divider-bg pb-3">
        <?php get_template_part('template-parts/post/content-post-header');?>
        <div class="col-12 mt-3 text-left">
            <?php the_excerpt(); ?>
        </div>
<!--        <a href="<?php the_permalink();?>" class="btn btn-primary"> READ </a>-->
    </div>
<?php }?>
