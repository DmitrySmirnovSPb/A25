$(document).ready(function() {
    $( ".form > button:nth-child(6)" ).click(function(){
        var name = $( '.form > p[type = "Имя:"] > input' ).val();
        var phone = $( '.form > p[type = "Телефон:"] > input' ).val();
        var email = $( '.form > p[type = "Email:"] > input' ).val();
        var message = $( '.form > p[type = "Вопрос:"] > input' ).val();
    /* Регулярное выражение для e-mail */
        var templateMail = '[a-zA-Zа-яА-ЯёЁ_\\d][-a-zA-Zа-яА-ЯёЁ0-9_\\.\\d]*\\@[a-zA-Zа-яА-ЯёЁ\\d][-a-zA-Zа-яА-ЯёЁ\\.\\d]*\\.[a-zA-Zа-яА-Я]{2,6}';
        var templatePhone = '(8|7|\\+7){0,1}[- \\\\(]{0,}([9][0-9]{2})[- \\\\)]{0,}(([0-9]{2}[-\n]{0,}[0-9]{2}[- ]{0,}[0-9]{3})|([0-9]{3}[- ]{0,}[0-9]{2}[- ]{0,}[0-9]{2})|([0-9]{3}[-\n]{0,}[0-9]{1}[- ]{0,}[0-9]{3})|([0-9]{2}[- ]{0,}[0-9]{3}[- ]{0,}[0-9]{2}))';
        var errorForm = '';
        if(IsValid(templatePhone, phone)){
            if(IsValid(templateMail, email)){
                $.post('/functions/ajax_3.php', {name: name, phone: phone, email: email, message: message}, function(data){
                    alert(data);
                });
            }
            else{
                errorForm += 'Не валидный формат e-mail';
            }
        }
        else{
            errorForm += 'Не валидный формат номера телефона\n';
        }
        if(errorForm != ''){
            alert(errorForm);
        }
    });
    
});

function IsValid(template, data){
    var pattern = new RegExp("^"+template+"$","i");
    if (pattern.test(data)) {
        return true;
    }
    else {
        false
    }
}