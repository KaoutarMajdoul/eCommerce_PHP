<?php
/**
 * Created by PhpStorm.
 * User: rere
 * Date: 28/11/17
 * Time: 17:45
 */

class ModelGeneric
{

    public function get ($attribute)
    {
        return $this->$attribute;
    }
    
    //~ static public function getAllProduit() {
            //~ $SQL_request = " SELECT * FROM Produits";
            //~ $rep = Model::$pdo->query($SQL_request);

            //~ $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
            //~ $tab_p = $rep->fetchAll();

            //~ return $tab_p;
     //~ }
     
      //~ public static function getAllUser ($db){
        //~ $req = $db->pdo->query('SELECT * FROM Utilisateurs');
        //~ // On transforme tous les éléments en object ModelUtilisateur
		//~ //$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'ModelUtilisateur');
        //~ $users = [];
        //~ foreach ($req->fetchAll() as $data){
            //~ $user = new ModelUtilisateur(
                //~ $data['id'],
                //~ $data['nom'],
                //~ $data['prenom'],
                //~ $data['password'],
                //~ null,
                //~ $data['email'],
                //~ null,
                //~ $data['dateInscription'],
                //~ $data['adresse'],
                //~ $data['nomVille'],
                //~ $data['pays'],
                //~ $data['rang']
            //~ );
            //~ $users[] =  $user;
        //~ }
        //~ return $users;
    //~ }
    
    public static function SelectAll ($db){
		
	}
    


    public function save ()
    {
        try
        {
            $table_name = static::$object;

            $reflect = new ReflectionClass($this);
            $props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE);
            $attributes = array();
            $values = array();

            foreach ($props as $prop)
            {
                $attributes[] = $prop->getName();
                $values[$prop->getName()] = $this->get($prop->getName());
            }

            $into = '(' . join(',', $attributes) . ')';

            $values_string = '(' . join(',', array_map("my_prepend", $attributes)) . ')';



            // Faire requete sql
            // Prepare sql

            $sql = 'INSERT INTO ' . $table_name . ' ' . $into . ' ' . $values_string;



            return $req_prepare->execute($values);

        }
        catch (PDOException $e)
        {

        }
    }

    public function my_prepend ($x)
    {
        return ':' . $x;
    }

}
