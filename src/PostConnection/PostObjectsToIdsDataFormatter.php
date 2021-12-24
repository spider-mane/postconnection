<?php

namespace WebTheory\Post2Post;

use WP_Query;
use WebTheory\Leonidas\Fields\Formatters\PostsToIdsDataFormatter;
use WebTheory\Saveyour\Contracts\DataFormatterInterface;

class PostObjectsToIdsDataFormatter extends PostsToIdsDataFormatter implements DataFormatterInterface
{
    /**
     * @return array
     */
    public function formatInput($posts)
    {
        if (in_array('', $posts)) {
            unset($posts[array_search('', $posts)]);
        }

        if (!empty($posts)) {
            $query = new WP_Query([
                'post_type' => 'any',
                'post__in' => $posts,
                'posts_per_page' => -1,
                'suppress_filters' => true,
            ]);

            $posts = $query->get_posts();
        }

        return $posts;
    }
}
