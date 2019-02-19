function userEdit(idUser){
    var form_data = new FormData();

    form_data.append("idUser", idUser);

    $.ajax({
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        url: '../php/functionPost.php',
        data: form_data,
        beforeSend: function () {
            
        },
        success: function(msg) {
            if(msg != 'nok'){
                //$('.msgChangePass').html('<div class="alert alert-success alert-dismissable col-md-10 col-md-offset-1 "><button type="button" class="close" data-dismiss="alert"><strong>&times;</strong></button>Registros actualizados <strong>exitosamente</strong>.</div>');
                $("#userEditModal").load(" #userEditModal");
            }else{
                //$('.msgChangePass').html('<div class="alert alert-danger alert-dismissable col-md-10 col-md-offset-1 "><button type="button" class="close" data-dismiss="alert"><strong>&times;</strong></button><strong>¡Error!</strong> Ocurrio un problema al guardar.</div>');
                console.log('Error Edit User: ' +msg);
            }
                
        },
        error: function(jqXHR,error, errorThrown) {  
           if(jqXHR.status && jqXHR.status==400){
                console.log(jqXHR); 
           }else{
               console.log("Something went wrong");
            }
        }

    });

}

function userUpdt(idUser){

    var form_data = new FormData(); 
    var email = $('#email').val();
    var address = $('#address').val(); 
    var phone = $('#phone').val();
    var name = $('#name').val();
    var city = $('#city').val();
    var postcode = $('#postcode').val(); 
    var password = $('#password').val();
    var passwordC = $('#passwordC').val();

    form_data.append("email", email);    
    form_data.append("address", address);   
    form_data.append("phone", phone);   
    form_data.append("city", city);
    form_data.append("name", name);       
    form_data.append("postcode", postcode);
    form_data.append("password", password);
    form_data.append("passwordC", passwordC); 
    form_data.append("idUserU", idUser);

    $.ajax({
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        url: '../php/functionPost.php',
        data: form_data,
        beforeSend: function () {               
        },
        success: function(msg) {
            if(msg == 'ok'){
                $("#data-table-basic").load(" #data-table-basic");
                $('.userEditModal').modal('toggle');
            }else{
                //$('.msgChangePass').html('<div class="alert alert-danger alert-dismissable col-md-10 col-md-offset-1 "><button type="button" class="close" data-dismiss="alert"><strong>&times;</strong></button><strong>¡Error!</strong> Ocurrio un problema al guardar.</div>');
                console.log('Error Update User: ' +msg);
            }
                
        }
    });
}

function userDel(idUser){

    var form_data = new FormData();    
    form_data.append("idUserD", idUser);    

    $.ajax({
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        url: '../php/functionPost.php',
        data: form_data,
        beforeSend: function () {              
        },
       success: function(msg) {
            if(msg == 'ok'){
                $("#data-table-basic").load(" #data-table-basic");
            }else{
                console.log('Error Delete User: ' +msg);
            }
                
        }
    });

}