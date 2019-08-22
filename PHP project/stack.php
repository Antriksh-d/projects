<?php
class Stack
{
    protected $stack;
    protected $size;

    public function __construct($size = 50) {

        //Initialize stack
        $this->stack = array();

        //Initialize stack size
        $this->size  = $size;
    }

    /**
     * Insert an element in a stack
     * @param type $data
     */
    public function push($data) {

        //Check stack overflow
        if(count($this->stack) < $this->size) {

            //Inserts an element at the beginning
            array_unshift($this->stack, $data);

        } else {

            // If stack is full then throw stack overflow exception
            throw new RuntimeException("Stack overflow");

        }
    }

    /**
     * Removes an element from a stack
     *
     */
    public function pop() {

        // If stack is empty
        if (empty($this->stack)) {

            throw new RuntimeException("Stack underflow");

        } else {

            return array_shift($this->stack);
        }
    }


}

$stack = new Stack();

$stack->push(4);
$stack->push(5);

echo $stack->pop();  // Pop 5

$stack->push(7);
$stack->push(9);
$stack->push(8);

echo $stack->pop();  // Pop 8
echo $stack->pop();  // Pop 9
?>