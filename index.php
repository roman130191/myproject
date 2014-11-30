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
        1000 => '������',
        1000000 => '�������'
    );
    
    public $num_names_adv = array(
        1 => '����',
        2 => '���'
    );

    public function Translate($data) {
        $this -> number = $data;
        $this -> num_len = strlen($this -> number);        
        if($this -> num_len > 9)
            echo '����� �� ����� ���� ����������!!!<br/>';
        if(isset($this -> num_names[$this -> number])) {
            echo $this -> number . ' - ' . $this -> num_names[$this -> number];
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
                    if((int)$v == 1)
                        $t_num_text[] = '������';
                    elseif($v > 1 && $v < 5)
                        $t_num_text[] = '������';
                    elseif(substr($this -> number, -6, 3) > 0) {
                        $t_num_text[] = '�����';                        
                    }
                }
                if($j == 6) {
                    if($v == 1)
                        $t_num_text[] = '�������';
                    elseif($v > 1 && $v < 5)
                        $t_num_text[] = '��������';
                    else
                        $t_num_text[] = '���������';
                }
                if($v != 0) {
                    if($j == 3 && isset($this -> num_names_adv[$v]))
                        $t_num_text[] = $this -> num_names_adv[$v];
                    else
                        $t_num_text[] = $this -> num_names[$v];
                }
                $j++;
            }            
            $text_out = implode(' ', array_reverse($t_num_text));
            echo $this -> number . ' - ' . $text_out . '<br/>';
        }
    }            
}


$a = new Test();
echo '�� 0 �� �������� <br/>';
for($i=0; $i < 5; $i++) {
    $a -> Translate(mt_rand(0, 999999));
    echo '<br/>';
}

echo '�� �������� �� ��������� <br/>';
for($i=0; $i < 5; $i++) {
    $a -> Translate(mt_rand(999999, 999999999));
    echo '<br/>';
}

$a -> Translate(318);
$a -> Translate(3189);
$a -> Translate(11189);
$a -> Translate(111180);
$a -> Translate(31131);
$a -> Translate(130131);
$a -> Translate(999999999);
$a -> Translate(920920009);
$a -> Translate(100000003);
$a -> Translate(746639561);
$a -> Translate(17001011);
$a -> Translate(172001011);
$a -> Translate(72001011);
$a -> Translate(334101011);
?>