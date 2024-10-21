<?php
function truncatContent($content, $wordLimit)
{
    // split the title into words
    $words = explode(' ', $content);

    // limit to the specified number of words
    if (count($words) > $wordLimit) {
        // truncate and add ellipsis
        return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
    } else {
        // if within limit, return original title
        return $content;
    }
}
