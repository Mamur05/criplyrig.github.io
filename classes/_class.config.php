<?PHP
class config{

	public $HostDB = "localhost";
	public $UserDB = "имяпользователя";
	public $PassDB = "пароль";
	public $BaseDB = "базаданных";
	
	public $SYSTEM_START_TIME = 1493841600;
	public $VAL = "RUB";
        public $VAL2 = "Руб.";
	
	# PAYEER настройки
	public $AccountNumber = 'fruitfarm';
	public $apiId = '22221';
	public $apiKey = 'fruitfarm';
	
	
	public $shopID = 12321;
	public $secretW = "fruitfarm";
	
	
    /**
     * Возвращает ID админа
     * @return [type] = INT [description] = ID Админа
     */
    public function serfIdAdmin()
    {
        return $serfIdAdmin = 126;
    }
	
	# Free-Kassa
		public $fk_merchant_id = '11111111'; //merchant_id ID 
		public $fk_merchant_key = 'sdfsdfsdgdgsd'; 
		public $fk_merchant_key2 = 'sdgsdgsdgdsg';

	
}
?>