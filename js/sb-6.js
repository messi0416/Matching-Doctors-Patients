//Export PDF using Dompdf
$("button.export-pdf").click(function(e) {
    e.preventDefault();
    var id = $(this).parents("form").attr('id');
    var data = readForm(id);
    $.ajax({
            url: "export_eachpage.php",
            type: "POST",
            data: { param: data } , 
            success: function(response) {
                const form = document.createElement('form');
                form.method = "post";
                form.action = "mypdf/index.php";
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = "render_data";
                hiddenField.value = response;
                const doc_name = document.createElement('input');
                doc_name.type = 'hidden';
                doc_name.name = "doc_name";
                doc_name.value = id;
                form.appendChild(hiddenField);
                form.appendChild(doc_name);
                document.body.appendChild(form);
                form.submit();
                
            },
            error: function(xhr, status, error) {
                // Handle the error
                console.log(error);
            }
    });
    $(this).closest("form")[0].submit();
});

//Read last updated date
$.post("record_fetch.php", { id: hidden_id, tbname: "reports" }, function(data, status){
        const record = JSON.parse(data);
        console.log(record);
        if (record.length == 0) {
            date = "";
            $("#read_data").hide();
        } else {
            var date = record[0].lastdate;
        }
        const text = "Last Consultation Date: " + date;
        $("#last_date").text(text);
        record_update(record[0], "main-content");
    });