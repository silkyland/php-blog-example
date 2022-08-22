<?php
function isUrl($url)
{
    return preg_match('/^(http|https):\/\/[a-z0-9_]+([\-\.]{1}[a-z_0-9]+)*\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\/.*)?$/i', $url);
}
