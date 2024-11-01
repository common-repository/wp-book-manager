<?php
/**
 * The template for displaying archive books
 */
get_header();
?>
	<div class="book_bg">
			<h1>Books List View</h1>
			<ul>
			<?php
				$book_posts = wp_get_recent_posts(array('post_type'=>'book'));
				foreach( $book_posts as $recent ){
				if ( has_post_thumbnail( $recent["ID"]) ) {
						echo  "<li style='list-style: none;border-bottom: 1px solid #ccc;margin-bottom: 15px;'><div>". get_the_post_thumbnail($recent["ID"],'thumbnail')."</div> ";
					}
				
					echo '<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li> ';
				    
				}
			?>
			</ul>
	</div>
<style>
.book_bg{width: 100%;padding: 30px;background: #fff;color: #000;}
</style>
<?php
get_footer();
?>