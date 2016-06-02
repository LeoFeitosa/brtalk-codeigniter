<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends MX_Controller {

    protected $_modulo;
    protected $_controller;
    
    public function  __construct() {
        parent::__construct();
    }
    
    protected function _mensagem_status( $status, $msg, $url, $type_box = 1 )
    {
        $array = array( 'status' => $status, 
                        'msg'    => $msg,
                        'box'    => $type_box );
        $this->session->set_flashdata( 'msg_status', $array );
        redirect( $url );
    }
    
    protected function _template_app( $view, $dados = array(), $tipo = 1 )
    {
        $dados['_msg_status'] = NULL;
        if( $this->session->flashdata('msg_status') != '' )
            $dados['_msg_status'] = $this->session->flashdata('msg_status');

        $dados['_breadcrumb']       = (isset($dados['_breadcrumb'])) ? $dados['_breadcrumb'] : '';
        $dados['_controller']       = $this->_controller;
        $dados['_modulo']           = $this->_modulo;

        if( $tipo == 1 )
        {
            $this->load->view( MODULO_APP . 'topo', $dados );
            $this->load->view( MODULO_APP . $view, $dados );
            $this->load->view( MODULO_APP . 'rodape', $dados );
        }
        else if( $tipo == 2 )
        {
            $this->load->view( MODULO_APP . $view, $dados );
        }
    }
}
