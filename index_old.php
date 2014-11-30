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
        1000 => 'тыс€ч',
    );
    
    public $num_names_adv = array(
        100 => 'сто',
        1000 => 'тыс€ч',
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
                    $t_num_text[] = 'тыс€ч';
                }
                if($j == 6) {
                    $t_num_text[] = 'миллион';
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