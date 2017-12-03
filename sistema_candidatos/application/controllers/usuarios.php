<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    public function index(){
        
        $this->load->model('m_usuarios', 'usuario');
        
        $dados['usuarios'] = $this->usuario->retorna_usuarios();
        
        $dados['nome_view'] = "v_usuarios";
        $this->load->view('v_layout', $dados);
    }
    
    public function novo_usuario(){
        
        $dados['nome_view'] = "v_formulario_usuarios";
        $this->load->view('v_layout', $dados);
        
    }
    
    public function editar($id_usuario){
    
        $this->load->model('m_usuarios', 'usuario');
        
        $dados['usuario'] = $this->usuario->retorna_usuarios($id_usuario)->row();
        $dados['nome_view'] = "v_formulario_usuarios";
        $this->load->view('v_layout', $dados);
        
    }
    
    public function salvar(){
        
        $this->load->model('m_usuarios');
        $this->m_usuarios->salvar_dados_usuario();
        
        $dados['usuarios'] = $this->m_usuarios->retorna_usuarios();
        $dados['nome_view'] = "v_usuarios";
        $this->load->view('v_layout', $dados);
        
    }
    
    public function salvar_senha(){
        
        $this->load->helper('funcoes');
        
        $this->load->model("m_usuarios", "usuarios");
        
        $verifica_senha = $this->usuarios->verifica_senha();
        
        if($verifica_senha){
            
            $this->salvar(); //Salva os dados pessoais
            if($this->usuarios->salvar_dados_usuario()){
               $mensagem = "Senha alterada com sucesso"; 
               
               $this->load->view('v_layout', $mensagem);
            } else {
            echo "Erro alterar senha";
            }
            
        }
        
        
        
    }

}