<?php
class Bracket{
    public function validator($string){
        $len = strlen($string);
            $stack = array();
            for ($i = 0; $i < $len; $i++) {
                switch ($string[$i]) {
                    case '(': array_push($stack, 0); break;
                    case ')': 
                        if (array_pop($stack) !== 0)
                            return false;
                    break;
                    case '[': array_push($stack, 1); break;
                    case ']': 
                        if (array_pop($stack) !== 1)
                            return false;
                    break;
                    case '{': array_push($stack, 1); break;
                    case '}': 
                        if (array_pop($stack) !== 1)
                            return false;
                    break;
                    default: break;
                }
            }
            return (empty($stack));
    }
}

$data = "[[{[[<{{{{[[[<[{[[<{{{{[{[{[[[<<{<{[{<<<[[<[{[<{{[
    {[<[[<<[{<<[[[{<[{[[{{<<>[<<{{<<{[[[<{}{[{{{[[{{[[<[{}]
    >]]}}]]}}}]}>]]]}>>}}>>]>}}]]}]>}]]]>>}]>>]]>]}]}}>]}]>
    ]]>>>}]}>}>>]]]}]}]}}}}>]]}]>]]]}}}}>]]}]]";
$bracket = new Bracket;

echo json_encode($bracket::validator($data));

?>