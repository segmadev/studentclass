<?php
$persons = ["John", "Doe", "Jane", "Smith"];
$student = ["name"=>"Segma", "age"=>20, "grade"=>"A"];
$students = [
    ["name" => "Alice", "age" => 20, "grade" => "A", "courses" => ["Math", "Science"]],
    ["name" => "Bob", "age" => 22, "grade" => "B"],
    ["name" => "Charlie", "age" => 23, "grade" => "C"],
];
echo $students[0]['name'];
echo "<br>";
// echo var_dump($students[2]);
echo "<br>";
echo $students[0]['courses'][1];
echo "<br>";
echo "<hr>";
$students[0]['age'] = $students[0]['age'] + 1;
$students[1]['name'] = "Funke";
$students[1]['courses'] = ["History", "Geography"];
$students[] = ["name" => "David", "age" => 24, "grade" => "B", "courses" => ["Art", "Music"]];
foreach ($students as $key => $student) {
    echo "ID: ". $key + 1 . "<br>";
    echo "Name: ". $student['name']. "<br>";
    echo "Name: ". $student['age']. "<br>";
    echo "Name: ". $student['grade']. "<br>";
    if(isset($student['courses'])) {
        echo "Courses: ". var_dump($student['courses']). "<br>";
    }
    echo "<hr>";
}

?>