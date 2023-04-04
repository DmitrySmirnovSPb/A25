<?php

class Ajax extends NewLead{
    public function __construct($data){
        $this->answer = 'none';
        $this->data = $this->xss($data); 
        $this->check();
        if(count($this->error) == 0){
            $this->addMessage();
            $this->answer = 'Ok';
        }
        else $this->answer = 'none';
    }
    protected  function check(){
        if(isset($this->data['name'])) $this->checkName();
        if(isset($this->data['phone'])) $this->checkPhone();
        if(isset($this->data['email'])) $this->checkEmail();
        if(isset($this->data['message'])) $this->checkMessage();
    }

    protected function checkMessage(){
        if(mb_strlen($this->data['message']) == 0)
            $this->error['message'] = 'Пустая строка, вы не задали вопрос.';
    }
// Добавляет в DB сообщение
    private function addMessage(){
        return true;
    }
}

?>