<?php /* Template Name: blog_meditation */?>
<?php include_once get_stylesheet_directory().'/new-header.php'; 
global $wpdb;

$query = "SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id = 5902";
$res = $wpdb->get_results($query);
//print_r($res);
$fetch_string = '';
foreach($res as $key){
$fetch_string .= $key->object_id.','; 
}
$fetch_string=  rtrim($fetch_string,',');
//echo $fetch_string;

$query = "SELECT * FROM wp_posts WHERE ID in ($fetch_string)";
$res=$wpdb->get_results($query);
//print_r($res[0]);

?>
<style>


.post_container{
	display:flex;
	width:65%;
	margin:0 auto;
	flex-wrap: wrap;
	justify-content: center;
}
.post{
	width:45%;
	overflow: hidden;
	padding:1rem;
	height: 25rem;
}
.post img{
	width:100%;
	height: 70%;
}
.post h2{
	text-align: center;
	font-size: 20px;
}
.post_cont{
	font-size: 18px;
}


@media screen and (max-width:768px) and (min-width:767px){
	.post_container{
	display:flex;
	width:100%;
	margin:0 auto;
	flex-wrap: wrap;
	justify-content: center;
}

.post{
	width:100%;
	overflow: hidden;
	padding:0rem;
	height: 20rem;
}
}


@media screen and (max-width:767px) and (min-width:320px){
	body{
	padding-top:10px;
}
.post_container{
	display:flex;
	width:100%;
	margin:0 auto;
	flex-wrap: wrap;
	justify-content: center;
}
.post{
	width:100%;
	overflow: hidden;
	padding:0rem;
	height: 20rem;
}
.post img{
	width:65%%;
	height: 70%;
}
.blog_heading{
	font-size:35px;
}	
}



</style>
<h1 class="blog_heading">Meditation</h1>
<div class="post_container">
<?php 
foreach($res as $key){
//print_r($key);
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $key->ID ))[0];
$post_title = $key->post_title;
$post_author = get_user_meta($key->post_author)['nickname'][0];
$post_date = date('d M Y',strtotime($key->post_date_gmt));
$permalink = get_permalink($key->ID);


?>
	<div class="post">
		<a href="<?php echo $permalink;?>"><img src="<?php echo $image;?>">
		<h2><?php echo $post_title;?></h2>
		<p class="post_author">By <i><?php echo $post_author;?></i> On - <?php echo $post_date; ?></p>
		</a>
	</div>
<?php }?>
</div>


<?php include_once get_stylesheet_directory().'/new-footer.php';?>