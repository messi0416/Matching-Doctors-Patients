<?php 

define('TITLE', "DEVIS");
include "../layouts/header.php";
check_logged_in();
// check_verified();
include "../layouts/navbar.php";
mysqli_close($conn);
include "../php/functions.php";


?>
<script src="https://cdn.tiny.cloud/1/twu1q50vokw3bsl0tdqxta9xx0d7waoedqwa50qcg1cwi6v4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '.textarea',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export pagebreak formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    toolbar: 'print undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | align lineheight indent | table addcomment showcomments | spellcheckdialog a11ycheck typography | link image media mergetags | checklist numlist bullist outdent | emoticons charmap | removeformat ',
    height: 500,
    skin: 'material-outline',
    statusbar: false,
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
    ],
    indentation: '10pt',
    content_css: '../css/textarea.css',
    file_picker_types: 'file image media'
    });
</script>

<div class="container-fluid">
    <div style="display: none;">
        <?php
            $conn = connectDB();
            $partner = Read_record($conn, "register_partenaire", "");
            $patient = Read_record($conn, "register_patient", ""); 
            foreach($patient as $row) {
                echo"<div id='patient_".$row['id']."'>";
                for ($i=0; $i < 19; $i++) {
                    echo"<p>".$row[$i]."</p>";
                }
                echo"</div>";
            }
            foreach($partner as $row) {
                echo"<div id='partner_".$row['id']."'>";
                for ($i=0; $i < 12; $i++) {
                    echo"<p>".$row[$i]."</p>";
                }
                echo"</div>";
            }
        ?>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
                <label for="patient-select">Patient</label>
                <select class="form-control" id="patient-select">
                    <option selected value=""></option>
                <?php
                foreach($patient as $row) {
                    echo "<option value='".$row['id']."'>".$row['lastname']." ".$row['firstname']."</option>";
                }
                ?>
                </select>
        </div>
        
        <div class="form-group col-md-4">
            <label for="date-input">Input Date</label>
            <input class="form-control" type="date" id="date-input">
        </div>
    </div>    
    <div class="row">
        <div class="form-group col-md-4">
            <label for="doctor-select">Doctor</label>
            <select class="form-control partner-select" id="doctor-select">
                <option selected value=""></option>
            <?php
            foreach($partner as $row) {
                if($row['Metier'] == 'Médecin') {
                    echo "<option value='".$row['id']."'>".$row['lastname']." ".$row['firstname']."</option>";
                }
            }
            ?> 
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="insurance-doctor-select">Insurance Doctor</label>
            <select class="form-control partner-select" id="insurance-doctor-select">
                <option selected value=""></option>
            <?php
            foreach($partner as $row) {
                if($row['Metier'] == 'Médecin Assurance') {
                    echo "<option value='".$row['id']."'>".$row['lastname']." ".$row['firstname']."</option>";
                }
            }
            ?>                
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="lawyer-select">Lawyer</label>
            <select class="form-control partner-select" id="lawyer-select">
                <option selected value=""></option>
            <?php
            foreach($partner as $row) {
                if($row['Metier'] == 'Avocat') {
                    echo "<option value='".$row['id']."'>".$row['lastname
                    ']." ".$row['firstname']."</option>";
                }
            }
            ?> 
            </select>
        </div>
    </div>
    
        <div class="form-check">
            </br></br>
            <input class="form-check-input" type="checkbox" value="" id="quote-valid-check">
            <label class="form-check-label" for="quote-valid-check">
                Quote Validated
            </label>
        </div>
    
    
    </br></br>
    <div class="space"></div> <!-- Some space -->
    <div style="outline: solid; margin-bottom: 3rem;">
        <h5>Quote Type</h5>
        <form>
            <div class="row">
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="report_radio" id="check_1">
                    <label class="form-check-label" for="check-1">
                        Bilan situationnel accident
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="report_radio" id="check_2">
                    <label class="form-check-label" for="check-2">
                        Bilan situationnel travail
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio"  name="report_radio" id="check_3">
                    <label class="form-check-label" for="check-3">
                        Expertise contradictoire accident
                    </label>
                </div>
            </div>
            <div class="form-group col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="report_radio" id="check_4">
                    <label class="form-check-label" for="check-4">
                    Expertise contradictoire médicale
                    </label>
                </div>
            </div>
            </div>
        </form>
    </div>
    
    <textarea class='textarea' id='tx_area_quote'>
        <h1>Quote</h1>
        <div style="display: flex; justify-content: space-between;">
            <div style="width: 45%;" id="editor_partner">
                <p class="p_intro"><strong>Partner Job: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner Name: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner ID: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner Email: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner Mobile: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner Phone: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Partner Address: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Place : <span class="span_intro">&nbsp;</span></strong></p>
                
            </div>
            <div style="width: 45%;" id="editor_patient">
                <p class="p_intro"><strong>Patient Name: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient ID: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient Email: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient Mobile: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient Phone: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient Address: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Patient Age: <span class="span_intro">&nbsp;</span></strong></p>
                <p class="p_intro"><strong>Type of Accident: <span class="span_intro">&nbsp;</span></strong></p>
            </div>
        </div>
        <p>
            <img id="img_check_1" src="../img/3.jpg">
            <img id="img_check_2" src="../img/medical.jpg">
            <img id="img_check_3" src="../img/pro2.jpg">
            <img id="img_check_4" src="../img/pro3.jpg">
        </p>
    </textarea >
    
    <div>
        <button type="submit" class="btn btn-primary btn-sm" style="float:right; margin:2rem !important;">Envoyer par mail</button>
        <!-- <button type="button" class="btn btn-primary export-pdf" style="float:right;">Export PDF</button> -->
    </div>        
</div>
<script>

$(document).ready(function() {
//     var select = document.getElementById("patient-select");

// select.addEventListener("change", function() {
//   var selectedOption = select.options[select.selectedIndex];
//   console.log("Selected option:", selectedOption.text);
// });
    $('#patient-select').change(function() {
        let selectedOption = $(this).find('option:selected');
        let select_id = "patient_" + selectedOption.val();
        let select_div = document.getElementById(select_id);
        let select_para = select_div.getElementsByTagName('p');
        let editor = tinymce.get('tx_area_quote');
        let patient_item = editor.dom.select('#editor_patient span');
        patient_item[0].setHTML(selectedOption.text());
        patient_item[1].setHTML(select_para[0].innerText);
        patient_item[2].setHTML(select_para[2].innerText);
        patient_item[3].setHTML(select_para[7].innerText);
        patient_item[4].setHTML(select_para[8].innerText);
        patient_item[5].setHTML(select_para[9].innerText);
        patient_item[6].setHTML(select_para[0].innerText);
        patient_item[7].setHTML(select_para[18].innerText);
    });

    $('.partner-select').change(function() {
        let selectedOption = $(this).find('option:selected');
        let select_id = "partner_" + selectedOption.val();
        let select_div = document.getElementById(select_id);
        let select_para = select_div.getElementsByTagName('p');
        let editor = tinymce.get('tx_area_quote');
        let partner_item = editor.dom.select('#editor_partner span');
        partner_item[0].setHTML(select_para[1].innerText);
        partner_item[1].setHTML(selectedOption.text());
        partner_item[2].setHTML(select_para[0].innerText);
        partner_item[3].setHTML(select_para[2].innerText);
        partner_item[4].setHTML(select_para[7].innerText);
        partner_item[5].setHTML(select_para[6].innerText);
        partner_item[6].setHTML(select_para[8].innerText);
        // partner_item[7].setHTML(select_para[0].innerText);
    });
    
    const editor = tinymce.get('tx_area_quote');
    const radioInputs = document.querySelectorAll('input[type="radio"]');
    radioInputs.forEach(input => {
        input.addEventListener('click', () => {
            let images = editor.dom.select('img');
            for (let i = 0; i < images.length; i++) {
                if (images[i].id === `img_${input.id}`) {
                images[i].style.display = 'block';
                } else {
                images[i].style.display = 'none';
                }
            }
        });
    });
    
});
</script>
<script src="../js/form_functions.js"></script>
<?php include "../layouts/footer.php"; ?>