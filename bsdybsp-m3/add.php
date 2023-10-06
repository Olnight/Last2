<?php
require_once ('helpers.php');
require_once ('functions.php');
require_once ('init.php');
$categories = getCategories($con);
$nav = include_template('categories.php', ['categories' => $categories]);

$error_codes = array(
    "lot-name" => false,
    "category" => false,
    "message" => false,
    "lot-img" => false,
    "lot-rate" => false,
    "lot-step" => false,
    "lot-date" => false
);
$form_data = array(
    "lot-name" => "",
    "category" => 0,
    "message" => "",
    "lot-img" => "",
    "lot-rate" => "",
    "lot-step" => "",
    "lot-date" => ""
);;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $form_data = $_POST;
}

if (isset($_POST['lot-name']) && empty($_POST['lot-name'])) {
    $error_codes["lot-name"] == true;
}

if (isset($_POST['category']) && !$_POST['category']) {
    $error_codes["category"] == true;
}

if (isset($_POST['message']) && empty($_POST['message'])) {
    $error_codes["message"] == true;
}

if (isset($_FILES['lot-img']) && !empty($_FILES['lot-img']['tmp_name'])) {
    $mine_type = mime_content_type($_FILES['lot-img']['tmp_name']);
    $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
    if(!in_array($mine_type, $allowed_file_types)){
        $error_codes["lot-img"] == true;
    }
}

if(
    isset($_POST['lot-rate'])
    && empty($_POST['lot-rate']
    && !preg_match("/[a-zA-Z]/", $_POST['lot-rate']))
) {
    $error_codes["lot-rate"] = true;
}

if(
    isset($_POST['lot-step'])
    && empty($_POST['lot-step']
    && !preg_match("/[a-zA-Z]/", $_POST['lot-step']))
) {
    $error_codes["lot-step"] = true;
}

if(
    isset($_POST['lot-date'])
    && !lastTime($_POST['lot-date'])
) {
    $error_codes["lot-date"] = true;
}

if(!isset($_FILES['lot-img']))
{
    $error_codes["lot-img"] = true;
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(empty(array_filter($error_codes, 'strlen'))){
        $data = $_POST;
        $data["author_id"] = $user_id;

        $file_name = $_FILES["lot-img"]['name'] . time();

        $data["image_link"] = '/uploads/'. $file_name;
        move_uploaded_file($_FILES["lot-img"]['tmp_name'], UPLOADS_PATH . $file_name);

        $lot_id = add_lot_to_database($mysql, $data);
        
        header("location: /lot.php?id-" . $lot_id);
    }

}
print(include_template('header.php', [
    #'page_title' => $page_title,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => getCategories($con),
]));

print(include_template('add.php', [
    'error_codes' => $error_codes,
    'form_data' => $form_data,
    'nav' => $nav,
    'categories' => getCategories($con),
]));

?>

</div>

<?php

print(include_template('footer.php', [
    'categories' => getCategories($con),
]));
?>