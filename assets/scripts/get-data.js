// Consulta dos dados via AJAX

$(".dashboard-stat").click(function () {
    const boxDataSelect = $(this).find('.desc').text().trim();
    const dataQuerySelectFormated = 'dados' + boxDataSelect.normalize("NFD").replace(/[\u0300-\u036f]/g, "");

    
    if(boxDataSelect != ''){

        $.ajax({
            type: 'GET',
            url: 'DataHandler.php',
            data: {id: dataQuerySelectFormated},
            dataType: 'json',
            success: function(data){

                let tableBodyContent = '';


                $.each(data, function(index){

                    const { nome, cpf, endereco = '-----', telefone = '-----', email } = data[index];

                    tableBodyContent += `

                    <tr>
                        <td>${index + 1}</td>
                        <td>${nome}</td>
                        <td>${cpf}</td>
                        <td>${endereco}</td>
                        <td>${telefone}</td>
                        <td>${email}</td>
                    </tr>
    
                    `;

                });

                $('#portlet-body-tbody').html(tableBodyContent);
                $(".portlet.box").show();

            }
        });

    }else{
        alert('não há dados para serem mostrados.');
    }

});