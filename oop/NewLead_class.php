<?php

class NewLead {


    public $answer;// Флаг удачной загрузки лида в DB
    private $data;// Обезвреженные данные из _REQEST
    private $error = [];// Массив ошибок

    public function __construct($data){
        $this->answer = 'none';
        $this->data = $this->xss($data); 
        $this->check();
        if(count($this->error) == 0){
            $this->addNewLead();
            $this->answer = 'Ok';
        }
        else $this->answer = 'none';
    }
// доступ из вне массив ошибок
    public function getError(){
        return $this->error;
    }
// доступ из вне массива данных
    public function getData(){
        return $this->data;
    }
// отправка лида в базу данных
    private function addNewLead(){
        return true;
    }
// проверка данных не корректность
    private function check(){
        if(isset($this->data['name'])) $this->checkName();
        if(isset($this->data['phone'])) $this->checkPhone();
        if(isset($this->data['email'])) $this->checkEmail();
    }
// проверка имени лида на корректность
    protected function 	checkName(){
        $len = mb_strlen($this->data['name']);
        if($len == 0)
            $this->error['name'] = 'Пустая строка, вы не заполнили Имя';
        elseif( $len < 3 or $len > 64)
            $this->error['name'] = 'Имя слишком короткое или длинное';
        else
            if(!preg_match("/^[a-zа-я][\sa-zа-я]+$/ius",$this->data['name']))
            $this->error['name'] = 'Имя имеет лишние символы.';
        if(isset($this->error['name']) && $this->error['name'] != '') $this->answer = 'none';
    }
// проверка номера телефона
    protected function 	checkPhone(){
        $ar = ['+',' ','(',')','-'];
        $newNumber = str_replace($ar,'', $this->data['phone']);
        $len = mb_strlen($newNumber);
        if(!($len == 11 || $len == 10 || $len == 7))
            $this->error['phone'] = 'Номер телефона слишком длинный или короткий';
        else
            if(!preg_match('/^\d{6,11}$/xs',$newNumber))
            $this->error['phone'] = 'Номер телефона имеет лишние символы.';
        if(isset($this->error['phone']) && $this->error['phone'] != '') $this->answer = 'none';
        else $this->data['phone'] = $newNumber;
    }
// проверка почты на корректность
    protected function 	checkEmail(){
        $len = mb_strlen($this->data['email']);
        if($len == 0)
            $this->error['email'] = 'Пустая строка, вы не заполнили e-mail';
        elseif( $len < 5 or $len > 64)
            $this->error['email'] = 'e-mail слишком короткий или длинный';
        else
            if(!preg_match('#^[a-z]?([\.a-z0-9\-]*[a-z0-9]@[a-z0-9]?([\.a-z0-9]*)?[a-z]?$)#i',$this->data['email']))
            $this->error['email'] = 'Не корректный e-mail.';
        if(isset($this->error['email']) && $this->error['email'] != '') $this->answer = 'none';
    }
// функция преобразования специальных символов в HTML-сущности
    protected function 	xss($data){
		if(is_array($data)){
			$escaped = array();
			foreach($data as $key => $value){
				$escaped[$key] = $this->xss($value);
			}
			return $escaped;
		}
		return htmlspecialchars($data);
	}

}

?>