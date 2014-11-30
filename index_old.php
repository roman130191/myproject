<?

class Test {
    
    public $number;
    public $num_len;
    
    public $num_names = array(
        0 => '����',
        1 => '����',
        2 => '���',
        3 => '���',
        4 => '������',
        5 => '����',
        6 => '�����',
        7 => '����',
        8 => '������',
        9 => '������',
        10 => '������',
        11 => '�����������',
        12 => '����������',
        13 => '����������',
        14 => '������������',
        15 => '����������',
        16 => '�����������',
        17 => '����������',
        18 => '������������',
        19 => '������������',
        20 => '��������',
        30 => '��������',
        40 => '�����',
        50 => '���������',
        60 => '����������',
        70 => '���������',
        80 => '�����������',
        90 => '���������',
        100 => '���',
        200 => '������',
        300 => '������',
        400 => '���������',
        500 => '�������',
        600 => '��������',
        700 => '�������',
        800 => '���������',
        900 => '���������',
        1000 => '�����',
    );
    
    public $num_names_adv = array(
        100 => '���',
        1000 => '�����',
    );
    
//    public function __construct($data) {

//    }
    
    public function Translate($data) {
        $this -> number = $data;
        $this -> num_len = strlen($this -> number);        
        if(isset($this -> num_names[$this -> number])) {
            echo $this -> num_names[$this -> number];
        }
        else {
            $t_num = str_split($this -> number);
            $t_num_r = array_reverse($t_num);
            $t_num_adv = array();
            $t_num_text = array();
            $i = 0;
            $ind=0;
            foreach($t_num_r as $key => $val) {
                if($i > 2)
                    $i = 0;
                if($i == 1 && $val == 1 && isset($this -> num_names[$val.$t_num_r[$key-1]])) {
                    $t_num_adv[$ind-1] = $val.$t_num_r[$key-1];
                    $t_num_adv[$ind] = 'metka';
                }
                else
                    $t_num_adv[$ind] = $val . str_repeat('0', $i);

                $i++;
                $ind++;
            }
            $j = 0;            
            foreach($t_num_adv as $v) {
                if($j == 3) {
                    $t_num_text[] = '�����';
                }
                if($j == 6) {
                    $t_num_text[] = '�������';
                }
                if($v != 0)
                    $t_num_text[] = $this -> num_names[$v];
                $j++;
            }
            $text_out = implode(' ', array_reverse($t_num_text));
            echo $this -> number . ' - ' . $text_out;
        }
//        exit; 
    }
    
    
    
}


$a = new Test();
for($i=0; $i < 10; $i++) {
    $a -> Translate(mt_rand(0, 999999));
    echo '<br/>';
}
?>