<?php

namespace Tests\Feature;

use App\Classes\BinaryTree;
use App\Classes\LinkedList;

use App\Classes\ListToTreeNode;
use App\Classes\MinMaxList;
use Tests\TestCase;

class AlgorithmsTest extends TestCase
{
    /** @test */
    public function can_reverse_int()
    {
        $num = 12345;
        $reversed = 0;

        while ($num > 0) {
            //get the remaninder
            $remainder = $num % 10;
            //pad a zero and add it to reversed so far
            $reversed = ($reversed * 10) + $remainder;
            //strip it off the original number
            $num = (int) ($num / 10);
        }
        echo $reversed;
    }

    /** @test */
    public function can_match_chars()
    {
        $word = 'Treemazing';
        $chars = 'Tree';

        $returned = $this->match_first_chars($word, $chars);
        $this->assertTrue($returned);
    }

    private function match_first_chars($word, $chars)
    {
        $first_chars = substr($word, 0, strlen($chars));

        if ($first_chars == $chars) {
            return true;
        } else {
            return false;
        }
    }

    /** @test */
    public function can_check_palindrome()
    {
        $word = 'racecar';

        $returned = $this->isPalindrome($word);

        $this->assertTrue($returned);
    }

    /** @test */
    public function can_check_not_palindrome()
    {
        $word = 'potato';

        $returned = $this->isPalindrome($word);

        $this->assertFalse($returned);
    }

    private function isPalindrome($word)
    {
        $end = strlen($word);
        $new = "";

        for($i = $end-1; $i >= 0; $i--){
            $new = $new . $word[$i];
        }

        return $new == $word;
    }

    /** @test */
    public function word_can_be_formed_from_chars()
    {
        $words = ["cat","bt","hat","tree","aaaaaaa"];
        $allowedChars = "atach";
        $passedWords = [];

        foreach ($words as $word) {
            $skipWord = false;
            $wordArray = str_split($word);
            foreach ($wordArray as $letter){
                //is the letter in the allowed chars? -- and the same count
                if (!str_contains($allowedChars, $letter ) || ( substr_count($word, $letter) > substr_count($allowedChars, $letter) ) ){
                    $skipWord = true;
                    break; //get out of here
                }
            }

            if(!$skipWord){
                $passedWords[] = $word;
            }
        }

        dd($passedWords);
    }


    /** @test */
    public function can_check_is_anagram()
    {
        $word = 'potato';
        $check = 'opotat';

        $returned = $this->isAnagram($word, $check);

        $this->assertTrue($returned);
    }

    private function isAnagram($word, $check)
    {
        if(strlen($word) != strlen($check)) {
            return false;
        }

        foreach(str_split($word) as $char){
            if(!str_contains($check, $char)){
                return false;
            }
        }

        return true;
    }


    /** @test */
    public function can_check_is_not_anagram()
    {
        $word = 'apple';
        $check = 'applz';

        $returned = $this->isAnagram($word, $check);

        $this->assertFalse($returned);
    }

    /** @test */
    public function can_check_is_not_anagram_short()
    {
        $word = 'apple';
        $check = 'app';

        $returned = $this->isAnagram($word, $check);

        $this->assertFalse($returned);
    }





    //linked list
    /** @test */
    public function can_insert_items()
    {
        $list = new LinkedList();
        $list->insertAtBeginning('one');
        $list->insertAtBeginning('two');
        $list->insertAtBeginning('three');

        $list->insertAtEnd('end');
        $list->insertAfterSpecified('afterTwo', 'two');
        $list->insertBeforeSpecified('beforeTwo', 'two');

        $list->deleteNode('one');

        $this->assertTrue(false);
    }


    /** @test */
    public function binary_tree_traverse()
    {
        $tree = new BinaryTree(10);

        $tree->insert(12);
        $tree->insert(6);
        $tree->insert(3);
        $tree->insert(8);
        $tree->insert(15);
        $tree->insert(13);
        $tree->insert(36);

        $tree->traverse($tree->root);

    }


    /** @test */
    public function can_convert_list_to_tree()
    {
        $list = [1,3,5,6,9];
        $root =$this->listToTree($list);

        dd($root);
    }


    public function listToTree($list)
    {
        if (empty($list)) {
            return null;
        }

        $mid =  (int)(count($list) /2);

        //start in the middle
        $root = new ListToTreeNode($list[$mid]);

        $root->left = $this->listToTree(array_slice($list, 0, $mid));
        $root->right = $this->listToTree(array_slice($list, $mid + 1));

        return $root;
    }

    /** @test */
    public function min_max_list_test()
    {
        $list = new MinMaxList();
        $list->append(2);
        $list->append(3);

        $max = $list->popMax();
        $min = $list->popMin();

        $this->markTestSkipped('wip');

    }

    /** @test */
    public function bubble_sort()
    {
        $arr = [5,4,3,2,1];
        $size = count($arr)-1;

        for ($outer=0; $outer<$size; $outer++) {
            $swapped = false;

            for ($inner=0; $inner<($size-$outer); $inner++) {

                $next = $inner+1;
                if ($arr[$next] < $arr[$inner]) { // if the next one is less, flip
                    $swapped = true;
                    $tmp = $arr[$inner];
                    $arr[$inner] = $arr[$next];
                    $arr[$next] = $tmp;
                }
            }
            if (!$swapped) break;
         }

        return $arr;

    }

    /** @test */
    public function two_sum()
    {
        $numbers = [3, 5, 2, -4, 8, 11];
        $answer = 7;

        $results = [];

        for($outer = 0; $outer < count($numbers); $outer++ ){
            for($inner = $outer + 1; $inner < count($numbers); $inner++ ){

                if($numbers[$outer] + $numbers[$inner] === $answer){
                    $results[] = [$numbers[$outer], $numbers[$inner]];
                }
            }
        }

        dd($results);

    }



































}
