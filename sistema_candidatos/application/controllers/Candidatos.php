<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidatos extends CI_Controller {
    
    public function index(){
        
        
        $dados['nome_view'] = "v_candidatos";
        $dados['consulta'] = $this->m_candidatos->retorna_candidatos();//retorna todos os candidatos cadastrados
        $dados['chave'] = md5(uniqid(rand(), true));
        $this->load->view('v_layout', $dados);
    }
    
    public function novo_candidato(){
        
        $dados['nome_view'] = "v_formulario_candidatos";
        $dados['chave'] = md5(uniqid(rand(), true));
        $dados['funcao'] = "insert";
        $this->load->view('v_layout', $dados);
    }
    
    public function editar_candidato($id_candidato){
        
        $consulta = $this->m_candidatos->retorna_candidatos($id_candidato)->row();
        $consulta_emails = $this->m_candidatos->retorna_emails_candidatos_by_chave($consulta->candidatos_id);
        $consulta_telefones = $this->m_candidatos->retorna_telefones_candidatos_by_chave($consulta->candidatos_id);
        
        $dados['nome_view'] = 'v_formulario_candidatos';
        $dados['consulta'] = $consulta;
        $dados['tabela_email'] = $this->monta_tabela_emails($consulta_emails);
        $dados['tabela_telefone'] = $this->monta_tabela_telefones($consulta_telefones);       
        $dados['funcao'] = "update";
        $this->load->view('v_layout',$dados);
        
    }
    
    
    public function salvar_telefone_candidato(){
        
        if($this->m_candidatos->salvar_telefone_candidato()){
        $consulta = $this->m_candidatos->retorna_telefones_candidatos_by_chave();
            echo $this->monta_tabela_telefones($consulta);
            
        }else{
            echo 0;
        }
    }
    
    public function salvar_dados_candidato(){
               
        $query = $this->m_candidatos->salvar_dados_candidato();
        
            if($query){
                echo '<div class="alert alert-success" role="alert">Dados salvos com sucesso!</div>';
                echo "<a href='". base_url() ."'>Pagina Inicial</a> <br>";
                echo "<a href='". base_url('candidatos/') ."'>Novo candidato</a>";
            }else{
                echo '<div class="alert alert-danger" role="alert">Erro ao salvar candidato!</div>';
                echo "<a href='". base_url() ."'>Pagina Inicial</a><br>";
                echo "<a href='". base_url('candidatos/') ."'>Novo candidato</a>";
            }
        
    }
    
    public function salvar_email_candidatos(){
                
        if($this->m_candidatos->salvar_email_candidato()){
            $consulta = $this->m_candidatos->retorna_emails_candidatos_by_chave();
            echo $this->monta_tabela_emails($consulta);
        }else{
            echo 0;
        }
    }
    
    public function monta_tabela_telefones($consulta){
        
       
            $retorno = "<table>";
            foreach($consulta->result() as $linha){
                $retorno .= "<tr>";
                $retorno .= "<td>".$linha->telefones_telefone."</td>";
                $retorno .= "<td><a href='javascript:;' onclick='excluir_telefone($linha->telefones_id)'>Excluir</a></td>";
                $retorno .= "</tr>";
            }
            
            $retorno .= "</table>";
            
            return $retorno;
    }
    
    public function monta_tabela_emails($consulta){
        
        $retorno = "<table>";
            foreach($consulta->result() as $linha){
                $retorno .= "<tr>";
                $retorno .= "<td>".$linha->emails_email."</td>";
                $retorno .= "<td><a href='javascript:;' onclick='excluir_email($linha->emails_id)'>Excluir</a></td>";
                $retorno .= "</tr>";
            }
            
            $retorno .= "</table>";
            
            return $retorno;
    }
    public function excluir_telefone(){
        
        $id_telefone = $this->input->post("id_telefone");
        
        if($this->db->where("telefones_id", $id_telefone)->delete('telefones')){
            $consulta = $this->m_candidatos->retorna_telefones_candidatos_by_chave();
            echo $this->monta_tabela_telefones($consulta);
        }
               
        
    }
    
    public function excluir_email(){
        
        $id_email = $this->input->post("id_email");
        
        if($this->db->where("emails_id", $id_email)->delete('emails')){
            $consulta = $this->m_candidatos->retorna_emails_candidatos_by_chave();
            echo $this->monta_tabela_emails($consulta);
        }
               
        
    }
    
    public function teste(){
        
        $dados['nome_view'] = "v_mensagempadrao";
        
        $dados['tipoMensagem'] = "alert-success";
        $dados['mensagem'] = "Seu cadastro foi feito com sucesso";
        $dados['link'] = array(
            "<a href='". base_url() ."'>Pagina Inicial</a>",
            "<a href='". base_url('candidatos/') ."'>Novo candidato</a>",
        );
        
        $this->load->view('v_layout', $dados);
        
    }
    
    public function autocomplete(){
        
        $termo = $this->input->get('term');
        $this->load->model('m_candidatos');
        $consulta = $this->m_candidatos->autocomplete($termo);
        
        $retorno = array();
        
        foreach($consulta->result() as $linha){
            $retorno[] = $linha->candidatos_nome;
        }
        
        echo json_encode($retorno);
    }

}