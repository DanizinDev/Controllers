<?php

namespace App\Controller;

use App\Model\Model;

class LocalizacaoController {
    private $db;
    private $localizacao;

    public function __construct($localizacao) {
        $this->db = new Model();
        $this->localizacao =  $localizacao;
    }

    public function getLocalizacaoList() {
        $localizacaoList = $this->db->select('localizacao');
        return $localizacaoList;
    }

    public function getLocalizacaoById($id) {
        $localizacao = $this->db->select('localizacao', ['id_localizacao' => $id]);
        return $localizacao;
    }

    public function createLocalizacao($dado) {
        $this->localizacao->setPais($dado['Pais']);
        $this->localizacao->setCidade($dado['Cidade']);
        $this->localizacao->setEstado($dado['Estado']);
        $this->localizacao->setCEP($dado['CEP']);
        $this->localizacao->setBairro($dado['Bairro']);
        $this->localizacao->setRua($dado['Rua']);
        $this->localizacao->setIP($dado['IP']);
        $this->localizacao->setCriador($dado['Criador']);
        $this->localizacao->setIdUsuario($dado['id_usuario']);

        if ($this->db->insert('localizacao', [
            'Pais' => $this->localizacao->getPais(),
            'Cidade' => $this->localizacao->getCidade(),
            'Estado' => $this->localizacao->getEstado(),
            'CEP' => $this->localizacao->getCEP(),
            'Bairro' => $this->localizacao->getBairro(),
            'Rua' => $this->localizacao->getRua(),
            'IP' => $this->localizacao->getIP(),
            'Criador' => $this->localizacao->getCriador(),
            'id_usuario' => $this->localizacao->getIdUsuario(),
        ])) {
            return true;
        } else {
            return false;
        }
    }

    public function updateLocalizacao($dadosNovos, $id) {
        if ($this->db->update('localizacao', $dadosNovos, ['id_localizacao' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteLocalizacao($id) {
        if ($this->db->delete('localizacao', ['id_localizacao' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}