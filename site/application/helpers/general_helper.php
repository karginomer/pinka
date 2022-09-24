<?php 
function getSlider() {
    $t = &get_instance();
    $slides=$t->db->get("pi_slides")->result();
    return $slides;
}