<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! Please login first!</div>');
        redirect('Auth');
    }
//     
}
?>