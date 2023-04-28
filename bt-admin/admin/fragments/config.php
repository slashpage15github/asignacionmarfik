<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tmpmarser');

// Los directorios a continuación deben existir y son relativos al directorio público del servidor web; no del sistema de archivos. Se debe incluir la diagonal final.
define('UPLOADS_DIR', '/uploads/');
define('THUMBNAILS_DIR', '/uploads-thumbnails/');

define('MAX_IMAGE_SIZE', intval(4 * 1024 * 1024)); // En bytes.
define('MAX_LENGTH_TITLE', 100);
define('MAX_LENGTH_DESCRIPTION', 500);
$valid_mime_types = array('image/jpeg', 'image/png');
$valid_extensions = array('jpg', 'jpeg', 'jfif', 'pjpeg', 'pjp', 'png');
?>
