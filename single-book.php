<?php
/**
 * The template for displaying all single books
*/
get_header();
?>

		<div class="book_bg">
		<div><div class="book_img">
			<?php
			the_post_thumbnail()?></div><?php		
			echo '<div class="book_main"><h1 class="book_title">' .get_the_title( $ID ). '</h1>' ;
			if(get_post_meta( get_the_ID(), 'book_saleprice', true )){
			echo '<ul class="book_details"><li style="text-decoration: line-through;color: #ccc;display: inline-block;">$' .esc_attr( get_post_meta( get_the_ID(), 'book_saleprice', true ) ). '</li>';
			echo '<li style="margin-left: 10px;display: inline-block;">$' .esc_attr( get_post_meta( get_the_ID(), 'book_price', true ) ). '</li></ul>';
			}
			else{
				echo '<h5>$' .esc_attr( get_post_meta( get_the_ID(), 'book_price', true ) ). '</h5>';
			}
			
			echo '<p>Author: ' .esc_attr( get_post_meta( get_the_ID(), 'book_author', true ) ). '</p>' ;
			echo "<h4>Highlights</h4>"; ?>
			<ul>
			<li>Publisher: <a href="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_publisherwebsite', true ) ); ?>">
			<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_publisher', true ) ). '</a></li>' ;
			echo "<li>Publication Date: ".esc_attr( get_post_meta( get_the_ID(), 'book_published_date', true ) )."</li>";
			echo "<li>ISBN: ".esc_attr( get_post_meta( get_the_ID(), 'book_isbn', true ) )."</li>";
			echo "<li>Genre: ".esc_attr( get_post_meta( get_the_ID(), 'book_genre', true ) )."</li></ul></div>";
			echo "<h4>Book Overview</h4>";
			echo '<p>' .get_post_field('post_content', $ID) . '<p></div>';
			
			

			?>
		</div>
	
<style>
.book_bg{width: 100%;padding: 30px;background: #fff;color: #000;}
.book_bg img{float:left;}
.book_main{display: inline-block;width: 80%;padding:0px;margin-left: 25px;}
.book_title{text-transform: capitalize;}
.book_img{ display: inline-block;width: 15%;}
.book_details{list-style: none;font-size: 20px;margin: 0 auto;}
</style>
<?php
get_footer();
?>