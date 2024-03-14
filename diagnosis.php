<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diagnosis</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        select, textarea {
            width: 100%;
            margin-bottom: 10px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Diagnosis</h2>

    <!-- Form for entering patient diagnosis -->
    <form action="process_diagnosis.php" method="post">
        <label>
            Select Diagnosis:
            <select name="selectedDiagnosis" required>
            <option value="Vaginitis">Vaginitis</option>
<option value="Cervicitis">Cervicitis</option>
<option value="Pelvic Inflammatory Disease (PID)">Pelvic Inflammatory Disease (PID)</option>
<option value="Endometriosis">Endometriosis</option>
<option value="Polycystic Ovary Syndrome (PCOS)">Polycystic Ovary Syndrome (PCOS)</option>
<option value="Uterine Fibroids">Uterine Fibroids</option>
<option value="Ovarian Cysts">Ovarian Cysts</option>
<option value="Menorrhagia">Menorrhagia</option>
<option value="Dysmenorrhea">Dysmenorrhea</option>
<option value="Premenstrual Syndrome (PMS)">Premenstrual Syndrome (PMS)</option>
<option value="Amenorrhea">Amenorrhea</option>
<option value="Irregular Menstrual Cycles">Irregular Menstrual Cycles</option>
<option value="Dyspareunia">Dyspareunia</option>
<option value="Vulvodynia">Vulvodynia</option>
<option value="Pelvic Organ Prolapse">Pelvic Organ Prolapse</option>
<option value="Gynecological Cancer">Gynecological Cancer</option>
<option value="Menopause">Menopause</option>
<option value="Osteoporosis">Osteoporosis</option>
<option value="Infertility">Infertility</option>
<option value="Ectopic Pregnancy">Ectopic Pregnancy</option>
<option value="Gestational Trophoblastic Disease (GTD)">Gestational Trophoblastic Disease (GTD)</option>
<option value="Recurrent Pregnancy Loss">Recurrent Pregnancy Loss</option>
<option value="Preeclampsia">Preeclampsia</option>
<option value="Placenta Previa">Placenta Previa</option>
<option value="Placental Abruption">Placental Abruption</option>
<option value="Gestational Diabetes">Gestational Diabetes</option>
<option value="Preterm Labor">Preterm Labor</option>
<option value="Postpartum Depression">Postpartum Depression</option>
<option value="Bacterial Vaginosis">Bacterial Vaginosis</option>
<option value="Yeast Infection (Candidiasis)">Yeast Infection (Candidiasis)</option>
<option value="Trichomoniasis">Trichomoniasis</option>
<option value="Genital Herpes">Genital Herpes</option>
<option value="Human Papillomavirus (HPV) Infection">Human Papillomavirus (HPV) Infection</option>
<option value="Syphilis">Syphilis</option>
<option value="Chlamydia">Chlamydia</option>
<option value="Gonorrhea">Gonorrhea</option>
<option value="HIV/AIDS">HIV/AIDS</option>
<option value="Cervical Dysplasia">Cervical Dysplasia</option>
<option value="Uterine Cancer">Uterine Cancer</option>
<option value="Ovarian Cancer">Ovarian Cancer</option>
<option value="Breast Cancer">Breast Cancer</option>
<option value="Pelvic Pain">Pelvic Pain</option>
<option value="Sexual Dysfunction">Sexual Dysfunction</option>
<option value="Hormone Imbalance">Hormone Imbalance</option>
<option value="Interstitial Cystitis">Interstitial Cystitis</option>
<option value="Female Sexual Arousal Disorder (FSAD)">Female Sexual Arousal Disorder (FSAD)</option>

            </select>
        </label>

        <label>
            Or Enter a Custom Diagnosis:
            <textarea name="customDiagnosis"></textarea>
        </label>

        <button type="submit">Submit Diagnosis</button>
    </form>

</body>
</html>