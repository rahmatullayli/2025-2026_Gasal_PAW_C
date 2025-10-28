<?php
require 'validate.inc';

$errors = [];

if (validateName($_POST, 'surname', $errors)) {
    echo 'Data OK!';
} else {
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
}
?>
