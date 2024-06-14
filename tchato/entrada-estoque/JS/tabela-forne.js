document.addEventListener("DOMContentLoaded", tabela_fono);
// window.addEventListener("load", tabela_fono);
function tabela_fono(){
    $(document).ready(function(){
        $.ajax({
            type: 'POST',
            url: './PHP/tabela-forne.php',
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            success: function(data){
                data == false ? alert('nenhum usuario encontrado') : exibir_fono(data);
            }

        });
    });
}

function exibir_fono(data){
    
    t = $('#forne');
    
    data.forEach(function(e){
        var table = "<option value='" + e['cod'] + "'>" + e['nome'] + "</option>";
        t.append(table); 
    })
}