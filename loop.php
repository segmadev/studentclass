<?php
$persons = ["John", "Doe", "Jane", "Smith"];
echo '<table border="1" cellpadding="8" cellspacing="0">';
echo '<thead><tr><th>#</th><th>Name</th><th>Actions</th></tr></thead><tbody>';
foreach ($persons as $key => $person) {
    $id = $key + 1;
    $name = $person;
    $editUrl = '?action=edit&id=' . $id;
    $deleteUrl = '?action=delete&id=' . $id;
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>".$name."</td>";
    echo "<td><a href=\"{$editUrl}\">Edit</a> | <a href=\"{$deleteUrl}\" onclick=\"return confirm('Are you sure you want to delete #{$id}?');\">Delete</a></td>";
    echo "</tr>";
}
echo '</tbody></table>';

// more data section
$data = [

];

?>