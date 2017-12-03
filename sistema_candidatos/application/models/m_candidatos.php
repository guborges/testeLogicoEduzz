<?php

class M_candidatos extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function retorna_candidatos($id_candidatos = 0){
        $this->db->select("
            candidatos_id,
            candidatos_nome,
            candidatos_rg,
            candidatos_cpf,
            candidatos_cep,
            candidatos_endereco,
            candidatos_cidade,
            candidatos_uf,
            candidatos_data_aniversario,
            candidatos_data_cadastro,
            candidatos_observacoes,
            candidatos_chave
            ");
        $this->db->order_by('candidatos_id', 'desc');
        
        if($id_candidatos != 0){
            $this->db->where('candidatos_id', $id_candidatos);
        }
        
        return $this->db->get('candidatos');
    }
    
    function salvar_telefone_candidato(){
        
        $dados = array(
                        'telefones_telefone' => $this->input->post('telefone'),
                        'telefones_chave' => $this->input->post('chave')
        );
        
        if($this->db->insert('telefones', $dados)){
            return true;
        }else{
            return false;
        }
    }
    
    function salvar_email_candidato(){
        
        $dados = array(
                        'emails_email' => $this->input->post('email'),
                        'emails_chave' => $this->input->post('chave')
        );
        
        if($this->db->insert('emails', $dados)){
            return true;
        }else{
            return false;
        }
    }
    
    function retorna_telefones_candidatos_by_chave($id_candidato = 0){
        
        $chave = $this->input->post('chave');
        
        if($id_candidato != 0)
            $this->db->where('telefones_id_candidato', $id_candidato);
        else
            $this->db->where('telefones_chave', $chave);
        
        $consulta = $this->db->get('telefones');
        
        return $consulta;   
        
    }
    
    function retorna_emails_candidatos_by_chave($id_candidato = 0){
        
        $chave = $this->input->post('chave');
        if($id_candidato != 0)
            $this->db->where('emails_id_candidato', $id_candidato);
        else
            $this->db->where('emails_chave', $chave);
        
        $consulta = $this->db->get('emails');
        
        return $consulta;   
        
    }
    
    public function salvar_dados_candidato(){
        
        $id_candidato = $this->input->post('id_candidato');
        
        list($dia, $mes, $ano) = explode("/", $this->input->post("candidatos_data_aniversario"));
        
        $candidatos_chave = $this->input->post("chave");
        
        $dados = array(
            
            "candidatos_nome" => $this->input->post("candidatos_nome"),
            "candidatos_rg" => $this->input->post("candidatos_rg"),
            "candidatos_cpf" => $this->input->post("candidatos_cpf"),
            "candidatos_cep" => $this->input->post("candidatos_cep"),
            "candidatos_endereco" => $this->input->post("candidatos_endereco"),
            "candidatos_cidade" => $this->input->post("candidatos_cidade"),
            "candidatos_uf" => $this->input->post("candidatos_uf"),
            "candidatos_data_aniversario" => $ano . "-" . $mes ."-". $dia,
            "candidatos_observacoes" => $this->input->post("candidatos_observacoes"),
            "candidatos_chave" => $this->input->post("chave")
        );
        
        if($id_candidato == 0){
            
            $query = $this->db->insert('candidatos', $dados);
            
            $id_candidato_inserido = $this->db->insert_id();
            
            $this->db->where("telefones_chave", $candidatos_chave)->update('telefones', array("telefones_id_candidato"=>$id_candidato_inserido));
            $this->db->where("emails_chave", $candidatos_chave)->update('emails', array("emails_id_candidato"=>$id_candidato_inserido));
            
            if($query == true){
                return true;
            }else{
                return false;
            }
            
        }elseif($id_candidato > 0){
            
            $this->db->where('candidatos_id', $id_candidato);
            
            $query = $this->db->update('candidatos', $dados);
            
            if($query == true){
                return true;
            }else{
                return false;
            }
        }
        
    }
    
    public function autocomplete($termo){
        
        $this->db->select("candidatos_nome");
        $this->db->like("candidatos_nome", $termo);
        $this->db->order_by("candidatos_nome");        
        $retorno = $this->db->get("candidatos");
        
        return $retorno;
    }
}