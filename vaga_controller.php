namespace App\Controller;

use App\Model\Model;
use App\Model\Vaga;

class VagasController {
    private $db;
    private $vaga;

    public function __construct() {
        $this->db = new Model();
        $this->vaga = new Vaga();
    }

    public function getVagaList() {
        $vagaList = $this->db->select('vaga');
        return $vagaList;
    }

    public function getVagaById($id) {
        $vaga = $this->db->select('vaga', ['id_vagas_emprego' => $id]);
        return $vaga;
    }

    public function createVaga($dado) {
        $this->vaga->setServico($dado['servico']);
        $this->vaga->setDetalhes($dado['detalhes']);
        $this->vaga->setQuantidadeDeVagas($dado['quantidade_de_vagas']);
        $this->vaga->setIP($dado['IP']);
        $this->vaga->setCriador($dado['Criador']);
        $this->vaga->setIdUsuario($dado['id_usuario']);

        if ($this->db->insert('vaga', [
            'servico' => $this->vaga->getServico(),
            'detalhes' => $this->vaga->getDetalhes(),
            'quantidade_de_vagas' => $this->vaga->getQuantidadeDeVagas(),
            'IP' => $this->vaga->getIP(),
            'Criador' => $this->vaga->getCriador(),
            'id_usuario' => $this->vaga->getIdUsuario(),
        ])) {
            return true;
        } else {
            return false;
        }
    }

    public function updateVaga($dadosNovos, $id) {
        if ($this->db->update('vaga', $dadosNovos, ['id_vagas_emprego' => $id])) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteVaga($id) {
        if ($this->db->delete('vaga', ['id_vagas_emprego' => $id])) {
            return true;
        } else {
            return false;
        }
    }
}
