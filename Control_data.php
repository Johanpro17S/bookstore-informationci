<?php

//aplikasi bookstore

defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Control_data extends CI_Controller{

    function index(){
        $this->load->view('control/management');
    }

    //load-view add-book
    function add_book(){
        $this->load->view('control/add_book');
    }

    //load-view add-category
    function add_category(){
        $this->load->view('control/add_category');
    }

    //load-view add-location
    function add_location(){
        $this->load->view('control/add_location');
    }
    
    //load-view add-author
    function add_author(){
        $this->load->view('control/add_author');
    }
    //end add-view loader



    //delete function
    function delete($book_id){
        $this->load->model('m_data');
        $this->m_data->del_by_id('tbl_book_detail',$book_id);
        redirect('web/management');
    }


    //get id -> book import
    function author_id(){
        //get data from db

        $this->db->order_by('author_id','asc');
        $result = $this->db->get('author_name');

        $authorid[''] = 'Pilih Author';
        if($result->num_rows()>0){
            foreach($result->result() as $rowauth){ 
                $authorid[$rowauth->author_id] = $rowauth->author_name;
            }
        }
        return $authorid;
    }


    //end


}
