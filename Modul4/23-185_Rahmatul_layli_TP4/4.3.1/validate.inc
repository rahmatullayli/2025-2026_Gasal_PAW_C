<?php
function validateName($field_list, $field_name, &$errors) {
    if (!isset($field_list[$field_name])) {
        $errors[] = "Field '$field_name' is not set.";
        return false;
    }
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[] = "Field '$field_name' harus hanya berisi huruf ";
        return false;
    }
    return true;
}
?>
