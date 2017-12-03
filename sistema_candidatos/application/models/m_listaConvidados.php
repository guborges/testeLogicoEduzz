<?php

class M_listaConvidados extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function tabela_convidados(){
        
        $this->db->select("*");
        $query = $this->db->get("convidados");

        $tabela = array();

        foreach($query->result() as $linha){
            $tabela['convidados'][] = '<tr> 
                    <td>'.$linha->idConvidado.'</td>
                    <td>'.$linha->nome.'</td>
                    <td>'.$linha->familiaridade.'</td>
                </tr>';
        }

        return $tabela;
    }
    
}