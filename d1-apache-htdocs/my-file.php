// Contents of my-include.php:
<?php

return 'Anything you like.';
// End file

// Includes and requires may also return a value.
$value = include 'my-include.php';

// Files are included based on the file path given or, if none is given,
// the include_path configuration directive. If the file isn't found in
// the include_path, include will finally check in the calling script's
// own directory and the current working directory before failing.
/* */

?>
