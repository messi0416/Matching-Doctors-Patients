<?php 
    session_start();
    include("functions.php");
    $conn = connectDB();

    $emailUsers = "";
    
    $Avismedical1 = "";
    $Avismedical2 = "";
    $Avismedical3 = "";

    $Physical_condition1 = "";
    $Physical_condition2 = "";
    $Physical_condition3 = "";
    $Physical_condition4 = "";

    $Physical_condition5 = "";
    $Physical_condition6 = "";
    $Physical_condition7 = "";
    $Physical_condition8 = "";

    $Physical_condition9 = "";
    $Physical_condition10 = "";
    $Physical_condition11 = "";
    $Physical_condition12 = "";

    $Physical_condition13 = "";
    $Physical_condition14 = "";
    $Physical_condition15 = "";
    $Physical_condition16 = "";

    $Physical_condition17 = "";
    $Physical_condition18 = "";
    $Physical_condition19 = "";
    $Physical_condition20 = "";

    $Physical_condition21 = "";
    $Physical_condition22 = "";




    $Repercussions1 = "";
    $Repercussions2 = "";
    $Repercussions3 = "";
    $Repercussions4 = "";
    $Repercussions5 = "";

    $Repercussions6 = "";
    $Repercussions7 = "";
    $Repercussions8 = "";
    $Repercussions9 = "";
    $Repercussions10 = "";

    $Repercussions11 = "";
    $Repercussions12 = "";
    $Repercussions13 = "";
    $Repercussions14 = "";
    $Repercussions15 = "";

    $Repercussions16 = "";
    $Repercussions17 = "";
    $Repercussions18 = "";
    $Repercussions19 = "";
    $Repercussions20 = "";

    $Autonomy1 = "";
    $Autonomy2 = "";
    $Autonomy3 = "";
    $Autonomy4 = "";
    $Autonomy5 = "";

    $Autonomy6 = "";
    $Autonomy7 = "";
    $Autonomy8 = "";
    $Autonomy9 = "";
    $Autonomy10 = "";

    $Autonomy11 = "";
    $Autonomy12 = "";
    $Autonomy13 = "";
    $Autonomy14 = "";
    $Autonomy15 = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_SESSION['lastid'];
        $email = $_SESSION['pemail'];
        $action = $_POST['action'];
        
        $current_time = date('Y-m-d H:i:s');
        $conn->exec("INSERT INTO reports(id, comment) VALUES (".$id.",'init') ON DUPLICATE KEY UPDATE comment='update'");
        $conn->exec("INSERT INTO reports(id, lastdate) VALUES (".$id.",'') ON DUPLICATE KEY UPDATE lastdate='".$current_time."'");

        $query = $conn->prepare("UPDATE reports SET emailUsers=:emailUsers WHERE id=:id");
        $query->execute(["id" => $id, "emailUsers" => $email]);

        if ($action === "tiny_avi") {
            $content = $_POST['content'];
            $stmt = $conn->prepare("UPDATE reports SET Avis=:Avis WHERE id=:id");
            $stmt->execute(["id" => $id, "Avis" => $content]);
        }
        
        if ($action === "tiny_aut") {
            $content = $_POST['content'];
            $stmt = $conn->prepare("UPDATE reports SET Aut=:Aut WHERE id=:id");
            $stmt->execute(["id" => $id, "Aut" => $content]);
        }
        if ($action === "tiny_reti") {
            $content = $_POST['content'];
            $stmt = $conn->prepare("UPDATE reports SET Reti=:Reti WHERE id=:id");
            $stmt->execute(["id" => $id, "Reti" => $content]);
        }

        if ($action === "avi") {
            $Avismedical1 = test_input($_POST['Avismedical1']);
            $Avismedical2 = test_input($_POST['Avismedical2']);
            $Avismedical3 = test_input($_POST['Avismedical3']);

            $stmt = $conn->prepare
                ("UPDATE reports SET
                Avismedical1=:Avismedical1,
                Avismedical2=:Avismedical2,
                Avismedical3=:Avismedical3
                WHERE id=:id");
            
            $stmt->execute([
                "id" => $id,
                "Avismedical1" => $Avismedical1,
                "Avismedical2" => $Avismedical2,
                "Avismedical3" => $Avismedical3,
            ]);
            
        } elseif ($action === "con") {
            
            $Physical_condition1 = test_input($_POST['Physical_condition1']);
            $Physical_condition2 = test_input($_POST['Physical_condition2']);
            $Physical_condition3 = test_input($_POST['Physical_condition3']);
            $Physical_condition4 = test_input($_POST['Physical_condition4']);

            $Physical_condition5 = test_input($_POST['Physical_condition5']);
            $Physical_condition6 = test_input($_POST['Physical_condition6']);
            $Physical_condition7 = test_input($_POST['Physical_condition7']);
            $Physical_condition8 = test_input($_POST['Physical_condition8']);

            $Physical_condition9 = test_input($_POST['Physical_condition9']);
            $Physical_condition10 = test_input($_POST['Physical_condition10']);
            $Physical_condition11 = test_input($_POST['Physical_condition11']);
            $Physical_condition12 = test_input($_POST['Physical_condition12']);

            $Physical_condition13 = test_input($_POST['Physical_condition13']);
            $Physical_condition14 = test_input($_POST['Physical_condition14']);
            $Physical_condition15 = test_input($_POST['Physical_condition15']);
            $Physical_condition16 = test_input($_POST['Physical_condition16']);

            $Physical_condition17 = test_input($_POST['Physical_condition17']);
            $Physical_condition18 = test_input($_POST['Physical_condition18']);
            $Physical_condition19 = test_input($_POST['Physical_condition19']);
            $Physical_condition20 = test_input($_POST['Physical_condition20']);

            $Physical_condition21 = test_input($_POST['Physical_condition21']);
            $Physical_condition22 = test_input($_POST['Physical_condition22']);

            $stmt = $conn->prepare
                ("UPDATE reports SET
                Physical_condition1=:Physical_condition1,
                Physical_condition2=:Physical_condition2,
                Physical_condition3=:Physical_condition3,
                Physical_condition4=:Physical_condition4,
                Physical_condition5=:Physical_condition5,
                Physical_condition6=:Physical_condition6,
                Physical_condition7=:Physical_condition7,
                Physical_condition8=:Physical_condition8,
                Physical_condition9=:Physical_condition9,
                Physical_condition10=:Physical_condition10,
                Physical_condition11=:Physical_condition11,
                Physical_condition12=:Physical_condition12,
                Physical_condition13=:Physical_condition13,
                Physical_condition14=:Physical_condition14,
                Physical_condition15=:Physical_condition15,
                Physical_condition16=:Physical_condition16,
                Physical_condition17=:Physical_condition17,
                Physical_condition18=:Physical_condition18,
                Physical_condition19=:Physical_condition19,
                Physical_condition20=:Physical_condition20,
                Physical_condition21=:Physical_condition21,
                Physical_condition22=:Physical_condition22
                WHERE id=:id");
            
            $stmt->execute([
                "id" => $id,
                "Physical_condition1" => $Physical_condition1,
                "Physical_condition2" => $Physical_condition2,
                "Physical_condition3" => $Physical_condition3,
                "Physical_condition4" => $Physical_condition4,
                "Physical_condition5" => $Physical_condition5,
                "Physical_condition6" => $Physical_condition6,
                "Physical_condition7" => $Physical_condition7,
                "Physical_condition8" => $Physical_condition8,
                "Physical_condition9" => $Physical_condition9,
                "Physical_condition10" => $Physical_condition10,
                "Physical_condition11" => $Physical_condition11,
                "Physical_condition12" => $Physical_condition12,
                "Physical_condition13" => $Physical_condition13,
                "Physical_condition14" => $Physical_condition14,
                "Physical_condition15" => $Physical_condition15,
                "Physical_condition16" => $Physical_condition16,
                "Physical_condition17" => $Physical_condition17,
                "Physical_condition18" => $Physical_condition18,
                "Physical_condition19" => $Physical_condition19,
                "Physical_condition20" => $Physical_condition20,
                "Physical_condition21" => $Physical_condition21,
                "Physical_condition22" => $Physical_condition22
            ]);
            
        } elseif ($action === "aut") {

            $Autonomy1 = test_input($_POST['Autonomy1']);
            $Autonomy2 = test_input($_POST['Autonomy2']);
            $Autonomy3 = test_input($_POST['Autonomy3']);
            $Autonomy4 = test_input($_POST['Autonomy4']);
            $Autonomy5 = test_input($_POST['Autonomy5']);

            $Autonomy6 = test_input($_POST['Autonomy6']);
            $Autonomy7 = test_input($_POST['Autonomy7']);
            $Autonomy8 = test_input($_POST['Autonomy8']);
            $Autonomy9 = test_input($_POST['Autonomy9']);
            $Autonomy10 = test_input($_POST['Autonomy10']);

            $Autonomy11 = test_input($_POST['Autonomy11']);
            $Autonomy12 = test_input($_POST['Autonomy12']);
            $Autonomy13 = test_input($_POST['Autonomy13']);
            $Autonomy14 = test_input($_POST['Autonomy14']);
            $Autonomy15 = test_input($_POST['Autonomy15']);

            $stmt = $conn->prepare
                ("UPDATE reports SET
                Autonomy1=:Autonomy1,
                Autonomy2=:Autonomy2,
                Autonomy3=:Autonomy3,
                Autonomy4=:Autonomy4,
                Autonomy5=:Autonomy5,
                Autonomy6=:Autonomy6,
                Autonomy7=:Autonomy7,
                Autonomy8=:Autonomy8,
                Autonomy9=:Autonomy9,
                Autonomy10=:Autonomy10,
                Autonomy11=:Autonomy11,
                Autonomy12=:Autonomy12,
                Autonomy13=:Autonomy13,
                Autonomy14=:Autonomy14,
                Autonomy15=:Autonomy15
                WHERE id=:id");
            
            $stmt->execute([
                "id" => $id,
                "Autonomy1" => $Autonomy1,
                "Autonomy2" => $Autonomy2,
                "Autonomy3" => $Autonomy3,
                "Autonomy4" => $Autonomy4,
                "Autonomy5" => $Autonomy5,
                "Autonomy6" => $Autonomy6,
                "Autonomy7" => $Autonomy7,
                "Autonomy8" => $Autonomy8,
                "Autonomy9" => $Autonomy9,
                "Autonomy10" => $Autonomy10,
                "Autonomy11" => $Autonomy11,
                "Autonomy12" => $Autonomy12,
                "Autonomy13" => $Autonomy13,
                "Autonomy14" => $Autonomy14,
                "Autonomy15" => $Autonomy15,
            ]);

        } elseif ($action === "ret") {
            $Repercussions1 = test_input($_POST['Repercussions1']);
            $Repercussions2 = test_input($_POST['Repercussions2']);
            $Repercussions3 = test_input($_POST['Repercussions3']);
            $Repercussions4 = test_input($_POST['Repercussions4']);
            $Repercussions5 = test_input($_POST['Repercussions5']);
    
            $Repercussions6 = test_input($_POST['Repercussions6']);
            $Repercussions7 = test_input($_POST['Repercussions7']);
            $Repercussions8 = test_input($_POST['Repercussions8']);
            $Repercussions9 = test_input($_POST['Repercussions9']);
            $Repercussions10 = test_input($_POST['Repercussions10']);
    
            $Repercussions11 = test_input($_POST['Repercussions11']);
            $Repercussions12 = test_input($_POST['Repercussions12']);
            $Repercussions13 = test_input($_POST['Repercussions13']);
            $Repercussions14 = test_input($_POST['Repercussions14']);
            $Repercussions15 = test_input($_POST['Repercussions15']);
    
            $Repercussions16 = test_input($_POST['Repercussions16']);
            $Repercussions17 = test_input($_POST['Repercussions17']);
            $Repercussions18 = test_input($_POST['Repercussions18']);
            $Repercussions19 = test_input($_POST['Repercussions19']);
            $Repercussions20 = test_input($_POST['Repercussions20']);

            $stmt = $conn->prepare
                ("UPDATE reports SET
                Repercussions1=:Repercussions1,
                Repercussions2=:Repercussions2,
                Repercussions3=:Repercussions3,
                Repercussions4=:Repercussions4,
                Repercussions5=:Repercussions5,
                Repercussions6=:Repercussions6,
                Repercussions7=:Repercussions7,
                Repercussions8=:Repercussions8,
                Repercussions9=:Repercussions9,
                Repercussions10=:Repercussions10,
                Repercussions11=:Repercussions11,
                Repercussions12=:Repercussions12,
                Repercussions13=:Repercussions13,
                Repercussions14=:Repercussions14,
                Repercussions15=:Repercussions15,
                Repercussions16=:Repercussions16,
                Repercussions17=:Repercussions17,
                Repercussions18=:Repercussions18,
                Repercussions19=:Repercussions19,
                Repercussions20=:Repercussions20
                WHERE id=:id");
            
            $stmt->execute([
                "id" => $id,
                "Repercussions1" => $Repercussions1,
                "Repercussions2" => $Repercussions2,
                "Repercussions3" => $Repercussions3,
                "Repercussions4" => $Repercussions4,
                "Repercussions5" => $Repercussions5,
                "Repercussions6" => $Repercussions6,
                "Repercussions7" => $Repercussions7,
                "Repercussions8" => $Repercussions8,
                "Repercussions9" => $Repercussions9,
                "Repercussions10" => $Repercussions10,
                "Repercussions11" => $Repercussions11,
                "Repercussions12" => $Repercussions12,
                "Repercussions13" => $Repercussions13,
                "Repercussions14" => $Repercussions14,
                "Repercussions15" => $Repercussions15,
                "Repercussions16" => $Repercussions16,
                "Repercussions17" => $Repercussions17,
                "Repercussions18" => $Repercussions18,
                "Repercussions19" => $Repercussions19,
                "Repercussions20" => $Repercussions20,
            ]);
        }  
    }
    $conn = null;
    // header is after $conn = null
    // header("Location: ../admin/consultation.php");
?>