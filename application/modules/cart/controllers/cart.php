

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cart extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function _draw_add_to_cart($item_id) {

        //Fetch the color options for this item
        $submitted_color = $this->input->post('submitted_color', TRUE);
        if ($submitted_color == "") {
            $color_options[] = "Select...";
        }

        $this->load->module('store_item_colors');
        $query = $this->store_item_colors->get_where_custom('item_id', $item_id);
        $data['num_colors'] = $query->num_rows();
        foreach ($query->result() as $row) {
            $color_options[$row->id] = $row->color;
        }

        //Fetch the size options for this item
        $submitted_size = $this->input->post('submitted_size', TRUE);
        if ($submitted_size == "") {
            $size_options[] = "Select...";
        }

        $this->load->module('store_item_sizes');
        $query = $this->store_item_sizes->get_where_custom('item_id', $item_id);
        $data['num_sizes'] = $query->num_rows();
        foreach ($query->result() as $row) {
            $size_options[$row->id] = $row->size;
        }

        $data['submitted_color'] = $submitted_color;
        $data['submitted_size'] = $submitted_size;
        $data['color_options'] = $color_options;
        $data['size_options'] = $size_options;
        $data['item_id'] = $item_id;
        $this->load->view('add_to_cart', $data);
    }

}
