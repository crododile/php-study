PHP Assessment Test

Q1 (Good Ole FizzBuzz)
Write a program which prints the numbers from 1 to 777, each on a new line.
For multiples of 4, print “Fizz” instead of the number.
For multiples of 7, print “Buzz” instead of the number.
For multiples of both, print “FizzBuzz”.

Sample Output:
1
2
3
Fizz
5
6
Buzz
Fizz
9
10
11
Fizz
13
Buzz
15

Example:
Positions 4,8,12,16,20 would contain “Fizz” because they are multiples of 4.
Positions 7,14,21,35 would contain “Buzz” because they are multiples of 7.
Positions 28,56,84,112 would contain “FizzBuzz” because they are multiples of both.

<?php
function fizzBuzz($i){
	for($n = 1; $n <= $i; $n++){
		$flag = 1;
		if( $n%4 == 0 ){
			echo "Fizz";
			$flag = 0;
		}
		if( $n%7 == 0){
			echo "Buzz";
			$flag = 0;
		}
		if ($flag == 1){
			echo $n;
		}
		echo "\n";
	}
}

fizzBuzz(777);
?>

Q2
Explain what MVC is in the context of PHP Frameworks.

M is for Model. In Laravel ( my favorite PHP framework ) the model is where you
put concrete classes that represesent the entities that your app operates on. 
If the app is database driven, a model will often represent a type of entity in
the database and contain methods for querying the database for an appropriate
entry.

V is for View. The View takes the data that has been constructed by your model 
and processes it in a way that the browser will understand ( compiling HTML ). 
In laravel the view logic will sometimes reside in the view template, though
the primary purpose of the view is to render the content, and hopefully the
real logic can be put into the Model class.

C is for Controller. The controller receives commands from the router and will
perform a little logic, often involving instantiating a model, having the model
perform a little work on itself, and passing that model off to a view which will
tell the user about the model ( or models ).

With no letter is the router, which receives the HTTP requests and channels them
to the controller.


Q3
Create a function called displayContent that will give a textual representation of the contents of the data type using recursion.  The function will need to be used in the following code:

<?php
function displayContentHelper($data){
	$args = func_get_args();
	forEach($args as $arg){
		if (is_array($arg) == 1) {
			forEach($arg as $ar){
				displayContentHelper($ar);
			}
		} elseif ($arg == NULL) {
			echo "null\n";
		} elseif (is_object($arg)) {
			$obj_vars = get_object_vars($arg);
			forEach($obj_vars as $var){
				displayContentHelper($var);
			}
		} else {
			echo $arg;
			echo "\n";
		}
	}
}

function displayContent($data){
	ob_start();
	displayContentHelper($data);
	$contents = ob_get_contents();
	ob_end_clean();
	return $contents;
}


echo displayContent("I'm just a string.");
echo displayContent([45,120,32,98]);
echo displayContent(
	[
		['string1','string2','string3'],
		"test"
	]
);
echo displayContent(NULL);
echo displayContent(new TestClass);

class TestClass{
	public $v1 = "test data";
	public $v2 = 2;
	public $v3 = [5,6,7];
}
?>

Output:
I'm just a string.
45
120
32
98
string1
string2
string3
test
null
test data
2
5
6
7

Q4
Explain the differences between Abstract Classes, Interfaces, and Traits.

An abstract class is an organization of code like an ordinary class, except
that it cannot be instantiated. An abstract class exists to abstract out
functionality that is used in (presumably) more than one concrete class. The
methods and such are included into the concrete class when the concrete class
is defined and it "extends" the abstract class. The code within the abstract
class is then available to the concrete class.

An Interface is similar in that it abstracts away functionality that will be
useful to more than one class by showing a list of method names that the
implementing class is obligated to respond to. When defining an interface the
actual functionality of the methods will not be written, only the method names.
A class "implements" an interface and is then obligated to create the methods
on the class.

A trait is a chunk of code that can be incorporated into multiple classes with
the keyword "use" followed by the trait name. A trait is kind of an
intersection between abstract classes and Interfaces. It provides the methods
than an interface requires, and it also provides their implementation as an
abstract class does. The main difference with abstract classes is that PHP has
single inheritance so that a class can only extend a single other class, but it
can incorporate whatever traits it pleases ( with attention paid to overlap of
method names ). 