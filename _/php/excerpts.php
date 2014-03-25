<?php

/**
 * Generates an excerpt from the content, if needed. (outside the loop)
 *
 * @param int|object $post_or_id can be the post ID, or the actual $post object itself
 * @param string $excerpt_more the text that is applied to the end of the excerpt if we algorithically snip it
 * @return string the snipped excerpt or the manual excerpt if it exists         
 */
function shwib_excerpt($post_or_id, $excerpt_more = ' [...]') {
    if ( is_object( $post_or_id ) ) $postObj = $post_or_id;
    else $postObj = get_post($post_or_id);

    $raw_excerpt = $text = $postObj->post_excerpt;
    if ( '' == $text ) {
        $text = $postObj->post_content;
        $text = __($text);
        $text = strip_shortcodes( $text );
		
        $text = apply_filters('the_content', $text);
    //   $text = str_replace(']]>', ']]&gt;', $text);
        $text = strip_tags($text);
        $excerpt_length = apply_filters('excerpt_length', 55);

        // don't automatically assume we will be using the global "read more" link provided by the theme
        // $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
        if ( count($words) > $excerpt_length ) {
            array_pop($words);
            $text = implode(' ', $words);
            $text = $text . $excerpt_more;
        } else {
            $text = implode(' ', $words);
        }
    }
    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}

/**
     * Generates a description of the current page.
     *
*/	 
	
function shwib_description() {
	global $wp_query;

	$description = '';

	if ( is_home() ) {
		$description = get_bloginfo( 'description' );
	}

	elseif ( is_singular() ) {
		$description = get_metadata( 'post', $wp_query->post->ID, 'Description', true );

		if ( empty( $description ) && is_front_page() )
			$description = get_bloginfo( 'description' );

		elseif ( empty( $description ) )
			$description = shwib_excerpt($wp_query->post->ID,'');
	}

	elseif ( is_archive() ) {

		if ( is_author() )
			$description = get_the_author_meta( 'description', get_query_var( 'author' ) );

		elseif ( is_category() || is_tag() || is_tax() )
			$description = term_description( '', get_query_var( 'taxonomy' ) );

		elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) {
			$post_type = get_post_type_object( get_query_var( 'post_type' ) );
			$description = $post_type->description;
		}
	}
return __($description);
}

function shwib_the_excerpt_max_charlength($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
	   $subex = substr($excerpt,0,$charlength-5);
	   $exwords = explode(" ",$subex);
	   $excut = -(strlen($exwords[count($exwords)-1]));
	   if($excut<0) {
			echo substr($subex,0,$excut);
	   } else {
			echo $subex;
	   }?>
	   <a style="text-decoration:none;" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">...</a><?php
   } else {
	   echo $excerpt;
   }
}

function shwib_image() {
	global $post;
	$image ='';
	if ( is_singular() && empty($image) && has_post_thumbnail($post->ID) ) {
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail');
		if ($thumbnail) {
			$image = $thumbnail[0];
		}
	}
	if ( is_singular() && empty($image) && has_post_thumbnail($post->ID)  ) {
        $thumbnailID = get_post_thumbnail_id( $post->ID );
        // If the post thumbnail id has the form ngg- then it is a NextGEN image.
        if ( is_string($thumbnailID) && substr($thumbnailID, 0, 4) == 'ngg-') {
            $thumbnailID = substr($thumbnailID, 4);
            $image = nggdb::find_image($thumbnailID);
            if ($image) { // Safety check for null pointer.
                $image = $image->thumbURL;
				 $image = str_replace("thumbs/thumbs_","",$image);
            }
		
        }
    }
	if ($image == '') {$image = get_bloginfo('template_url').'/_/img/logo.png';}
    return $image;
}