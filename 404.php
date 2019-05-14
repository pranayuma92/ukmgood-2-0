<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package UKMGood_2.0
 */

get_header();
?>

	<section class="container rel-pos pd-t-100 pd-b-100">
		<div class="section_header left_section_header short medium d-md-flex">
			<h2 class="section_title">HALAMAN TIDAK DITEMUKAN</h2>
		</div>
		<div class="four-o-four-content text-center">
			<h2>404</h2>
			<p>Sepertinya halaman yang anda cari tidak di temukan</p>
			<a href="<?php echo esc_url(home_url())?>" class="btn btn-red btn-default">Homepage</a>
		</div>
	</section>

<?php
get_footer();
