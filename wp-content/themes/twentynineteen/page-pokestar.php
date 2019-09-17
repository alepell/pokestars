<?php
  /*template name: pokestar
  */
 $args = array(
    'post_type'=>'competidores',
    'posts_per_page' => -1
    
 );
 $query = new WP_query($args);
 $champion= get_field('champion_details');
 $background_image_URL= get_field('background_image');

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/reset.css"  />
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/style.css" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?> /assets/icons.ico" />
    <title>PokeStars - Tournament</title>
  </head>
  <body
      <?php if ($background_image_URL): ?>
        style="
        background-image: url(<?= wp_get_attachment_image($background_image_URL,'full'); ?> );
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        "
      <?php endif; ?>
   >
    <header>
      <div>
        <p>PokeStars</p>
      </div>
      <hr />
    </header>
    
    <?php 
    if ($champion): 
      $post = $champion;
      setup_postdata( $post ); 
      $avatar_url = get_field('avatar');
      ?>
      <section>
        <div class="campeao">
          <p>Campeāo</p>
          <h4><?= the_title(); ?></h4>
          <img
            src="<?= $avatar_url['sizes']['medium_large']; ?>"
            alt="<?= the_title(); ?>"
          />
        </div>
      </section>
    <?php
      wp_reset_postdata();
    endif; ?>




<section id="cards">
    <?php 
    $id_numb=1;
    $i=1;
    $number_of_pokes=12;
    while ($query->have_posts()): $query->the_post(); $avatar_url = get_field('avatar'); ?>

      <div class="card" id="<?= $id_numb; ?>">
          <p><?= the_title();?></p>
          <img
          src="<?= $avatar_url['sizes']['medium_large']; ?>"
          alt="<?= the_title();?>"
          />
          <ul>
            <?php 
            while ($i <= $number_of_pokes) : ?>
                  <li>
                      <img
                      src="https://play.pokemonshowdown.com/sprites/ani/<?= the_field("poke{$i}"); ?>.gif"
                      alt=""
                      class="sprite"
                      />
                      <span><?= the_field("poke{$i}"); ?></span>
                  </li>
            <?php
            $i++; endwhile; $i=1; ?>        
          </ul>
      </div>
 
    <?php  $id_numb++; endwhile;  wp_reset_postdata(); ?>  
</section>

    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script src="<?= get_template_directory_uri() ;?>/assets/js/script.js"></script>
  </body>
</html>
