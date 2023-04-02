<?php
/*
######
###### PHP 8.0
###### Класс для парсига XML файла для Тестового задания 2 А25: XSLT-трансформация
###### 
*/
class ParsXML{

    private $data;
    private $users;
    private $departments;
    private $hours;

    public function __construct($link){
        try{
            $this->data = file_get_contents($link);
            $this->getUsers();
            $this->getHours();
            $this->getDepartments();
        }catch(Exception $e){
            echo $e->getMessage();
            die();
        }

    }

    private function getUsers(){
        $ar_id = $this->getContent('#<user id="(\d*)" department="(\d*)">#im');
        $ar_name = $this->getContent('#<name>(.*)</name>#im');
        $ar_phone = $this->getContent('#<phone>(.*)</phone>#im');
        $ar_email = $this->getContent('#<email>(.*)</email>#im');
        $users = [];
        for ($i = 0; $i < count($ar_id[1]); $i++)
            $this->users[$ar_id[1][$i]] = [
                'department' => $ar_id[2][$i],
                'name' => $ar_name[1][$i],
                'phone' => $ar_phone[1][$i],
                'email' => $ar_email[1][$i]
            ];
        
    }

    private function getHours(){
        $hours = $this->getContent('#<hour user="(\d*)" hours="(\d*)" />#im');
        for($i = 0; $i < count($hours[0]); $i++){
            $this->hours[$i] = [
                $hours[1][$i] => $hours[2][$i]
            ];
        }
    }

    private function getSumHours(){
        $result = [];
        for ($i=0; $i < count($this->hours); $i++) { 
            foreach ($this->hours[$i] as $key => $value) {
                if(!isset($result[$key])) $result[$key] = 0;
                $result[$key] += $value;
            }
        }
        return $result;
    }

    private function getDepartments(){
        $departments = $this->getContent('#<department id="(\d*)" name="(.*)"/>#im');
        for ($i = 0; $i < count($departments[0]); $i++)
            $this->departments[$departments[1][$i]] = $departments[2][$i];
    }

    private function getContent($preg){
        preg_match_all($preg,$this->data,$result);
        return $result;
    }

    public function __toString(){
        $sum = $this->getSumHours();
        $string = '
    <div class="div-table">'."\n";
        foreach ($this->departments as $key => $value) {
            $string .= '        <div class="div-table-row">
            <div  class="div-table-col" style = "width: calc(100% - 2px)">'.$value.'</div>
        </div>'."\n";
            foreach ($this->users as $k => $val) {
                if($val['department'] == $key){
//                    for($i = 0; count($this->hours); $i++)
//                        $sum += $this->hours[$i][$k]??0;
                    $string .= '        <div class="div-table-row">
            <div class="div-table-col num">'.$k.'</div>
            <div  class="div-table-col name">'.$val['name'].'</div>
            <div  class="div-table-col phone">'.$val['phone'].'</div>
            <div  class="div-table-col mail">'.$val['email'].'</div>
            <div  class="div-table-col hours">'.($sum[$k]??0).'</div>
        </div>';
                }
            }
        }
        return $string.'
        </div>';
    }

}

?>