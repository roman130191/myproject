<?

class Test {
    
    public $number;
    public $num_len;
    
    public $num_names = array(
        0 => 'ноль',
        1 => 'один',
        2 => 'два',
        3 => 'три',
        4 => 'четыре',
        5 => 'п€ть',
        6 => 'шесть',
        7 => 'семь',
        8 => 'восемь',
        9 => 'дев€ть',
        10 => 'дес€ть',
        11 => 'одиннадцать',
        12 => 'двенадцать',
        13 => 'тринадцать',
        14 => 'четырнадцать',
        15 => 'п€тнадцать',
        16 => 'шестнадцать',
        17 => 'семнадцать',
        18 => 'восемнадцать',
        19 => 'дев€тнадцать',
        20 => 'двадцать',
        30 => 'тридцать',
        40 => 'сорок',
        50 => 'п€тьдес€т',
        60 => 'шестьдес€т',
        70 => 'семьдес€т',
        80 => 'восемьдес€т',
        90 => 'дев€носто',
        100 => 'сто',
        200 => 'двести',
        300 => 'триста',
        400 => 'четыреста',
        500 => 'п€тьсот',
        600 => 'шестьсот',
        700 => 'семьсот',
        800 => 'восемьсот',
        900 => 'дев€тьсот',
        1000 => 'тыс€ча',
        1000000 => 'миллион'
    );
    
    public $num_names_adv = array(
        1 => 'одна',
        2 => 'две'
    );

    public function Translate($data) {
        $this -> number = $data;
        $this -> num_len = strlen($this -> number);        
        if($this -> num_len > 9)
            echo '„исло не может быть переведено!!!<br/>';
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
                        $t_num_text[] = 'тыс€ча';
                    elseif($v > 1 && $v < 5)
                        $t_num_text[] = 'тыс€чи';
                    elseif(substr($this -> number, -6, 3) > 0) {
                        $t_num_text[] = 'тыс€ч';                        
                    }
                }
                if($j == 6) {
                    if($v == 1)
                        $t_num_text[] = 'миллион';
                    elseif($v > 1 && $v < 5)
                        $t_num_text[] = 'миллиона';
                    else
                        $t_num_text[] = 'миллионов';
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
echo 'ќт 0 до миллиона <br/>';
for($i=0; $i < 5; $i++) {
    $a -> Translate(mt_rand(0, 999999));
    echo '<br/>';
}

echo 'ќт миллиона до миллиарда <br/>';
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