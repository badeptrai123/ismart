<?php

use function MicrosoftAzure\Storage\Samples\listShare;

function get_product_by_id($id, $list_product)
{
    if (array_key_exists($id-1, $list_product)) {
        return $list_product[$id-1];
    }
    return false;
}
