<?
require ('db.php');
require ('phpmailer/PHPMailerAutoload.php');

Class ShopUnit
{
    public $name;
    public $price;
    public $availability;

    protected function __construct($name,$price,$availability)
    {
        $this->name = $name;
        $this->price = $price;
        $this->availability = $availability;
    }
    protected function addUnit()
    {
        global $db;
        $prepare = $db->prepare('INSERT INTO shopUnit (name , price , availability) VALUES (?,?,?)');
        $exec = $prepare->execute([$this->name,$this->price,$this->availability]);
        return $exec;
    }

    public static function getUnits()
    {
        global $db;
        $query = $db->query(" SELECT * FROM shopUnit");
        return $query;
    }
    public static function addUnitToBasket()
    {
        session_start();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $arr = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];
        $_SESSION['units'][] = $arr;
    }

    public static function removeUnitToBasket()
    {
        session_start();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $arr = [
            'id' => $id,
            'name' => $name,
            'price' => $price
        ];
        for ($i = 0; $i < count($_SESSION['units']); $i++){
            if( $_SESSION['units'][$i]['name'] == $arr['name'] &&
                $_SESSION['units'][$i]['price'] == $arr['price'] &&
                $_SESSION['units'][$i]['id'] == $arr['id']){
                unset($_SESSION['units'][$i]);
                sort($_SESSION['units']);
                break;
            }
        }
    }

    public static function checkBasket()
    {
        session_start();
        echo count($_SESSION['units']);
    }
    public static function removeAllUnits()
    {
        session_start();
        unset($_SESSION['units']);
    }

    public static function order()
    {
        global $db;

        $orders = $_POST['order'];
        $price;
        $names = "";
        foreach($orders as $order => $value){
            $price = $price + $value['price'];
            $names = $names . " " . $value['name'];
        }
        $arr = [
            $names,
            $price
            ];
        return $arr;


    }
}