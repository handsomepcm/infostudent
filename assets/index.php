 <?php
http_response_code(404);
echo file_get_contents('http://localhost/infostudent/error/page_not_found');  