<?php
include("connect.php");
session_start();
$sessionId = $_SESSION["id"];
// echo $sessionId;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["pastHistoryBtn"])){
        $maritalStatus = isset($_POST["marital-status"]) ? $_POST["marital-status"] : null;
        $reasonVisit = isset($_POST["reason-for-visit"]) ? $_POST["reason-for-visit"] : null;
        $refPhy = isset($_POST["ref-physician"]) ? $_POST["ref-physician"] : null;
        $occupation = isset($_POST["occupation"]) ? $_POST["occupation"] : null;
        $phone = isset($_POST["phone-no"]) ? $_POST["phone-no"] : null;
        //partners details
        $partnerName = isset($_POST["partner-name"]) ? $_POST["partner-name"] : null;
        $partnerNone = isset($_POST["partner_none"]) ? $_POST["partner_none"] : null;
        $agePartner = isset($_POST["age-partner"]) ? $_POST["age-partner"] : null;
        $partOccup = isset($_POST["part-occupation"]) ? $_POST["part-occupation"] : null;
        ///////////////////////////////////PART B//////////////////////////
        $age1Period = isset($_POST["age-first-period"]) ? $_POST["age-first-period"] : null;
        $perStartdy = isset($_POST["period-start-days"]) ? $_POST["period-start-days"] : null;
        $irrPerStrtDy = isset($_POST["irreg-period-strt-dy"]) ? $_POST["irreg-period-strt-dy"] : null;
        $durationBps = isset($_POST["duration-bleeding"]) ? $_POST["duration-bleeding"] : null;
        $bleedingBps = isset($_POST["bleedingBtwnPeriods"]) ? $_POST["bleedingBtwnPeriods"] : null;
        $bleedingAps = isset($_POST["bleedingAfterPeriods"]) ? $_POST["bleedingAfterPeriods"] : null;
        $lastMp = isset($_POST["last-menstrual-period"]) ? $_POST["last-menstrual-period"] : null;
        $painPs = isset($_POST["pain-period"]) ? $_POST["pain-period"] : null;
        $menses = isset($_POST["menses"]) ? $_POST["menses"] : null;
        ///////////////////////////////////////////////PART C
        $neverPreg = isset($_POST["never-been-preg"]) ? $_POST["never-been-preg"] : null;
        //table data below
        //table cell below
        $stObHist = isset($_POST["1st-ob-hist"]) ? $_POST["1st-ob-hist"] : null;
        $placeOfDel = isset($_POST["place-of-del"]) ? $_POST["place-of-del"] : null;
        $durationPreg = isset($_POST["duration-preg"]) ? $_POST["duration-preg"] : null;
        $hrsLabour = isset($_POST["hrs-labour"]) ? $_POST["hrs-labour"] : null;
        $typeDelivery = isset($_POST["type-delivery"]) ? $_POST["type-delivery"] : null;
        $complications = isset($_POST["complications"]) ? $_POST["complications"] : null;
        $sex = isset($_POST["sex"]) ? $_POST["sex"] : null;
        $birthWeight = isset($_POST["birth-weight"]) ? $_POST["birth-weight"] : null;
        $presentHealth = isset($_POST["present-health"]) ? $_POST["present-health"] : null;
        //table cell
        //table cell below
        $twoBHist = isset($_POST["2nd-ob-hist"]) ? $_POST["2nd-ob-hist"] : null;
        $placeDel2 = isset($_POST["place-of-del-2"]) ? $_POST["place-of-del-2"] : null;
        $durationPreg2 = isset($_POST["duration-preg-2"]) ? $_POST["duration-preg-2"] : null;
        $hrsLabour2 = isset($_POST["hrs-labour-2"]) ? $_POST["hrs-labour-2"] : null;
        $typeDelivery2 = isset($_POST["type-delivery-2"]) ? $_POST["type-delivery-2"] : null;
        $complications2 = isset($_POST["complications-2"]) ? $_POST["complications-2"] : null;
        $sex2 = isset($_POST["sex-2"]) ? $_POST["sex-2"] : null;
        $birthWeight2 = isset($_POST["birth-weight-2"]) ? $_POST["birth-weight-2"] : null;
        $presentHealth2 = isset($_POST["present-health-2"]) ? $_POST["present-health-2"] : null;
        //table cell below
        $thirdrdHist = isset($_POST["3rd-ob-hist"]) ? $_POST["3rd-ob-hist"] : null;
        $placeOfDel3 = isset($_POST["place-of-del-3"]) ? $_POST["place-of-del-3"] : null;
        $durationPreg3 = isset($_POST["duration-preg-3"]) ? $_POST["duration-preg-3"] : null;
        $hrsLabour3 = isset($_POST["hrs-labour-3"]) ? $_POST["hrs-labour-3"] : null;
        $typeDelivery3 = isset($_POST["type-delivery-3"]) ? $_POST["type-delivery-3"] : null;
        $complications3 = isset($_POST["complications-3"]) ? $_POST["complications-3"] : null;
        $sex3 = isset($_POST["sex-3"]) ? $_POST["sex-3"] : null;
        $birthWeight3 = isset($_POST["birth-weight-3"]) ? $_POST["birth-weight-3"] : null;
        $presentHealth3 = isset($_POST["present-health-3"]) ? $_POST["present-health-3"] : null;
        //table cell below
        $ObHist4 = isset($_POST["4-ob-hist"]) ? $_POST["4-ob-hist"] : null;
        $place4 = isset($_POST["place-of-del-4"]) ? $_POST["place-of-del-4"] : null;
        $duration4 = isset($_POST["duration-preg-4"]) ? $_POST["duration-preg-4"] : null;
        $hrs4 = isset($_POST["hrs-labour-4"]) ? $_POST["hrs-labour-4"] : null;
        $type4 = isset($_POST["type-delivery-4"]) ? $_POST["type-delivery-4"] : null;
        $complications4 = isset($_POST["complications-4"]) ? $_POST["complications-4"] : null;
        $sex4 = isset($_POST["sex-4"]) ? $_POST["sex-4"] : null;
        $birth4 = isset($_POST["birth-weight-4"]) ? $_POST["birth-weight-4"] : null;
        $present4 = isset($_POST["present-health-4"]) ? $_POST["present-health-4"] : null;
        //table cell below
        $hist5 = isset($_POST["5-ob-hist"]) ? $_POST["5-ob-hist"] : null;
        $place5 = isset($_POST["place-of-del-5"]) ? $_POST["place-of-del-5"] : null;
        $duration5 = isset($_POST["duration-preg-5"]) ? $_POST["duration-preg-5"] : null;
        $hrs5 = isset($_POST["hrs-labour-5"]) ? $_POST["hrs-labour-5"] : null;
        $type5 = isset($_POST["type-delivery-5"]) ? $_POST["type-delivery-5"] : null;
        $complications5 = isset($_POST["complications-5"]) ? $_POST["complications-5"] : null;
        $sex5 = isset($_POST["sex-5"]) ? $_POST["sex-5"] : null;
        $birth5 = isset($_POST["birth-weight-5"]) ? $_POST["birth-weight-5"] : null;
        $present5 = isset($_POST["present-health-5"]) ? $_POST["present-health-5"] : null;
        /////////////////////////////////////////////////////D PART D
        $birthControl = isset($_POST["birth-control"]) ? $_POST["birth-control"] : null;
        /////////////////////////////////////////////////////E PART E
        $sexPartner = isset($_POST["sex-partner"]) ? $_POST["sex-partner"] : null;
        $sexPartnerMale = isset($_POST["sex-partner-male"]) ? $_POST["sex-partner-male"] : null;
        $sexConcerns = isset($_POST["sex-concerns"]) ? $_POST["sex-concerns"] : null;
        //F
        $dC = isset($_POST["D&C"]) ? $_POST["D&C"] : null;
        $dCDate = isset($_POST["D&C-date"]) ? $_POST["D&C-date"] : null;
        $hysteroscopy = isset($_POST["Hysteroscopy"]) ? $_POST["Hysteroscopy"] : null;
        $hysteroscopyDate = isset($_POST["Hysteroscopy-date"]) ? $_POST["Hysteroscopy-date"] : null;
        $infertilitySurgery = isset($_POST["infertility-surgery"]) ? $_POST["infertility-surgery"] : null;
        $infertilitySurgeryDate = isset($_POST["infertility-surgery-date"]) ? $_POST["infertility-surgery-date"] : null;
        $tuboplasty = isset($_POST["tuboplasty"]) ? $_POST["tuboplasty"] : null;
        $tuboplastyDate = isset($_POST["tuboplasty-date"]) ? $_POST["tuboplasty-date"] : null;
        $tubalLigation = isset($_POST["tubal-ligation"]) ? $_POST["tubal-ligation"] : null;
        $tubalLigationDate = isset($_POST["tubal-ligation-date"]) ? $_POST["tubal-ligation-date"] : null;
        $hysterectomyV = isset($_POST["hysterectomy-(vaginal)"]) ? $_POST["hysterectomy-(vaginal)"] : null;
        $hysterectomyVDate = isset($_POST["hysterectomy-(vaginal)-date"]) ? $_POST["hysterectomy-(vaginal)-date"] : null;
        $hysterectomy = isset($_POST["hysterectomy-(abdominal)"]) ? $_POST["hysterectomy-(abdominal)"] : null;
        $hysterectomyDate = isset($_POST["hysterectomy-(abdominal)-date"]) ? $_POST["hysterectomy-(abdominal)-date"] : null;
        $myomectomy = isset($_POST["myomectomy"]) ? $_POST["myomectomy"] : null;
        $myomectomDate = isset($_POST["myomectomy-date"]) ? $_POST["myomectomy-date"] : null;
        $ovarian = isset($_POST["ovarian"]) ? $_POST["ovarian"] : null;
        $ovariandate = isset($_POST["ovarian-date"]) ? $_POST["ovarian-date"] : null;
        $L = isset($_POST["L-cyst(s)"]) ? $_POST["L-cyst(s)"] : null;
        $LDate = isset($_POST["L-cyst(s)-date"]) ? $_POST["L-cyst(s)-date"] : null;
        $R = isset($_POST["R-ovary"]) ? $_POST["R-ovary"] : null;
        $RDate = isset($_POST["R-ovary-date"]) ? $_POST["R-ovary-date"] : null;
        $LOvary = isset($_POST["L-ovary"]) ? $_POST["L-ovary"] : null;
        $LOvaryDate = isset($_POST["L-ovary-date"]) ? $_POST["L-ovary-date"] : null;
        $vaginalRepair = isset($_POST["vaginal"]) ? $_POST["vaginal"] : null;
        $vaginalRepairDate = isset($_POST["vaginal-or-bladder-repair-date"]) ? $_POST["vaginal-or-bladder-repair-date"] : null;
        $cesarean = isset($_POST["cesarean"]) ? $_POST["cesarean"] : null;
        $cesareanDate = isset($_POST["cesarean-date"]) ? $_POST["cesarean-date"] : null;
        $otherSpec = isset($_POST["other-(specify)"]) ? $_POST["other-(specify)"] : null;
        $otherSpecDate = isset($_POST["other-(specify)-date"]) ? $_POST["other-(specify)-date"] : null;
        //////////////////////////////////////////////////////GGGG
        $surgeriesNo = isset($_POST["surgeries-no"]) ? $_POST["surgeries-no"] : null;
        $surg1 = isset($_POST["surg-1"]) ? $_POST["surg-1"] : null;
        $surg1Date = isset($_POST["surg-1-date"]) ? $_POST["surg-1-date"] : null;
        $surg2 = isset($_POST["surg-2"]) ? $_POST["surg-2"] : null;
        $surg2Date = isset($_POST["surg-2-date"]) ? $_POST["surg-2-date"] : null;
        $surg3 = isset($_POST["surg-3"]) ? $_POST["surg-3"] : null;
        $surg3Date = isset($_POST["surg-3-date"]) ? $_POST["surg-3-date"] : null;
        $surg4 = isset($_POST["surg-4"]) ? $_POST["surg-4"] : null;
        $surg4Date = isset($_POST["surg-4-date"]) ? $_POST["surg-4-date"] : null;
        ////////////////////////////////////////////////////////HHHH
        $datePapCheck = isset($_POST["date-of-pap-check"]) ? $_POST["date-of-pap-check"] : null;
        $datePap = isset($_POST["date-of-pap"]) ? $_POST["date-of-pap"] : null;
        $abnormalCheck = isset($_POST["abnormal-pap-smears-check"]) ? $_POST["abnormal-pap-smears-check"] : null;
        $abnormalSmears = isset($_POST["abnormal-pap-smears"]) ? $_POST["abnormal-pap-smears"] : null;//yes or no
        //if yes then the below options
        $cryotherapy = isset($_POST["cryotherapy"]) ? $_POST["cryotherapy"] : null;
        $laser = isset($_POST["laser"]) ? $_POST["laser"] : null;
        $coneBiopsy = isset($_POST["cone-biopsy"]) ? $_POST["cone-biopsy"] : null;
        $loopExcision = isset($_POST["loop-excision"]) ? $_POST["loop-excision"] : null;
        $lastMammogram = isset($_POST["last-mammogram"]) ? $_POST["last-mammogram"] : null;
        $abMamo = isset($_POST["ab-mamo-no"]) ? $_POST["ab-mamo-no"] : null;//this is a yes or no
        //other past gyno history//check any that apply
        $gynNone = isset($_POST["gyn-hist-None"]) ? $_POST["gyn-hist-None"] : null;
        $gynVenereal = isset($_POST["gyn-hist-Venereal"]) ? $_POST["gyn-hist-Venereal"] : null;
        $gynHerpes = isset($_POST["gyn-hist-Herpes"]) ? $_POST["gyn-hist-Herpes"] : null;
        $gynSyphilis = isset($_POST["gyn-hist-Syphilis"]) ? $_POST["gyn-hist-Syphilis"] : null;
        $gynPelvic = isset($_POST["gyn-hist-Pelvic"]) ? $_POST["gyn-hist-Pelvic"] : null;
        $gynEndometriosis = isset($_POST["gyn-hist-Endometriosis"]) ? $_POST["gyn-hist-Endometriosis"] : null;
        $gynChlamydia = isset($_POST["gyn-hist-Chlamydia"]) ? $_POST["gyn-hist-Chlamydia"] : null;
        $gynGonorrhea = isset($_POST["gyn-hist-Gonorrhea"]) ? $_POST["gyn-hist-Gonorrhea"] : null;
        $gynVaginal = isset($_POST["gyn-hist-Vaginal"]) ? $_POST["gyn-hist-Vaginal"] : null;
        $gynOther = isset($_POST["gyn-other"]) ? $_POST["gyn-other"] : null;

        ///////////////////////////////////////////////////I
        ///PAST MED HIST
        $pastMedHist = isset($_POST["past-med-hist"]) ? $_POST["past-med-hist"] : null;
        $arthritis = isset($_POST["Arthritis"]) ? $_POST["Arthritis"] : null;
        $Diabetes0 = isset($_POST["Diabetes0"]) ? $_POST["Diabetes0"] : null;
        $Diet = isset($_POST["Diet"]) ? $_POST["Diet"] : null;
        $Pill = isset($_POST["Pill"]) ? $_POST["Pill"] : null;
        $Insulin = isset($_POST["Insulin"]) ? $_POST["Insulin"] : null;
        $hbp = isset($_POST["hbp"]) ? $_POST["hbp"] : null;
        $heartDisease = isset($_POST["heart-disease"]) ? $_POST["heart-disease"] : null;
        $KidneyDisease = isset($_POST["Kidney-disease"]) ? $_POST["Kidney-disease"] : null;
        $gallstones = isset($_POST["Gallstones"]) ? $_POST["Gallstones"] : null;
        $liver = isset($_POST["Liver"]) ? $_POST["Liver"] : null;
        $epilepsy = isset($_POST["Epilepsy"]) ? $_POST["Epilepsy"] : null;
        $blood = isset($_POST["Blood"]) ? $_POST["Blood"] : null;
        $thyroid = isset($_POST["Thyroid"]) ? $_POST["Thyroid"] : null;
        $asthma = isset($_POST["Asthma"]) ? $_POST["Asthma"] : null;
        $emphysema = isset($_POST["Emphysema"]) ? $_POST["Emphysema"] : null;
        $bronchitis = isset($_POST["Bronchitis"]) ? $_POST["Bronchitis"] : null;
        $hIV = isset($_POST["HIV+"]) ? $_POST["HIV+"] : null;
        $eatingDisorder = isset($_POST["Eating-Disorder"]) ? $_POST["Eating-Disorder"] : null;
        $Other7 = isset($_POST["Other7"]) ? $_POST["Other7"] : null;
        $OtherInput = isset($_POST["Other7-input"]) ? $_POST["Other7-input"] : null;
        
        //////////////////////////////////////////////////////////////////////M
        $diabetes = isset($_POST["diabetes"]) ? $_POST["diabetes"] : null;
        $heartDis = isset($_POST["heart-dis"]) ? $_POST["heart-dis"] : null;
        $breastCanc = isset($_POST["breast-canc"]) ? $_POST["breast-canc"] : null;
        $other5 = isset($_POST["other5"]) ? $_POST["other5"] : null;
        $ovarianCanc = isset($_POST["ovarian-canc"]) ? $_POST["ovarian-canc"] : null;
        $endoCanc = isset($_POST["endo-canc"]) ? $_POST["endo-canc"] : null;
        $colonCanc = isset($_POST["colon-canc"]) ? $_POST["colon-canc"] : null;
        //IF yes, list teh relatives
        $relative = isset($_POST["relative"]) ? $_POST["relative"] : null;
        $relative1 = isset($_POST["relative1"]) ? $_POST["relative1"] : null;
        $relative2 = isset($_POST["relative2"]) ? $_POST["relative2"] : null;
        $noneAbove = isset($_POST["none-of-above"]) ? $_POST["none-of-above"] : null; //none of the above
        /////////////////////////////////////////////////////////////////N
        //have you had any recent?
        $weightLoss = isset($_POST["weight-loss"]) ? $_POST["weight-loss"] : null;
        $weightGain = isset($_POST["weight-gain"]) ? $_POST["weight-gain"] : null;
        $changeEnergy = isset($_POST["change-in-energy"]) ? $_POST["change-in-energy"] : null;
        $changeExerciseTolerance = isset($_POST["change-in-exercise-tolerance"]) ? $_POST["change-in-exercise-tolerance"] : null;
        $hairGrowth = isset($_POST["hair-growth"]) ? $_POST["hair-growth"] : null;
        $hairLoss = isset($_POST["hair-loss"]) ? $_POST["hair-loss"] : null;
        $changeUrinaryFunction = isset($_POST["change-in-urinary-function"]) ? $_POST["change-in-urinary-function"] : null;
        $hotFlushes = isset($_POST["hot-flushes"]) ? $_POST["hot-flushes"] : null;
        $breastDischarge = isset($_POST["breast-discharge"]) ? $_POST["breast-discharge"] : null;
        $noneAbove1 = isset($_POST["none-of-the-above"]) ? $_POST["none-of-the-above"] : null;
        $Other6 = isset($_POST["Other6"]) ? $_POST["Other6"] : null;

        ///////////////////////////////////////////////////////O ////////////////////////// O  ////////////////// O
        //planning to be prego only
        $downSyndro = isset($_POST["down-syndro"]) ? $_POST["down-syndro"] : null;
        $chromosomal = isset($_POST["Chromosomal"]) ? $_POST["Chromosomal"] : null;
        $neural = isset($_POST["Neural"]) ? $_POST["Neural"] : null;
        $hemophilia = isset($_POST["Hemophilia"]) ? $_POST["Hemophilia"] : null;
        $dystrophy = isset($_POST["Dystrophy"]) ? $_POST["Dystrophy"] : null;
        $cystic = isset($_POST["Cystic"]) ? $_POST["Cystic"] : null;
        $taySachs = isset($_POST["Tay-Sachs"]) ? $_POST["Tay-Sachs"] : null;
        $taySachsInput = isset($_POST["Tay-Sachs-input"]) ? $_POST["Tay-Sachs-input"] : null;
        $otherFather = isset($_POST["Other-father"]) ? $_POST["Other-father"] : null;
        $resultFather = isset($_POST["result-father"]) ? $_POST["result-father"] : null;
        $otherMother = isset($_POST["Other-mother"]) ? $_POST["Other-mother"] : null;
        $resultMother = isset($_POST["result-mother"]) ? $_POST["result-mother"] : null;
        $taySachsChild = isset($_POST["Tay-Sachs-child"]) ? $_POST["Tay-Sachs-child"] : null;
        $taySachsChildInput = isset($_POST["Tay-Sachs-child-input"]) ? $_POST["Tay-Sachs-child-input"] : null;
        $other1 = isset($_POST["Other1"]) ? $_POST["Other1"] : null;
        $other2 = isset($_POST["Other2"]) ? $_POST["Other2"] : null;
        $otherFatherChild = isset($_POST["Other-father-child"]) ? $_POST["Other-father-child"] : null;
        $otherMotherChild = isset($_POST["Other-mother-child"]) ? $_POST["Other-mother-child"] : null;
        $sickleCell = isset($_POST["Sickle-cell"]) ? $_POST["Sickle-cell"] : null;
        $sickleCellInput = isset($_POST["Sickle-cell-input"]) ? $_POST["Sickle-cell-input"] : null;
        $otherSickleCellF = isset($_POST["Other-Sickle-cell-f"]) ? $_POST["Other-Sickle-cell-f"] : null;
        $otherSicklECellResultFather = isset($_POST["Other-Sickle-cell-result-father"]) ? $_POST["Other-Sickle-cell-result-father"] : null;
        $otherSickleCellM = isset($_POST["Other-Sickle cell-m"]) ? $_POST["Other-Sickle cell-m"] : null;
        $otherSickleCellMother = isset($_POST["Other-Sickle-cell-result-mother"]) ? $_POST["Other-Sickle-cell-result-mother"] : null;
        $sql = "INSERT INTO `pasthistory`(maritalStatus, reasonVisit, refPhy, occupation, phone, partnerName, partnerNone, agePartner, partOccup, age1Period, perStartdy, irrPerStrtDy, durationBps, bleedingBps, bleedingAps, lastMp, painPs, menses, neverPreg, stObHist, placeOfDel, durationPreg, hrsLabour, typeDelivery, complications, sex, birthWeight, presentHealth, twoBHist, placeDel2, durationPreg2, hrsLabour2, typeDelivery2, complications2, sex2, birthWeight2, presentHealth2, thirdrdHist, placeOfDel3, durationPreg3, hrsLabour3, typeDelivery3, complications3, sex3, birthWeight3, presentHealth3, ObHist4, place4, duration4, hrs4, type4, complications4, sex4, birth4, present4, hist5, place5, duration5, hrs5, type5, complications5, sex5, birth5, present5, birthControl, sexPartner, sexPartnerMale, sexConcerns, dC, dCDate, hysteroscopy, hysteroscopyDate, infertilitySurgery, infertilitySurgeryDate, tuboplasty, tuboplastyDate, tubalLigation, tubalLigationDate, hysterectomyV, hysterectomyVDate, hysterectomy, hysterectomyDate, myomectomy, myomectomDate, ovarian, ovariandate, L, LDate, R, RDate, LOvary, LOvaryDate, vaginalRepair, vaginalRepairDate, cesarean, cesareanDate, otherSpec, otherSpecDate, surgeriesNo, surg1, surg1Date, surg2, surg2Date, surg3, surg3Date, surg4, surg4Date, datePapCheck, datePap, abnormalCheck, abnormalSmears, cryotherapy, laser, coneBiopsy, loopExcision, lastMammogram, abMamo, gynNone, gynVenereal, gynHerpes, gynSyphilis, gynPelvic, gynEndometriosis, gynChlamydia, gynGonorrhea, gynVaginal, gynOther, pastMedHist, arthritis, Diabetes0, Diet, Pill, Insulin, hbp, heartDisease, KidneyDisease, gallstones, liver, epilepsy, blood, thyroid, asthma, emphysema, bronchitis, hIV, eatingDisorder, Other7, OtherInput, diabetes, heartDis, breastCanc, other5, ovarianCanc, endoCanc, colonCanc, relative, relative1, relative2, noneAbove, weightLoss, weightGain, changeEnergy, changeExerciseTolerance, hairGrowth, hairLoss, changeUrinaryfunction, hotFlushes, breastDischarge, noneAbove1, Other6, downSyndro, chromosomal, neural, hemophilia, dystrophy, cystic, taySachs, taySachsInput, otherFather, resultFather, otherMother, resultMother, taySachsChild, taySachsChildInput, other1, other2, otherFatherChild, otherMotherChild, sickleCell, sickleCellInput, otherSickleCellF, otherSicklECellRF, otherSickleCellM, otherSickleCellMother, patinet_Pid)
                VALUES('$maritalStatus', '$reasonVisit', '$refPhy','$occupation','$phone','$partnerName',
        '$partnerNone',
        '$agePartner',
        '$partOccup',
        '$age1Period',
        '$perStartdy',
        '$irrPerStrtDy',
        '$durationBps',
        '$bleedingBps',
        '$bleedingAps', 
        '$lastMp',
        '$painPs',
        '$menses',
        '$neverPreg',
        '$stObHist',
        '$placeOfDel',
        '$durationPreg', 
        '$hrsLabour',
        '$typeDelivery', 
        '$complications', 
        '$sex',
        '$birthWeight',
        '$presentHealth',
        '$twoBHist',
        '$placeDel2',
        '$durationPreg2', 
        '$hrsLabour2',
        '$typeDelivery2',
        '$complications2', 
        '$sex2',
        '$birthWeight2',
        '$presentHealth2',
        '$thirdrdHist',
        '$placeOfDel3',
        '$durationPreg3', 
        '$hrsLabour3',
        '$typeDelivery3',
        '$complications3', 
        '$sex3',
        '$birthWeight3',
        '$presentHealth3',
        '$ObHist4',
        '$place4',
        '$duration4', 
        '$hrs4',
        '$type4',
        '$complications4', 
        '$sex4',
        '$birth4',
        '$present4',
        '$hist5',
        '$place5',
        '$duration5', 
        '$hrs5' ,
        '$type5' ,
        '$complications5' ,
        '$sex5' ,
        '$birth5' ,
        '$present5' ,
        '$birthControl' ,
        '$sexPartner' ,
        '$sexPartnerMale' , 
        '$sexConcerns' ,
        '$dC' ,
        '$dCDate' ,
        '$hysteroscopy' ,
        '$hysteroscopyDate' ,
        '$infertilitySurgery' ,
        '$infertilitySurgeryDate' , 
        '$tuboplasty' ,
        '$tuboplastyDate' ,
        '$tubalLigation' ,
        '$tubalLigationDate' ,
        '$hysterectomyV' ,
        '$hysterectomyVDate' , 
        '$hysterectomy' ,
        '$hysterectomyDate' , 
        '$myomectomy' ,
        '$myomectomDate' , 
        '$ovarian' ,
        '$ovariandate' , 
        '$L' ,
        '$LDate' , 
        '$R' ,
        '$RDate' ,
        '$LOvary' ,
        '$LOvaryDate' ,
        '$vaginalRepair' ,
        '$vaginalRepairDate' , 
        '$cesarean' ,
        '$cesareanDate' , 
        '$otherSpec' ,
        '$otherSpecDate' ,
        '$surgeriesNo' , 
        '$surg1' ,
        '$surg1Date' , 
        '$surg2' ,
        '$surg2Date' , 
        '$surg3' ,
        '$surg3Date' , 
        '$surg4' ,
        '$surg4Date' ,
        '$datePapCheck' , 
        '$datePap' ,
        '$abnormalCheck' , 
        '$abnormalSmears' ,
        '$cryotherapy' ,
        '$laser' ,
        '$coneBiopsy' ,
        '$loopExcision' ,
        '$lastMammogram' , 
        '$abMamo' ,
        '$gynNone' ,
        '$gynVenereal' , 
        '$gynHerpes' ,
        '$gynSyphilis' ,
        '$gynPelvic' ,
        '$gynEndometriosis' ,
        '$gynChlamydia' ,
        '$gynGonorrhea' , 
        '$gynVaginal' , 
        '$gynOther' ,
        '$pastMedHist' , 
        '$arthritis' ,
        '$Diabetes0' ,
        '$Diet' ,
        '$Pill' ,
        '$Insulin' , 
        '$hbp' ,
        '$heartDisease' ,
        '$KidneyDisease' ,
        '$gallstones' , 
        '$liver' ,
        '$epilepsy' , 
        '$blood' ,
        '$thyroid' ,
        '$asthma' ,
        '$emphysema' ,
        '$bronchitis' , 
        '$hIV' ,
        '$eatingDisorder' ,
        '$Other7' ,
        '$OtherInput' ,
        '$diabetes' ,
        '$heartDis' ,
        '$breastCanc' , 
        '$other5' ,
        '$ovarianCanc' , 
        '$endoCanc' ,
        '$colonCanc' ,
        '$relative' ,
        '$relative1' ,
        '$relative2' ,
        '$noneAbove' ,
        '$weightLoss' ,
        '$weightGain' ,
        '$changeEnergy' ,
        '$changeExerciseTolerance' , 
        '$hairGrowth' , 
        '$hairLoss' ,
        '$changeUrinaryFunction' , 
        '$hotFlushes' ,
        '$breastDischarge' , 
        '$noneAbove1' , 
        '$Other6' ,
        '$downSyndro' ,
        '$chromosomal' , 
        '$neural',
        '$hemophilia',
        '$dystrophy', 
        '$cystic',
        '$taySachs',
        '$taySachsInput', 
        '$otherFather',
        '$resultFather',
        '$otherMother',
        '$resultMother',
        '$taySachsChild',
        '$taySachsChildInput', 
        '$other1',
        '$other2',
        '$otherFatherChild',
        '$otherMotherChild', 
        '$sickleCell',
        '$sickleCellInput',
        '$otherSickleCellF',
        '$otherSicklECellResultFather', 
        '$otherSickleCellM',
        '$otherSickleCellMother',
        '$sessionId')";

        $response = mysqli_query($conn, $sql);

        if($response){
            header("Location:../past-history-question.php?id={$_SESSION["id"]}&firstN={$_SESSION["firstN"]}&lastN={$_SESSION["lastN"]}&dob={$_SESSION["dob"]}&bloodG={$_SESSION["bloodG"]}&medication={$_SESSION["medication"]}&gender={$_SESSION["gender"]}&phoneN={$_SESSION["phoneN"]}&EmailAddress={$_SESSION["EmailAddress"]}&NextOfKin={$_SESSION["NextOfKin"]}&NextOfKinPhoneNumber={$_SESSION["NextOfKinPhoneNumber"]}&MaritalStatus={$_SESSION["MaritalStatus"]}&Allergies={$_SESSION["IDNumber"]}&IDNumber={$_SESSION["Allergies"]}&Occupation={$_SESSION["Occupation"]}");
        }
    }
}
