<?php
    //echo "ok1";
    //$posts = $query->posts;
    $posts = $args['query']->posts;
    $i = 0;

    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    foreach ($posts as $post) {
        if ($i == 0) {
            $titre_categorie = "";
            $categories = get_the_category($post->ID);
            foreach ($categories as $categorie) {
                if ($categorie->name != "Non classé") {
                    $titre_categorie .= $categorie->name." ";
                }
            }						
            ?>
                <!-- PARTIE 1 -->
                <div id="div_text_article1" class="col-sm-6 bg-dark text-white">
                    <div class="col-sm-8 offset-sm-4 animate__animated animate__fadeInLeft">
                        <br />
                        <?php
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
                            $mois = $date->format('M');
                            $jour = $date->format('d');
                            $annee = $date->format('Y');
                            $string = "<p class='text-muted'>".$mois." ".$jour.", ".$annee;
                            if ($titre_categorie != "") {
                                $string .= " | ".$titre_categorie;
                            }
                            $string .= "</p>";
                            echo $string;
                            $link = get_site_url()."/";
                            $link .= $annee."/".$date->format('m')."/".$jour."/".$post->post_name;
                        ?>
                        <h4 class="text-uppercase"><a class="text-white" href="<?php echo $link ?>"><?php echo $post->post_title ?></a></h4>
                        <?php $content = get_string_between($post->post_content, '<!-- wp:paragraph -->', '<!-- /wp:paragraph -->'); $content = str_replace("<p>", "", $content); $content = str_replace("</p>", "", $content); $content = strlen($content) > 100 ? substr($content,0,100)."..." : $content ;echo "<p class='text-muted mt-2' style='font-size:10px;'>".$content."</p>" ?>
                    </div>
                </div>
                <div class="col-sm-6" style="padding-left: 0px !important;padding-right: 0px !important;">
                    <?php
                        $doc = new DOMDocument();
                        libxml_use_internal_errors(true);
                        $doc->loadHTML($post->post_content);
                        $xpath = new DOMXPath($doc);
                        $imgs = $xpath->query("//img");
                        $src = null;
                        for ($i=0; $i < $imgs->length; $i++) {
                            $img = $imgs->item($i);
                            $src = $img->getAttribute("src");
                        }
                        if ($src != null) {
                            echo "<img id='img_article1' src='".$src."'>";
                        }
                    ?>
                </div>
            <?php
        } else {
            $titre_categorie = "";
            $categories = get_the_category($post->ID);
            foreach ($categories as $categorie) {
                if ($categorie->name != "Non classé") {
                    $titre_categorie .= $categorie->name." ";
                }
            }
            ?>
                <!-- PARTIE 2 -->
                <div class="col-sm-6" style="padding-left: 0px !important;padding-right: 0px !important;">
                    <?php
                        $doc = new DOMDocument();
                        libxml_use_internal_errors(true);
                        $doc->loadHTML($post->post_content);
                        $xpath = new DOMXPath($doc);
                        $imgs = $xpath->query("//img");
                        $src = null;
                        for ($i=0; $i < $imgs->length; $i++) {
                            $img = $imgs->item($i);
                            $src = $img->getAttribute("src");
                        }
                        if ($src != null) {
                            echo "<img id='img_article2' src='".$src."'>";
                        }
                    ?>
                </div>
                <div id="div_text_article2" class="col-sm-6">
                    <div class="col-sm-8 animate__animated animate__fadeInRight">
                        <br />
                        <?php
                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $post->post_date);
                            $mois = $date->format('M');
                            $jour = $date->format('j');
                            $annee = $date->format('Y');
                            $string = "<p class='text-muted'>".$mois." ".$jour.", ".$annee;
                            if ($titre_categorie != "") {
                                $string .= " | ".$titre_categorie;
                            }
                            $string .= "</p>";
                            echo $string;
                            $link = get_site_url()."/";
                            $link .= $annee."/".$date->format('m')."/".$jour."/".$post->post_name;
                        ?>
                        <h4 class="text-uppercase"><a class="text-dark" href="<?php echo $link ?>"><?php echo $post->post_title ?></a></h4>
                        <?php $content = get_string_between($post->post_content, '<!-- wp:paragraph -->', '<!-- /wp:paragraph -->'); $content = str_replace("<p>", "", $content); $content = str_replace("</p>", "", $content); $content = strlen($content) > 100 ? substr($content,0,100)."..." : $content ;echo "<p class='text-muted mt-2' style='font-size:10px;'>".$content."</p>" ?>
                    </div>
                </div>
            <?php
        }
        $i++;
    }
?>