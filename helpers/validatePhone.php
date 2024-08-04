<?php 
function validatePhoneNumber($phoneNumber) {
    $pattern = '/^(\+?\d{1,4}[\s-]?)\(?\d{2,5}\)?[\s-]?\d{4,15}$/';

    if (preg_match($pattern, $phoneNumber)) {
        return true;
    } else {
        return false;
    }
}