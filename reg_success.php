<?php
session_start();
include("connect.php");
$user = $_SESSION['user'];
echo "User: ".$user;
    $user_table = "result_" . $user;
    // declare result_username here!!!!
    $_SESSION['user_table'] = $user_table;
    echo $user_table;
    $table = "tcompany";
try {
     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
     $sql ="
     
     CREATE TABLE `$user_table`
(
timeTaken TIMESTAMP, 
dateTaken DATE,
depressedyn TEXT,
depression_q1 TEXT,
depression_q2 TEXT,
depression_q3 TEXT,
depression_q4 TEXT,
depression_q5 TEXT, 
depression_q6 TEXT,
depression_score INT(11),
suicidalyn TEXT,
suicide_q1 TEXT,
suicide_q2 TEXT,
suicide_q3 TEXT,
suicide_q4 TEXT,
suicidal_score INT(11),
anxietyyn TEXT,
anxiety_q1 TEXT,
anxiety_q2 TEXT,
anxiety_q3 TEXT,
anxiety_q4 TEXT,
anxiety_q5 TEXT,
anxiety_q6 TEXT,
anxiety_q7 TEXT,
anxiety_score INT(11),
stressyn TEXT,
stress_q1 TEXT,
stress_q2 TEXT,
stress_q3 TEXT,
stress_q4 TEXT,
stress_q5 TEXT,
stress_q6 TEXT,
stress_q7 TEXT,
stress_score INT(11),
burnoutyn TEXT,
burnout_q1 TEXT,
burnout_q2 TEXT,
burnout_q3 TEXT,
burnout_q4 TEXT,
burnout_q5 TEXT,
burnout_q6 TEXT,
burnout_q7 TEXT,
burnout_score INT(11)
);
     
     
     " ;
     $db->exec($sql);
     print("Created $table Table.\n");

} catch(PDOException $e) {
    echo $e->getMessage();//Remove or change message in production code
}
?>
Registration successful!