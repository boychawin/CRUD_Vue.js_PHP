<?php

$conn = new PDO("mysql:host=localhost;dbname=vue_php", "root", "");

// if($conn){echo "connect complete";}

$request_data = json_decode(file_get_contents("php://input"));

// var_dump($request_data);

$output = array();
if ($request_data->action == "insert") {
    $data = array(":fname" => $request_data->fname, ":lname" => $request_data->lname);
    $stmt = $conn->prepare("INSERT INTO users (fname,lname) VALUES (:fname,:lname)");
    $stmt->execute($data);
    $output = array("message" => "Insert Complete");
    echo json_encode($output);
}

if ($request_data->action == "getAll") {

    $stmt = $conn->prepare("SELECT *  FROM users");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output[] = $row;
    }
    // $output = array("message" => "Insert Complete");
    echo json_encode($output);
}


if ($request_data->action == "getEdit") {

    $stmt = $conn->prepare("SELECT *  FROM users WHERE id = :id ");
    $stmt->execute([":id" => $request_data->id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output['id'] = $row['id'];
        $output['fname'] = $row['fname'];
        $output['lname'] = $row['lname'];
    }
    // $output = array("message" => "Insert Complete");
    echo json_encode($output);
}


if ($request_data->action == "update") {

    $data = array(":fname" => $request_data->fname, ":lname" => $request_data->lname, ":id" => $request_data->id);
    $stmt = $conn->prepare("UPDATE `users` SET `fname` = :fname, `lname` = :lname WHERE `users`.`id` = :id");
    $stmt->execute($data);
    $output = array("message" => "Update Complete");
    echo json_encode($output);
}

if ($request_data->action == "dalete") {

    $stmt = $conn->prepare("DELETE FROM `users` WHERE `id` = :id");
    $stmt->execute([":id" => $request_data->id]);

    $output = array("message" => "Delete Complete");
    echo json_encode($output);
}
