<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/f9eb3d869c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <title>JN2</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">JN2_Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Opções
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="https://github.com/AlexmarJr/JN2">Codigo no Git</a>
                <a class="dropdown-item" href="#">Another action</a>
              </div>
            </li>
          </ul>
        </div>
    </nav>
    <hr>

    <div class='container'>
        <button class="btn btn-primary" data-toggle="modal" data-target="#plateModal">Buscar Placa</button>
        <button class="btn btn-success float-right" onclick="openModal()">Adicionar Cliente</button>
    </div>

    <hr>
    <div class="container">
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Placa do Carro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>



    {{-- Modal Criação --}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-10">
                        <h5 class="modal-title" id="createModalLabel">Dados do Cliente</h5>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary float-right" onclick="openInputs()">Editar</i></button>
                    </div>
                </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id='id'>
                    <div class="col-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Nome</span>
                        </div>
                        <input type="text" class="form-control" id="name"  aria-describedby="basic-addon1">
                    </div>

                    <div class="col-6 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Tel</span>
                        </div>
                        <input type="text" class="form-control phone" id="phone"  aria-describedby="basic-addon1">
                    </div>

                    <div class="col-6 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">CPF</span>
                        </div>
                        <input type="text" class="form-control" id="document"  aria-describedby="basic-addon1">
                    </div>

                    <div class="col-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Placa do Carro</span>
                        </div>
                        <input type="text" class="form-control" id="license_plate"  aria-describedby="basic-addon1" maxlength="7">
                    </div>

                  
                </div>
            </div>

            <p class="missing-error" id='missing'>Preencha todos os campos</p>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="button" class="btn btn-success" onclick="saveClient()" id='save_btn'>Salvar Cliente</button>
              <button type="button" class="btn btn-primary" onclick="updateClient()" id='update_btn' style="display: none">Atualizar Cliente</button>
            </div>
          </div>
        </div>
      </div>

    {{-- Modal busca de placa --}}
    <div class="modal fade" id="plateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Buscar Final da placa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="col-12 input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">4 ultimos numero da Placa</span>
                    </div>
                    <input type="text" class="form-control" id="license_plate_search"  aria-describedby="basic-addon1" maxlength="4">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="searchPlate()">Buscar</button>
            </div>
        </div>
        </div>
    </div>

</body>
</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $("#document").mask("999.999.999-99");
        $("#phone").mask("(99) 99999-999?9");
    });

    $(function() {
        var regExp = /[a-z]/i;
        $('#license_plate_search').on('keydown keyup', function(e) {
            var value = String.fromCharCode(e.which) || e.key;

            // No letters
            if (regExp.test(value)) {
                e.preventDefault();
                return false;
            }
        });
    });

    function getRecords(filter) {
            let url = "api/client";

            $.ajax({
                url: url,
                type: "get",
                dataType: 'json',
                success: function (data) {
                    var s = '';
                    var html = '';
                    data.forEach(function(row){
                        html += '<tr>'
                        html += '<td>' + row.name + '</td>'
                        html += '<td>' + row.document + '</td>'
                        html += '<td>' + row.phone + '</td>'
                        html += '<td>' + row.license_plate + '</td>'
                        html += '<td>'
                        html +=  '<button class="edit" onclick="show('+ row.id +')">  <i class="fa fa-eye"></i> </button> &nbsp'
                        html +=  '<button class="delete" onclick="destroy('+ row.id +')">  <i class="fa fa-trash"></i> </button>'
                        html += '</td> </tr>';
                    })
                    $('#datatable').DataTable().destroy();
                    $('#datatable tbody').html(html);
                    $('#datatable').DataTable( {
                        "info":     false,
                        responsive: true,
                        "language": {
                            "sSearch":        "Buscar:",
                            "sLengthMenu":    "Mostrar _MENU_ Registros",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":    "Último",
                                "sNext":    "Proximo",
                                "sPrevious": "Anterior"
                            },
                            dom: 'Bfrtip',
                            buttons: ['excel', 'pdf']
                        }
                    });
                }
            })
        }
    getRecords()

    function saveClient(){
        if(
            $("#name").val() == '' ||
            $("#document").val() == '' ||
            $("#phone").val() == '' ||
            $("#license_plate").val() == '' 
        ) {
            $("#missing").css("display", "block"); 
            return;
        }
        else {
            $("#missing").css("display", "none"); 
        }
        $.ajax({
                type: 'POST',
                url: "api/client",
                data: {
                    'name':  $("#name").val(),
                    'document':  $("#document").val(),
                    'phone':  $("#phone").val(),
                    'license_plate':  $("#license_plate").val(),
                },
                success: function() {
                    swal.fire('Registro Efetuado', '', 'success');
                    $('#name').val('');
                    $('#document').val('');
                    $('#phone').val('');
                    $('#license_plate').val('');
                    $('#createModal').modal('hide');
                    getRecords();
                },
            });
    }

    function updateClient(){
        $.ajax({
                type: 'PUT',
                url: "api/client/" + $("#id").val(),
                data: {
                    'name':  $("#name").val(),
                    'document':  $("#document").val(),
                    'phone':  $("#phone").val(),
                    'license_plate':  $("#license_plate").val(),
                },
                success: function() {
                    swal.fire('Atualização Efetuada', '', 'success');
                    $('#name').val('');
                    $('#document').val('');
                    $('#phone').val('');
                    $('#license_plate').val('');
                    $('#createModal').modal('hide');
                    getRecords();
                },
            });
    }

    function show(id){
            $.ajax({
                url:"/api/client/" + id,
                type: "get",
                dataType: 'json',
                    success: function (response) {
                        $('#id').val(response.id);
                        $('#name').val(response.name);
                        $('#document').val(response.document);
                        $('#phone').val(response.phone);
                        $('#license_plate').val(response.license_plate);

                        $('#name').attr('disabled', 'disabled');
                        $('#document').attr('disabled', 'disabled');
                        $('#phone').attr('disabled', 'disabled');
                        $('#license_plate').attr('disabled', 'disabled');
                        $('#update_btn').attr('disabled', 'disabled');

                        $("#update_btn").css("display", "block");
                        $("#save_btn").css("display", "none");
                        $("#edit_btn").css("display", "block");
                        $('#createModal').modal('show');
                    }
            })
    }

    function destroy(id){
        Swal.fire({
                title: 'Voce tem certeza que deseja Excluir?',
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: `Apagar!`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                        url:"/api/client/" + id,
                        type: "delete",
                        dataType: 'json',
                            success: function (response) {
                                Swal.fire('Excluido!', '', 'error');
                                getRecords();
                            }
                    })
                } 
            })
    }

    function openModal(){
        $('#name').val('');
        $('#document').val('');
        $('#phone').val('');
        $('#license_plate').val('');
        $("#update_btn").css("display", "none");
        $("#save_btn").css("display", "block");
        $('#createModal').modal('show');
    }

    function openInputs(){
        $('#name').removeAttr('disabled', 'disabled');
        $('#document').removeAttr('disabled', 'disabled');
        $('#phone').removeAttr('disabled', 'disabled');
        $('#license_plate').removeAttr('disabled', 'disabled');
        $('#update_btn').removeAttr('disabled', 'disabled');
    }

    function searchPlate(){
        let url = 'api/consulta/final-placa/' + $("#license_plate_search").val();
        $('#plateModal').modal('hide');
        $("#license_plate_search").val('');

        $.ajax({
            url: url,
            type: "get",
            dataType: 'json',
            success: function (data) {

                var s = '';
                var html='';
                data.forEach(function(row){
                    html += '<tr>'
                    html += '<td>' + row.name + '</td>'
                    html += '<td>' + row.document + '</td>'
                    html += '<td>' + row.phone + '</td>'
                    html += '<td>' + row.license_plate + '</td>'
                    html += '<td>'
                    html +=  '<button class="edit" onclick="show('+ row.id +')">  <i class="fa fa-eye"></i> </button> &nbsp'
                    html +=  '<button class="delete" onclick="destroy('+ row.id +')">  <i class="fa fa-trash"></i> </button>'
                    html += '</td> </tr>';
                })
                $('#datatable').DataTable().destroy();
                $('#datatable tbody').html(html);
                $('#datatable').DataTable({
                    responsive: true,
                    paging: true,
                    searching: true,
                    info: false,
                    dom: 'Bfrtip',
                    buttons: ['excel', 'pdf']
                });
            }
        })
    }
</script>

<style>
    .edit{
        border: none;
        background-color: white;
        font-size: 30px;
        color: blue
    }

    .delete{
        border: none;
        background-color: white;
        font-size: 30px;
        color: red
    }

    .missing-error{
        color: red;
        font-size: 18px;
        text-align: center;
        display: none;
    }
</style>