<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient History Form</title>
</head>
<body>

<form action="save_history.php" method="post">

<h2>Past Medical History</h2>
 <label>
 Anemia:
        <input type="radio" name="past_medical_history[Anemia]" value="No"> No
        <input type="radio" name="past_medical_history[Anemia]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Anemia]" value="Yes"> Yes
    </label><br>
    <label>
    Headaches/frequent:
        <input type="radio" name="past_medical_history[Headaches/frequent]" value="No"> No
        <input type="radio" name="past_medical_history[Headaches/frequent]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Headaches/frequent]" value="Yes"> Yes
    </label><br>
    <label>
    Migraine headaches :
        <input type="radio" name="past_medical_history[Migraine_headaches]" value="No"> No
        <input type="radio" name="past_medical_history[Migraine_headaches]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Migraine_headaches]" value="Yes"> Yes
    </label><br>
    <label>
    Severe depression  :
        <input type="radio" name="past_medical_history[Severe_depression]" value="No"> No
        <input type="radio" name="past_medical_history[Severe_depression]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Severe_depression]" value="Yes"> Yes
    </label><br>
    <label>
    Severe mood changes   :
        <input type="radio" name="past_medical_history[Severe_mood_changes]" value="No"> No
        <input type="radio" name="past_medical_history[Severe_mood_changes]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Severe_mood_changes]" value="Yes"> Yes
    </label><br>
    <label>
    Cancer   :
        <input type="radio" name="past_medical_history[Cancer]" value="No"> No
        <input type="radio" name="past_medical_history[Cancer]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Cancer]" value="Yes"> Yes
    </label><br>
    <label>
    Eating disorder   :
        <input type="radio" name="past_medical_history[Eating_disorder]" value="No"> No
        <input type="radio" name="past_medical_history[Eating_disorder]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Eating_disorder]" value="Yes"> Yes
    </label><br>
    <label>
    Diabetes   :
        <input type="radio" name="past_medical_history[Diabetes]" value="No"> No
        <input type="radio" name="past_medical_history[Diabetes]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Diabetes]" value="Yes"> Yes
    </label><br>
    <label>
    Thyroid problem   :
        <input type="radio" name="past_medical_history[Thyroid_problem]" value="No"> No
        <input type="radio" name="past_medical_history[Thyroid_problem]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Thyroid_problem]" value="Yes"> Yes
    </label><br>
    <label>
    Breast disease   :
        <input type="radio" name="past_medical_history[Breast_disease]" value="No"> No
        <input type="radio" name="past_medical_history[Breast_disease]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Breast_disease]" value="Yes"> Yes
    </label><br>
    <label>
    High blood pressure   :
        <input type="radio" name="past_medical_history[High_blood_pressure]" value="No"> No
        <input type="radio" name="past_medical_history[High_blood_pressure]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[High_blood_pressure]" value="Yes"> Yes
    </label><br>
    <label>
    Shortness of breath   :
        <input type="radio" name="past_medical_history[Shortness_of_breath]" value="No"> No
        <input type="radio" name="past_medical_history[Shortness_of_breath]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Shortness_of_breath]" value="Yes"> Yes
    </label><br>
    <label>
    Heart disease/problem   :
        <input type="radio" name="past_medical_history[Heart_disease_problem]" value="No"> No
        <input type="radio" name="past_medical_history[Heart_disease_problem]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Heart_disease_problem]" value="Yes"> Yes
    </label><br>
    <label>
    Blood clots     :
        <input type="radio" name="past_medical_history[Blood_clots]" value="No"> No
        <input type="radio" name="past_medical_history[Blood_clots]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Blood_clots]" value="Yes"> Yes
    </label><br>
    <label>
    Liver disease      :
        <input type="radio" name="past_medical_history[Liver_disease]" value="No"> No
        <input type="radio" name="past_medical_history[Liver_disease]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Liver_disease]" value="Yes"> Yes
    </label><br>
    <label>
    Urinary tract infections in last year      :
        <input type="radio" name="past_medical_history[Urinary_tract_infections_in_last_year]" value="No"> No
        <input type="radio" name="past_medical_history[Urinary_tract_infections_in_last_year]" value="Not_Sure"> Not Sure
        <input type="radio" name="past_medical_history[Urinary_tract_infections_in_last_year]" value="Yes"> Yes
    </label><br>

    <h2>Gyn History</h2>
    <label>
        Abnormal Pap Smear:
        <input type="radio" name="gyn_history[abnormal_pap_smear]" value="yes"> Yes
        <input type="radio" name="gyn_history[abnormal_pap_smear]" value="no"> No
    </label><br>
    <label>
        Abnormal periods:
        <input type="radio" name="gyn_history[abnormal_periods]" value="yes"> Yes
        <input type="radio" name="gyn_history[abnormal_periods]" value="no"> No
    </label><br>
    <label>
    Bartholin cyst:
        <input type="radio" name="gyn_history[Bartholin_cyst]" value="yes"> Yes
        <input type="radio" name="gyn_history[Bartholin_cyst]" value="no"> No
    </label><br>
    <label>
    Gynecological cancer:
        <input type="radio" name="gyn_history[Gynecological_cancer]" value="yes"> Yes
        <input type="radio" name="gyn_history[Gynecological_cancer]" value="no"> No
    </label><br>
    <label>
    Endometriosis:
        <input type="radio" name="gyn_history[Endometriosis]" value="yes"> Yes
        <input type="radio" name="gyn_history[Endometriosis]" value="no"> No
    </label><br>
    <label>
    Fibroids:
        <input type="radio" name="gyn_history[Fibroids]" value="yes"> Yes
        <input type="radio" name="gyn_history[Fibroids]" value="no"> No
    </label><br>
    <label>
    Fibroids:
        <input type="radio" name="gyn_history[Fibroids]" value="yes"> Yes
        <input type="radio" name="gyn_history[Fibroids]" value="no"> No
    </label><br>
    <label>
    Ovarian cysts:
        <input type="radio" name="gyn_history[Ovarian_cysts]" value="yes"> Yes
        <input type="radio" name="gyn_history[Ovarian_cysts]" value="no"> No
    </label><br>
    <label>
    Prolapse:
        <input type="radio" name="gyn_history[Prolapse]" value="yes"> Yes
        <input type="radio" name="gyn_history[Prolapse]" value="no"> No
    </label><br>
    <label>
    Urinary incontinence:
        <input type="radio" name="gyn_history[Urinary_incontinence]" value="yes"> Yes
        <input type="radio" name="gyn_history[Urinary_incontinence]" value="no"> No
    </label><br>
    <label>
    Infertility:
        <input type="radio" name="gyn_history[Infertility]" value="yes"> Yes
        <input type="radio" name="gyn_history[Infertility]" value="no"> No
    </label><br>
 

    <h2>Family History</h2>
    <label>
        Clotting disorder:
        <input type="radio" name="family_history[clotting_disorder]" value="No"> No
        <input type="radio" name="family_history[clotting_disorder]" value="Sure"> Sure
        <input type="radio" name="family_history[clotting_disorder]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[clotting_disorder]">
    </label><br>
    <label>
    Breast disease :
        <input type="radio" name="family_history[breast_disease]" value="No"> No
        <input type="radio" name="family_history[breast_disease]" value="Sure"> Sure
        <input type="radio" name="family_history[breast_disease]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[breast_disease]">
    </label><br>
    <label>
    Breast cancer in female relative :
        <input type="radio" name="family_history[breast_cancer_in_female_relative]" value="No"> No
        <input type="radio" name="family_history[breast_cancer_in_female_relative]" value="Sure"> Sure
        <input type="radio" name="family_history[breast_cancer_in_female_relative]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[breast_cancer_in_female_relative]">
    </label><br>
    <label>
    GYN cancer :
        <input type="radio" name="family_history[gyn_cancer]" value="No"> No
        <input type="radio" name="family_history[gyn_cancer]" value="Sure"> Sure
        <input type="radio" name="family_history[gyn_cancer]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[gyn_cancer]">
    </label><br>
    <label>
High blood pressure :
        <input type="radio" name="family_history[high_blood_pressure]" value="No"> No
        <input type="radio" name="family_history[high_blood_pressure]" value="Sure"> Sure
        <input type="radio" name="family_history[high_blood_pressure]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[high_blood_pressure]">
    </label><br>
    <label>
    Stroke :
        <input type="radio" name="family_history[stroke]" value="No"> No
        <input type="radio" name="family_history[stroke]" value="Sure"> Sure
        <input type="radio" name="family_history[stroke]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[stroke]">
    </label><br>
    <label>
    Blood clots :
        <input type="radio" name="family_history[blood_clots]" value="No"> No
        <input type="radio" name="family_history[blood_clots]" value="Sure"> Sure
        <input type="radio" name="family_history[blood_clots]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[blood_clots]">
    </label><br>
    <label>
    Osteoporosis :
        <input type="radio" name="family_history[osteoporosis]" value="No"> No
        <input type="radio" name="family_history[osteoporosis]" value="Sure"> Sure
        <input type="radio" name="family_history[osteoporosis]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[osteoporosis]">
    </label><br>
    <label>
    Heart attack before age 50 in immediate family :
        <input type="radio" name="family_history[heart_attack_before_age_50_in_immediate_family]" value="No"> No
        <input type="radio" name="family_history[heart_attack_before_age_50_in_immediate_family]" value="Sure"> Sure
        <input type="radio" name="family_history[heart_attack_before_age_50_in_immediate_family]" value="Yes"> Yes
        Who: <input type="text" name="family_history_details[heart_attack_before_age_50_in_immediate_family]">
    </label><br>
  

    <h2>Sexual History</h2>
    <label>
        Have you ever been sexually active?
        <input type="radio" name="sexual_history[sexually_active]" value="No"> No
        <input type="radio" name="sexual_history[sexually_active]" value="Yes"> Yes
    </label><br>
    <label>
        If yes, date of first intercourse or genital contact: 
        <input type="date" name="sexual_history[first_intercourse_date]">
    </label><br>
    <label>
        Do you / have you had sex with:
        <input type="checkbox" name="sexual_history[sex_with_men]" value="Men"> Men
        <input type="checkbox" name="sexual_history[sex_with_women]" value="Women"> Women
    </label><br>
    <label>
        Have you ever been in a relationship where you have been threatened or harmed in any way?
        <input type="radio" name="sexual_history[threatened_harmed]" value="No"> No
        <input type="radio" name="sexual_history[threatened_harmed]" value="Yes"> Yes
    </label><br>
    <label>
        Condom/dental dam protection:
        <input type="checkbox" name="sexual_history[protection_always]" value="Always"> Always
        <input type="checkbox" name="sexual_history[protection_sometimes]" value="Sometimes"> Sometimes
        <input type="checkbox" name="sexual_history[protection_never]" value="Never"> Never
    </label><br>
    <label>
        Have you or any of your partners been at increased risk for HIV infection?
        <input type="radio" name="sexual_history[hiv_risk]" value="No"> No
        <input type="radio" name="sexual_history[hiv_risk]" value="Yes"> Yes
    </label><br>
    <label>
        Have you had unprotected sex (no condoms) since your last menstrual period?
        <input type="radio" name="sexual_history[unprotected_sex]" value="No"> No
        <input type="radio" name="sexual_history[unprotected_sex]" value="Yes"> Yes
    </label><br>
    <label>
        Any missed birth control pills?
        <input type="radio" name="sexual_history[missed_birth_control]" value="No"> No
        <input type="radio" name="sexual_history[missed_birth_control]" value="Yes"> Yes
    </label><br>
    <label>
        Plan B taken in the last year?
        <input type="radio" name="sexual_history[plan_b_last_year]" value="No"> No
        <input type="radio" name="sexual_history[plan_b_last_year]" value="Yes"> Yes
    </label><br>
    <label>
        Are you currently using contraception?
        <input type="radio" name="sexual_history[using_contraception]" value="No"> No
        <input type="radio" name="sexual_history[using_contraception]" value="Yes"> Yes
        Type: <input type="text" name="sexual_history_details[contraception_type]">
    </label><br>
    <label>
        Any previously used contraceptive method?
        <input type="text" name="sexual_history_details[previous_contraception_method]">
    </label><br>
    <label>
        Any other health care concerns you would like to discuss?
        <input type="radio" name="sexual_history[health_care_concerns]" value="No"> No
        <input type="radio" name="sexual_history[health_care_concerns]" value="Yes"> Yes
        List: <textarea name="sexual_history_details[concerns_list]" rows="4" cols="50"></textarea>
    </label><br>

    <h2>Menstrual History</h2>
    <label>
        Age at first period:
        <input type="number" name="menstrual_history[first_period_age]" min="1">
    </label><br>
    <label>
        If your menstrual periods are regular; periods start every:
        <input type="number" name="menstrual_history[regular_period_days]" min="1">
    </label><br>
    <label>
        If your menstrual periods are irregular; periods start every:
        <input type="number" name="menstrual_history[irregular_period_days_min]" min="1">
        to <input type="number" name="menstrual_history[irregular_period_days_max]" min="1">
    </label><br>
    <label>
        Duration of bleeding:
        <input type="number" name="menstrual_history[bleeding_duration]" min="1">
    </label><br>
    <label>
        Does bleeding or spotting occur between periods?
        <input type="radio" name="menstrual_history[bleeding_between_periods]" value="Yes"> Yes
        <input type="radio" name="menstrual_history[bleeding_between_periods]" value="No"> No
    </label><br>
    <label>
        Does bleeding or spotting occur after intercourse?
        <input type="radio" name="menstrual_history[bleeding_after_intercourse]" value="Yes"> Yes
        <input type="radio" name="menstrual_history[bleeding_after_intercourse]" value="No"> No
    </label><br>
    <label>
        First day of last menstrual period:
        <input type="date" name="menstrual_history[last_period_date]">
    </label><br>
    <label>
        Is pain associated with periods?
        <input type="radio" name="menstrual_history[pain_associated]" value="Yes"> Yes
        <input type="radio" name="menstrual_history[pain_associated]" value="No"> No
        Occasionally: <input type="radio" name="menstrual_history[pain_associated_occasionally]" value="Yes"> Yes
    </label><br>
    <label>
        If yes to pain, is it before menses, during menses, or both?
        <input type="checkbox" name="menstrual_history[pain_before_menses]" value="Before_menses"> Before menses
        <input type="checkbox" name="menstrual_history[pain_during_menses]" value="During_menses"> During menses
        <input type="checkbox" name="menstrual_history[pain_both]" value="Both"> Both
    </label><br>

    <h2>Pregnancy History</h2>
    <label>
        Number of pregnancies:
        <input type="number" name="pregnancy_history[number_of_pregnancies]" min="0">
    </label><br>
    <label>
        Number of live births:
        <input type="number" name="pregnancy_history[number_of_live_births]" min="0">
    </label><br>
    <label>
        Number of miscarriages:
        <input type="number" name="pregnancy_history[number_of_miscarriages]" min="0">
    </label><br>
    <label>
        Number of abortions:
        <input type="number" name="pregnancy_history[number_of_abortions]" min="0">
    </label><br>
    <label>
        Are you currently pregnant?
        <input type="radio" name="pregnancy_history[currently_pregnant]" value="No"> No
        <input type="radio" name="pregnancy_history[currently_pregnant]" value="Yes"> Yes
    </label><br>

    <h2>Pap Smear/Mammogram History</h2>
    <label>
        Date of last pap smear:
        <input type="date" name="pap_mammogram_history[last_pap_smear_date]">
    </label><br>
    <label>
        Have you had abnormal pap smears?
        <input type="radio" name="pap_mammogram_history[abnormal_pap_smears]" value="No"> No
        <input type="radio" name="pap_mammogram_history[abnormal_pap_smears]" value="Yes"> Yes
        Cryotherapy: <input type="checkbox" name="pap_mammogram_history[treatment_cryotherapy]">
        Laser: <input type="checkbox" name="pap_mammogram_history[treatment_laser]">
        Cone Biopsy: <input type="checkbox" name="pap_mammogram_history[treatment_cone_biopsy]">
    </label><br>
    <label>
        Date of last mammogram:
        <input type="date" name="pap_mammogram_history[last_mammogram_date]">
    </label><br>
    <label>
        Have you had an abnormal mammogram?
        <input type="radio" name="pap_mammogram_history[abnormal_mammogram]" value="No"> No
        <input type="radio" name="pap_mammogram_history[abnormal_mammogram]" value="Yes"> Yes
    </label><br>

    <h2>Doctor's Notes</h2>
    <label>
        Notes: <textarea name="doctor_notes" rows="4" cols="50"></textarea>
    </label><br>

    <input type="submit" value="Save">

</form>

</body>
</html>