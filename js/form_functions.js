(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
})();

  
function record_update(record, formid) {
  const form = document.getElementById(formid);
  var inputs = form.getElementsByClassName('form-control');
  for (var i = 1; i<inputs.length; i++) {
      var input = inputs[i];
      
        for (const key in record) {
            if (input.name == key) {
                input.value = record[key];
            }
        }
       
  }
}

function filterOptions() {
  // Declare variables
  var input, filter, options, i, txtValue;
  input = document.getElementById('select-input');
  filter = input.value.toUpperCase();
  options = document.getElementById('options').getElementsByTagName('option');

  // Loop through all options and hide those that don't match the search query
  for (i = 0; i < options.length; i++) {
    txtValue = options[i].textContent || options[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      options[i].style.display = '';
    } else {
      options[i].style.display = 'none';
    }
  }
}

function search_names(tbname) {
    $('tr').show();
    const search_term = $('#search_term').val();
    if (search_term !="") {
      $.post("record_fetch.php", {
        id: "search",
        term: search_term,
        tbname: tbname
      }, function(data, status) {
        records = JSON.parse(data);
        if (records.length != 0) {
          const trs = $('tr');
          for (i=1; i<trs.length; i++) {
            if (!records.includes($(trs[i]).children('td').eq(1).text())) {
              $(trs[i]).hide();
            }
          }
        } else {
          $('tr').hide();
        }
      });
    } else {
      $('tr').show();
    }
    
}

function delete_item(tbname, deleteBtn, event) {
  event.preventDefault();
  // debugger;
  id = deleteBtn.attr('id');
  $('#delete-modal').modal('show');
  $('#confirm-delete-btn').on("click", function(){
    $.post("record_delete.php", { id: id, tbname: tbname }, function(data, status) {
      //console.log(data);
    });
    $('#delete-modal').modal('hide');
    deleteBtn.closest("tr").hide();
  });
}

