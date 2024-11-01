<div class="book_box">   
    <p class="meta-options book_field">
        <label for="book_author">Book Author</label>
        <input id="book_author" type="text" name="book_author" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_author', true ) ); ?>">
    </p>
    <p class="meta-options book_field">
        <label for="book_publisher">Publisher</label>
        <input id="book_publisher" type="text" name="book_publisher" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_publisher', true ) ); ?>">
    </p>
	<p class="meta-options book_field">
        <label for="book_genre">Genre</label>
        <input id="book_genre" type="text" name="book_genre" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_genre', true ) ); ?>">
    </p>
    <p class="meta-options book_field">
        <label for="book_publisherwebsite">Publisher Website</label>
        <input id="book_publisherwebsite" type="text" name="book_publisherwebsite" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_publisherwebsite', true ) ); ?>">
    </p>	
    <p class="meta-options book_field">
        <label for="book_published_date">Published Date</label>
        <input id="book_published_date" type="date" name="book_published_date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_published_date', true ) ); ?>">
    </p>
    <p class="meta-options book_field">
        <label for="book_price">Book Price</label>
        <input id="book_price" type="number" name="book_price" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_price', true ) ); ?>">
    </p>
	<p class="meta-options book_field">
        <label for="book_saleprice">Book Sale Price</label>
        <input id="book_saleprice" type="number" name="book_saleprice" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_saleprice', true ) ); ?>">
    </p>
	<p class="meta-options book_field">
		<label for="book_isbn">ISBN</label>
        <input id="book_isbn" type="text" name="book_isbn" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'book_isbn', true ) ); ?>">
    </p>
</div>
<style>
.book_box input {
    width: 100%;
    padding: 8px;
    height: 100%;
}
.book_field {
    display: inline-block;
    width: 47%;
    margin-right: 20px;
}
</style>