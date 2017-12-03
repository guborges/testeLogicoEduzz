<?php

class M_usuarios extends CI_Model {
    
    function __construct(){
        parent::__construct();
    }
    
    function retorna_usuarios($id_usuario = 0){
        
        $this->db->order_by('nome', 'asc');
        
        if($id_usuario != 0){
            $this->db->where("id", $id_usuario);
        }
        
        return $this->db->get('usuario');
    }
    
    function verifica_senha(){
        
        $senha_antiga = md5($this->input->post('senha_antiga'));
        $consulta = $this->db->get_where("usuarios", array("senha"=>$senha_antiga));
        
        if($consulta->num_rows() > 0){
            return $true;
        }else{
            return false;
        }
    }
    
    function salvar_dados_usuario(){
        
        $id_usuario = $this->input->post("id_usuario");
        
        if(empty($senha)){
            
            $dados = array(

                'nome'=> $this->input->post("nome"),
                'email'=> $this->input->post("email")
                );
            
        }else{
            
            $dados = array(

                'nome'=> $this->input->post("nome"),
                'email'=> $this->input->post("email"),
                'senha'=> md5($this->input->post("senha"))

                );
            
        }
        
        if($id_usuario != 0){
            
            $this->db->where("id", $id_usuario);
            if($this->db->update("usuario", $dados)){
                return true;
                
            }else{
                
                return false;
                
            }
        }else {
            if($this->db->insert("usuario", $dados)){
                return true;
            } else {
                return false;
            }
        }
    }
}