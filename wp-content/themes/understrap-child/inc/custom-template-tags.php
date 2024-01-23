<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_posted_on_custom' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function understrap_posted_on_custom() {
		$post = get_post();
		if ( ! $post ) {
			return;
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( 'c' ) ), // @phpstan-ignore-line -- post exists
			esc_html( get_the_date('M j, Y') ), // @phpstan-ignore-line -- post exists
			esc_attr( get_the_modified_date( 'c' ) ), // @phpstan-ignore-line -- post exists
			esc_html( get_the_modified_date('M j, Y') ) // @phpstan-ignore-line -- post exists
		);

		$posted_on = apply_filters(
			'understrap_posted_on',
			sprintf(
				'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
				esc_url( get_permalink() ), // @phpstan-ignore-line -- post exists
				apply_filters( 'understrap_posted_on_time', $time_string )
			)
		);

		$author_id = 0 !== (int) get_the_author_meta( 'ID' ) ? (int) get_the_author_meta( 'ID' ) : $post->post_author;
        $byline = apply_filters(
            'understrap_posted_by',
            sprintf(
                '<span class="byline">&nbsp&nbsp&nbsp %1$s<span class="author vcard"> <a class="url fn n" href="%2$s">%3$s</a></span></span>',
                $posted_on ? esc_html_x( 'By', 'post author', 'understrap' ) : esc_html_x( 'Posted by', 'post author', 'understrap' ),
                esc_url( get_author_posts_url( $author_id ) ),
                esc_html( get_the_author_meta( 'display_name', $author_id ) )
            )
        );

		echo $posted_on . $byline; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
