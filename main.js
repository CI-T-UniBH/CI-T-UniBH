window.addEventListener('load', () => {
    const form = document.querySelector("#form-nova-tarefa");
    const input = document.querySelector("#input-nova-tarefa");

    // Setup - add a text input to each footer cell
    $('#tabela tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
    } );
    $('#tabela').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "Não foi localizado nenhum registro.",
                "info": "Mostrando registros de _START_ até _END_ de um total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros de 0 até 0 de um total de 0 registros",
                "infoFiltered": "(filtrado de um total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast":"Último",
                    "sNext":"Próximo",
                    "sPrevious": "Anterior"
                 },
                 "sProcessing":"Processando...",
            },
            'dom': 'Bfrtip',
            'buttons': [
                { extend: 'copy', text: 'Copiar a tabela' },
                { extend: 'csv', text: 'CSV' },
                { extend: 'excel', text: 'Excel' },
                { extend: 'print', text: 'Imprimir' },
            ]
    });  

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        
        var formData = new FormData();    
        formData.append( 'tarefa', input.value );

        /*
        if(listCheckBox.value == 'Category'){
            $.ajax({
                url:"src/buscaCategoria.php",
                method:"POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    alert(data);
                }
            });
        } else if(listCheckBox.value == 'Question'){
            $.ajax({
                url:"src/buscaQuestao.php",
                method:"POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data){
                    alert(data);
                }
            });
        } else if(listCheckBox.value == 'User'){
            alert("API não disponibilizada.");
        } else{
            alert('Argumento inválido.');
        }
        */
        $.ajax({
            url:"src/inserirTarefa.php",
            method:"POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    });
});