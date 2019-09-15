<?php
  /*template name: pokestar
  */


 $args = array(
    'post_type'=>'competidores'
 );
 $query = new WP_query($args);

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
    <title>PokeStars</title>
  </head>
  <body>
    <header>
      <div>
        <p>PokeStars</p>
      </div>
      <hr />
    </header>

    <section>
      <div class="campeao">
        <p>Campeāo</p>
        <img
          src="https://scontent.fcgh19-1.fna.fbcdn.net/v/t1.0-9/68588770_2433132770081848_5080710212520771584_n.jpg?_nc_cat=106&_nc_oc=AQkjhjf4RverRfh8EdPSom_qJx9weQnLKN0SWW578Nv9WMgXNuh6ndljk6Tg7dLnxetuLQ6HJEQEYWWFEq7FT5hZ&_nc_ht=scontent.fcgh19-1.fna&oh=3baa5d3fa14f300ccb76dcbba3192d4c&oe=5DF240B9"
          alt="ale"
        />
      </div>
    </section>

    <?php 
    $id_numb=1;
    $i=1;
    $number_of_pokes=12;
    while ($query->have_posts()): $query->the_post(); $avatar_url = get_field('avatar');
    ?>

        <section id="cards">
            <div class="card" id="<?= $id_numb; ?>">
                <p><?= the_title();?></p>
                <img
                src="<?= $avatar_url['sizes']['medium_large']; ?>"
                alt="ale"
                />
                <ul>
                <?php while ($i <= $number_of_pokes) : ?>
                        <li>
                            <img
                            src="https://play.pokemonshowdown.com/sprites/ani/<?= the_field("poke{$i}"); ?>.gif"
                            alt=""
                            class="sprite"
                            />
                            <span><?= the_field("poke{$i}"); ?></span>
                        </li>
                    <?php $i++; endwhile; $i=1; ?>        
                </ul>
            </div>
        </section>
    <?php  
        $id_numb++; endwhile;
    ?>  
        

    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"
    ></script>
    <script src="<?= get_template_directory_uri() ;?>/assets/js/script.js"></script>
  </body>
</html>
