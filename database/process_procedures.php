<?php
session_start();
include("connect.php");
$imageSessionId = $_SESSION["id"];
$firstN = $_SESSION["firstN"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["proceduresMain"])){
       
        $pap = filter_input(INPUT_POST, "Pap", FILTER_SANITIZE_SPECIAL_CHARS);
        $Colposcopy = filter_input(INPUT_POST, "Colposcopy", FILTER_SANITIZE_SPECIAL_CHARS);
        $Hysteroscopy = filter_input(INPUT_POST, "Hysteroscopy", FILTER_SANITIZE_SPECIAL_CHARS);
        $Endometrial = filter_input(INPUT_POST, "Endometrial", FILTER_SANITIZE_SPECIAL_CHARS);
        $Pelvic = filter_input(INPUT_POST, "Pelvic", FILTER_SANITIZE_SPECIAL_CHARS);
        $Mammogram = filter_input(INPUT_POST, "Mammogram", FILTER_SANITIZE_SPECIAL_CHARS);
        $Ovarian = filter_input(INPUT_POST, "Ovarian", FILTER_SANITIZE_SPECIAL_CHARS);
        $Cervical = filter_input(INPUT_POST, "Cervical", FILTER_SANITIZE_SPECIAL_CHARS);
        $Tubal = filter_input(INPUT_POST, "Tubal", FILTER_SANITIZE_SPECIAL_CHARS);
        $LEEP = filter_input(INPUT_POST, "LEEP", FILTER_SANITIZE_SPECIAL_CHARS);
        $Myomectomy = filter_input(INPUT_POST, "Myomectomy", FILTER_SANITIZE_SPECIAL_CHARS);
        $Hysterectomy = filter_input(INPUT_POST, "Hysterectomy", FILTER_SANITIZE_SPECIAL_CHARS);
        $Vaginal = filter_input(INPUT_POST, "Vaginal", FILTER_SANITIZE_SPECIAL_CHARS);
        $Dilation = filter_input(INPUT_POST, "Dilation", FILTER_SANITIZE_SPECIAL_CHARS);
        $Uterine = filter_input(INPUT_POST, "Uterine", FILTER_SANITIZE_SPECIAL_CHARS);
        $Cystoscopy = filter_input(INPUT_POST, "Cystoscopy", FILTER_SANITIZE_SPECIAL_CHARS);
        $Intrauterine = filter_input(INPUT_POST, "Intrauterine", FILTER_SANITIZE_SPECIAL_CHARS);
        $Amniocentesis = filter_input(INPUT_POST, "Amniocentesis", FILTER_SANITIZE_SPECIAL_CHARS);
        $Fetal = filter_input(INPUT_POST, "Fetal", FILTER_SANITIZE_SPECIAL_CHARS);
        $Cesarean = filter_input(INPUT_POST, "Cesarean", FILTER_SANITIZE_SPECIAL_CHARS);
        
        $sql = "INSERT INTO `procedures`(Pap,Colposcopy,Hysteroscopy,Endometrial,Pelvic,Mammogram,Ovarian,Cervical,Tubal,LEEP,Myomectomy,Hysterectomy,Vaginal,Dilation,Uterine,Cystoscopy,Intrauterine,Amniocentesis,Fetal) 
                VALUES ('$Pap','$Colposcopy','$Hysteroscopy', '$Endometrial', '$Pelvic', '$Mammogram', '$Ovarian', '$Cervical', '$Tubal', '$LEEP', '$Myomectomy', '$Hysterectomy', '$Vaginal', '$Dilation', '$Uterine', '$Cystoscopy', '$Intrauterine', '$Amniocentesis', '$Fetal')";
        $resl = mysqli_query($conn, $sql);
        $stage = 'billing';

        if($resl){
            $sqlUpdateRoom = "UPDATE `patients`
                              SET `rooms` = '$stage'
                              WHERE `id` = '$imageSessionId'";
            
            $reso = mysqli_query($conn, $sql);
            if($reso){
                header("Location:doc_finalTotalServices.php");
            }else{
                header("Location:../doctor_index.php?error=failed to complete the patient . $firstN . 's process");
            }
            
        }else{
            header("Location:../doctor_index.php?error=failed to send procedure request of the patient . $firstN .");
        }
    }
}
?>