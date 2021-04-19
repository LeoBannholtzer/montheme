<?php

namespace MonTheme;

use \MonTheme\MonThemeBlogModel;

class MonThemeBlog {
    protected $options;
    public $item;

    public function __construct()
    {
        $this->options = $this->setOptions();
    }

    public function setActions()
    {
        add_action('last_two_articles', array($this, 'getLastTwoArticles'), 10);
    }

    public function setEnqueues()
    {
        wp_enqueue_script('ikadia_hub_js', IK_HUB_URL . 'assets/js/ikadia-hub-jquery.js', array('jquery'), '1.12.4', false);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions()
    {
        return get_fields('option');
    }

    public function getLastTwoArticles() {
        $model = new namespace\MonThemeBlog();
        $query = $model->getLastTwoArticles();

        get_template_part('view/last-two-articles', 'posts', array(
            'query' => $query,
        ));
    }
}

global $leo_blog;
$leo_blog = new namespace\MonThemeBlog();
$leo_blog->setActions();