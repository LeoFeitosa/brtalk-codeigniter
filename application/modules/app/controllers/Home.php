<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * NOTE: Requires PHP version 5 or later
 * 
 * @author  André da Silva Severino <andre@andrewd.com.br>
 * @url     http://andrewd.com.br/
 * 
 * @date    2016-06-02 13:00
 * 
 * @version 2016-06-02 13:00
 */
class Home extends MY_Controller 
{
    function __construct()
    {
        $this->_modulo      = MODULO_APP;
        $this->_controller  = strtolower( __CLASS__ );

        parent::__construct();
    }
    
    public function index()
    {
        // Inicio - breadcrumb
        $this->load->library( 'make_bread', $this->_modulo, 'breadcrumb' );
        
        $this->breadcrumb->add( 'Página Inicial' );
        
        $dados['_breadcrumb'] = $this->breadcrumb->output();
        // Fim - breadcrumb
        
        $view = $this->_controller . '/index';
        $this->_template_app( $view, $dados );
    }
}
