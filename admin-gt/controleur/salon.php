<?php

//MODIFICATION DE L'IMAGE 1
if (isset($_POST['submit']) && isset($_FILES['photoCarrousel1'])) {
    $image = new Upload($_FILES['photoCarrousel1']);
    if ($image->uploaded) {
        $image->file_new_name_body   = 'image1';
        $image->image_resize         = true;
        $image->image_convert        = 'webp';
        $image->webp_quality         = 50;
        $image->image_y              = 880;
        $image->image_x              = 1920;
        $image->image_ratio_crop     = true;
        $image->image_no_enlarging   = true;
        $image->file_overwrite       = true;
        $image->process('../public/images/carrousel');
        //echo $image->log;
        if ($image->processed) {
            //echo 'image envoyée';
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'image a bien été remplacée !'
            ];
            $image->clean();
        } else {
            //echo 'error : ' . $image->error;
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Échec : l\'image n\'a pas pu être remplacée'
            ];
        }
    }
}

//MODIFICATION DE L'IMAGE 2
if (isset($_POST['submit']) && isset($_FILES['photoCarrousel2'])) {
    $image = new Upload($_FILES['photoCarrousel2']);
    if ($image->uploaded) {
        $image->file_new_name_body   = 'image2';
        $image->image_resize         = true;
        $image->image_convert        = 'webp';
        $image->webp_quality         = 50;
        $image->image_y              = 880;
        $image->image_x              = 1920;
        $image->image_ratio_crop     = true;
        $image->image_no_enlarging   = true;
        $image->file_overwrite       = true;
        $image->process('../public/images/carrousel');
        //echo $image->log;
        if ($image->processed) {
            //echo 'image envoyée';
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'image a bien été remplacée !'
            ];
            $image->clean();
        } else {
            //echo 'error : ' . $image->error;
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Échec : l\'image n\'a pas pu être remplacée'
            ];
        }
    }
}

//MODIFICATION DE L'IMAGE 3
if (isset($_POST['submit']) && isset($_FILES['photoCarrousel3'])) {
    $image = new Upload($_FILES['photoCarrousel3']);
    if ($image->uploaded) {
        $image->file_new_name_body   = 'image3';
        $image->image_resize         = true;
        $image->image_convert        = 'webp';
        $image->webp_quality         = 50;
        $image->image_y              = 880;
        $image->image_x              = 1920;
        $image->image_ratio_crop     = true;
        $image->image_no_enlarging   = true;
        $image->file_overwrite       = true;
        $image->process('../public/images/carrousel');
        //echo $image->log;
        if ($image->processed) {
            //echo 'image envoyée';
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'image a bien été remplacée !'
            ];
            $image->clean();
        } else {
            //echo 'error : ' . $image->error;
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Échec : l\'image n\'a pas pu être remplacée'
            ];
        }
    }
}

//MODIFICATION DE L'IMAGE 4
if (isset($_POST['submit']) && isset($_FILES['photoCarrousel4'])) {
    $image = new Upload($_FILES['photoCarrousel4']);
    if ($image->uploaded) {
        $image->file_new_name_body   = 'image4';
        $image->image_resize         = true;
        $image->image_convert        = 'webp';
        $image->webp_quality         = 50;
        $image->image_y              = 880;
        $image->image_x              = 1920;
        $image->image_ratio_crop     = true;
        $image->image_no_enlarging   = true;
        $image->file_overwrite       = true;
        $image->process('../public/images/carrousel');
        //echo $image->log;
        if ($image->processed) {
            //echo 'image envoyée';
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'image a bien été remplacée !'
            ];
            $image->clean();
        } else {
            //echo 'error : ' . $image->error;
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Échec : l\'image n\'a pas pu être remplacée'
            ];
        }
    }
}

//MODIFICATION DE L'IMAGE 5
if (isset($_POST['submit']) && isset($_FILES['photoCarrousel5'])) {
    $image = new Upload($_FILES['photoCarrousel5']);
    if ($image->uploaded) {
        $image->file_new_name_body   = 'image5';
        $image->image_resize         = true;
        $image->image_convert        = 'webp';
        $image->webp_quality         = 50;
        $image->image_y              = 880;
        $image->image_x              = 1920;
        $image->image_ratio_crop     = true;
        $image->image_no_enlarging   = true;
        $image->file_overwrite       = true;
        $image->process('../public/images/carrousel');
        //echo $image->log;
        if ($image->processed) {
            //echo 'image envoyée';
            $msg['message'] = [
                'code' => 'success',
                'text' => 'L\'image a bien été remplacée !'
            ];
            $image->clean();
        } else {
            //echo 'error : ' . $image->error;
            $msg['message'] = [
                'code' => 'warning',
                'text' => 'Échec : l\'image n\'a pas pu être remplacée'
            ];
        }
    }
}


require_once 'vue/salonVue.php';
