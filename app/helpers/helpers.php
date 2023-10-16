<?php
// app/helpers.php

if (!function_exists('customHelper')) {
    function customHelper($parameter) {
        // Your helper function logic here
        return 'Processed: ' . $parameter;
    }
}
