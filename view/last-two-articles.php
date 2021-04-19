<?php
    echo get_post();
    if (the_content()) {
        the_content();
      } else {
          _e('Cet article est actuellement vide','ikadia-theme');
      }
    //echo "afficher les 2 derniers articles";
?>