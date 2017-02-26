$(document).ready(function() {
//    alert('ready');
alert('kkkk');
    $("#ajouterTypeReunion").click(function() {
        alert('click');
        $.ajax({
            type: 'get',
            url: 'ajouterTypereunion/' + $('#txt_ajouter_type').val(),
            beforeSend: function() {
                alert('beforeSend');
            },
            success: function(data) {
                $('#tousTypes').append('<button class="cancel">' + data.type + '</button>');
            }
        });
    });

    $("#cocherTous").click(function() {
        var mails = document.getElementsByName('mail');

        for (var i = 0; i < mails.length; i++) {
            if ( mails[i].checked) {
                $id= mails[i].id;
                alert($id);
                //idsAdherants
            }
            mails[i].checked = true;
        }
  });
});
