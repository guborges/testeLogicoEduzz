<?php

class M_compromissos extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function retorna_compromissos($id_compromisso = 0){
        
        $mostrar = $this->uri->segment(3);
        
        $this->db->select("
                compromissos_id, 
                date_format(compromissos_data_evento, '%d/%m/%Y') as compromissos_data_evento, 
                date_format(compromissos_hora_evento, '%H:%i:%s') as compromissos_hora_evento, 
                compromissos_numero,
                compromissos_unidade,
                compromissos_descricao
                ");
        
        $this->db->order_by('compromissos_data_evento', 'desc');
        
        if($mostrar != 'all')
        $this->db->where("now() <= concat(compromissos_data_evento, concat(' ', compromissos_hora_evento))");
        
        if($id_compromisso > 0){
            $this->db->where('compromissos_id', $id_compromisso);
        }
        $query = $this->db->get('compromissos');
        
        return $query;
    }
    
    public function salvar_compromisso(){
        $id_compromisso = $this->input->post("id_compromisso");
        
        list($dia, $mes, $ano) = explode("/", $this->input->post("data_compromisso"));
        
        $data_mysql = $ano."-".$mes."-".$dia;
        $hora_evento = $this->input->post("hora_compromisso_hora");
        $minuto_evento = $this->input->post("hora_compromisso_minuto");
        $hora_mysql = $hora_evento.":".$minuto_evento.":00";
        
        $dados = array(
                        
                    "compromissos_data_evento" => $data_mysql,
                    "compromissos_hora_evento" => $hora_mysql,
                    "compromissos_descricao" => $this->input->post("descricao_compromisso"),
                    "compromissos_numero" => $this->input->post("compromissos_numero"),
                    "compromissos_unidade" => $this->input->post("compromissos_unidade")
            
        );
        
        if($id_compromisso <= 0){
            if($this->db->insert("compromissos", $dados)){
                return true;
            } else {
                return false;
            }
        }else{
            $this->db->where("compromissos_id", $id_compromisso);
            if($this->db->update("compromissos", $dados)){
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function excluir_compromisso($id_compromisso){
        
        if($this->db->where('compromissos_id', $id_compromisso)->delete('compromissos')){
            return true;
        }else{
            return false;
        }
    }
    
    public function retorna_compromissos_cron(){
        
        /*
        $query = "
        
        SELECT 
        compromissos_id, 
        compromissos_descricao,
        date_format(compromissos_data_evento, '%d/%m/%Y') as compromissos_data_evento,
        date_format(compromissos_hora_evento, '%d/%m/%Y') as compromissos_hora_evento,
        compromissos_data_evento as data_evento_original,
        compromissos_hora_evento as hora_evento_original,
        compromissos_numero,
        compromissos_unidade,
        FROM
        compromissos
        WHERE 
        (CONCAT(COMPROMISSOS_DATA_EVENTO, CONCAT(' ', COMPROMISSOS_HORA_EVENTO))) =
            CASE COMPROMISSOS_UNIDADE
                WHEN 'minutos' THEN (date_add(now(), INTERVAL COMPROMISSOS_NUMERO_MINUTE)
                WHEN 'horas' THEN (DATE_ADD(NOW(), INTERVAL COMPROMISSOS_NUMERO_HOUR)
                WHEN 'dias' THEN (DATE_ADD(NOW(), INTERVAL COMPROMISSOS_NUMERO_DAY))
            END
            "; 
         */
            
        $query .= "ORDER BY compromissos_data_evento desc";
                    
        $consulta = $this->db->query($query);
        
        return $consulta;
        }
}
