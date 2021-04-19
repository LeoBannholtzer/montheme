<?php

namespace MonTheme;

class MonThemeBlogModel {
    public $args;
    public function __construct()
    {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $this->args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
            'post_status'       => 'publish',
            'paged'             => $paged,
        );
    }

    public function getAllResults(): \WP_Query
    {
        $args                       = $this->args;
        return new \WP_Query($args);
    }

    public function getLastTwoArticles(): \WP_Query {
        $args                       = $this->args;
        $args['posts_per_page']     = 2;
        $args['orderby']            = 'date';
        $args['order']              = 'DESC';
        return new \WP_Query($args);
    }
}