<?php

function x_pow_y($x, $y) {
    return pow($x, $y);
}

function fact($x) {
    if ($x == 0 || $x == 1) return 1;
    else return $x * fact($x - 1);
}

function my_tg($x) {
    if (cos($x) == 0) return NAN;
    return sin($x) / cos($x);
}

function sin_x($x) {
    return sin($x);
}

function cos_x($x) {
    return cos($x);
}

function tg_x($x) {
    return tan($x);
}
?>
