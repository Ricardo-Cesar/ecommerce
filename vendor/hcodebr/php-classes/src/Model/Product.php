<?Php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Products extends Model{

	
	public static function listAll(){

		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");

	}

	public function save(){

		$sql =  new Sql();
		$results = $sql->select("CALL sp_products_save(:idproduct, :desproduct, :vlprice, :vlwidth, :vlheigth, :vllength, :vlweigth, :desurl)", array(
			":idproduct"=>$this->getidproduct(),
			":desproduct"=>$this->getdesproduct(),
			":vlprice"=>$this->getvlprice(),
			":vlwidth"=>$this->getvlwidth(),
			":vlheigth"=>$this->getvlheigth(),
			":vllength"=>$this->getvllength(),
			":vlweigth"=>$this->getvlweigth(),
			":desurl"=>$this->getdesurl()
		));

		$this->setData($results[0]);

	}

	Public function get($idcategory){

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", array(
			":idproduct"=>$idproduct
		));

		$this->setData($results[0]);
	}

	public function delete(){

		$sql = new Sql();
		$sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", array(
			":idproduct"=>$this->getidproduct()
		));

	}


}
?>