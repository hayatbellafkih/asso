$(document).ready(function() {
    //alert('ready');


  $("#nvf").hide();
        $('#exf').hide();
    $("#ajouterTypeReunion").click(function() {
//        alert('click');
        $.ajax({
            type: 'get',
            url: 'ajouterTypereunion/' + $('#txt_ajouter_type').val(),
            beforeSend: function() {
//                alert('beforeSend');
            },
            success: function(data) {
                $('#tousTypes').append('<button class="button-lib">' + data.type + '</button>');
            }
        });
    });
    $("#cocherTous").click(function() {
        var a = document.getElementById('cocherTous');
        var mails = document.getElementsByName('mail');
        if (a.checked)
        {
            for (var i = 0; i < mails.length; i++) {
//            if ( mails[i].checked) {
//                $id= mails[i].id;
//                //idsAdherants
//            }
                mails[i].checked = true;
            }
        }
        else {
            for (var i = 0; i < mails.length; i++) {
//            if ( mails[i].checked) {
//                $id= mails[i].id;
//                //idsAdherants
//            }
                mails[i].checked = false;
            }
        }

    });
    $(".mail").click(function() {
        alert($(this).val());
    });
    $("#libs").click(function() {
        var data = [
            {text: 'foo', value: 'bar'},
            {text: 'foo', value: 'bar'}
        ];
        var select = document.getElementsByTagName('select')[0];
        select.options.length = 0; // clear out existing items
        for (var i = 0; i < data.length; i++) {
            var d = data[i];
            select.options.add(new Option(d.text, i))
        }
//        $.ajax({
//            type: 'get',
//            url: 'ajouterTypereunion/' + $('#txt_ajouter_type').val(),
//            beforeSend: function() {
////                alert('beforeSend');
//            },
//            success: function(data) {
//                $('#tousTypes').append('<button class="button-lib">' + data.type + '</button>');
//            }
//        });

    });
    //

//    $('#four').hide();
    $('#nouveauFournisseur').click(function() {
        $('#four').fadeIn();
    });

    $('#categoriesFournisseurs').change(function() {
        var select_fournisseurs = document.getElementById('fournisseurscharge');
        select_fournisseurs.options.length = 0; // clear out existing items
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: 'http://127.0.0.1/symfony%20-%20copie/web/app_dev.php/loadFournisseurs',
            success: function(data) {
                for (var i = 0; i < data.noms.length; i++) {
                    var d = data.noms[i];
                    select_fournisseurs.options.add(new Option(d.nom, i));
                }
            },
            data: {'categorie': 'النسخ'},
            error: function() {
            }}
        );
    }


    );

    $('#fournisseurExistant').click(function() {
        alert('');
        $("#nvf").hide();

        $('#exf').show();
    });
    $('#nouveauFournisseur').click(function() {
                alert('');

        $("#nvf").show();
        $('#exf').hide();

    });
});
