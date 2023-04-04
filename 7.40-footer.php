<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shujon
 */
global $shujon_options;
?>

	<footer id="colophon" class="site-footer">
      <div class="footer-top">
      <?php
      if( isset($shujon_options['footer-logo']) ) {
         echo '<div class="footer-logo"><a href="'.esc_url(home_url()).'">' . wp_get_attachment_image( $shujon_options['footer-logo']['id'] ) . '</a></div>';
      }

      if( isset($shujon_options['social_links']) && !empty($shujon_options['social_links']) ) {
         echo '<div class="footer-social">';
         foreach($shujon_options['social_links'] as $social_link) {
            $link_text = str_replace( array('https://', 'http://', 'www.', '.com', '/'), '', $social_link );

            switch($link_text) {
               case 'facebook' :
                  echo '<a href="'.esc_url($social_link).'">'.$link_text.'</a>';
                  break;

               case 'twitter' :
                  echo '<a href="'.esc_url($social_link).'">'.$link_text.'</a>';
                  break;

               case 'instagram' :
                  echo '<a href="'.esc_url($social_link).'">'.$link_text.'</a>';
                  break;

               case 'youtube' :
                  echo '<a href="'.esc_url($social_link).'">'.$link_text.'</a>';
                  break;

               default :
                  echo '<a href="'.esc_url($social_link).'">'.$link_text.'</a>';
            }
            
         }
         echo '</div>';
      }
      ?>
      </div>

      <?php
      $footer_menu = isset($shujon_options['footer-menu']) ? $shujon_options['footer-menu'] : '';
      wp_nav_menu(
         array(
            'menu'                 => $footer_menu,
            'menu_id'        => 'footer-menu',
         )
      );
      ?>
		<div class="site-info">
         <?php
         if( isset($shujon_options['front-footer-copyright']) ) {
            echo $shujon_options['front-footer-copyright'];
         }
         ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
