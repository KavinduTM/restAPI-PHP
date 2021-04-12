
<?php

require_once 'config.php';

// rest api - show all jobs 

$response = array();
if($_POST['id']){
    $id = $_POST['id'];
    $stmt = $conn->prepare("SELECT title,descj,req,salary FROM jobs WHERE id = ?");
    $stmt->bind_param("s",$id);
    $result = $stmt->execute();
    if($result == TRUE){
        $response['error'] = false;
        $response['message'] = "Retrieval Successful!";
        $stmt->store_result();
        $stmt->bind_result($title,$descj,$req,$salary);
        $stmt->fetch();
        $response['title'] = $title;
        $response['descj'] = $descj;
        $response['req'] = $req;
        $response['salary'] = $salary;
        
    } else{
        $response['error'] = true;
        $response['message'] = "Incorrect id";
    }
} else{
     $response['error'] = true;
     $response['message'] = "Insufficient Parameters";
}
echo json_encode($response);
?>