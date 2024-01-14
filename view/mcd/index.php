<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MCD TITAAAA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">

        </nav>
        <div id="message">
        </div>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-sm-9" style="">ANTRI MCD SOLO GRAND MALL</div>
                    <div class="col col-sm-3">
                        <a href="#" class="btn btn-success btn-sm float-end" id="generate" >Generate Simulasi</a>
                        <a href="#" class="btn btn-success btn-sm float-end" id="add_data" style="margin-right: 3px;">Add</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="sample_data">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Waktu Datang</th>
                                <th>Selisih Datang</th>
                                <th>Awal Layanan</th>
                                <th>Selisih Layanan</th>
                                <th>Waktu Selesai</th>
                                <th>Selisih Akhir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="action_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" id="sample_form">
                        <div class="modal-header">
                            <h5 class="modal-title" id="dynamic_modal_title"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Waktu Kedatangan</label>
                                <input type="text" name="waktu_datang" id="waktu_datang" class="form-control" />
                                <span id="waktu_datang_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Selisih Kedatangan</label>
                                <input type="selisih_datang" name="selisih_datang" id="selisih_datang" class="form-control" />
                                <span id="selisih_datang_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Awal Pelayanan</label>
                                <input type="awal_layanan" name="awal_layanan" id="awal_layanan" class="form-control" />
                                <span id="awal_layanan_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Selisih Pelayan</label>
                                <input type="selisih_layanan" name="selisih_layanan" id="selisih_layanan" class="form-control" />
                                <span id="selisih_layanan_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Waktu Selesai</label>
                                <input type="waktu_selesai" name="waktu_selesai" id="waktu_selesai" class="form-control" />
                                <span id="waktu_selesai_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Selisih Akhir</label>
                                <input type="selisih_akhir" name="selisih_akhir" id="selisih_akhir" class="form-control" />
                                <span id="selisih_akhir_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="Add" />
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="action_button">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="generate_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dynamic_modal_generate"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>MCD SOLO Grand Mall melakukan pelayanan konsumen gerai, dan berdasarkan data yang telah diambil dan 
                        tersedia pada table ada beberapa hal yang dapat disimpulkan diantaranya adalah sebagai berikut:</p>
                    <ul>
                        <li id="tingkat_keramaian"></li>
                        <li id="sdatang"></li>
                        <li id="slayanan"></li>
                        <li id="sakhir"></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            showAll();

            $('#add_data').click(function() {
                $('#dynamic_modal_title').text('Add Data Antri');
                $('#sample_form')[0].reset();
                $('#action').val('Add');
                $('#action_button').text('Add');
                $('.text-danger').text('');
                $('#action_modal').modal('show');
            });

            $('#generate').click(function() {
                $('#dynamic_modal_title_generate').text('Simpulan Simulasi Logika Fuzzy');
                $('.text-danger').text('');
                $('#generate_modal').modal('show');

                $.ajax({
                    type: "GET",
                    contentType: "application/json",
                    url: "http://localhost/ini_mcd/api/antrimcd/generate-by-avg.php",
                    success: function(response) {
                        if (
                            response.selisih_datang !== undefined &&
                            response.selisih_akhir !== undefined) {

                            $('#id').val(response.id);
                            $('#sdatang').append(response.selisih_datang);
                            $('#slayanan').append(response.selisih_layanan);
                            $('#sakhir').append(response.selisih_akhir);
                            $('#tingkat_keramaian').append(response.tingkat_keramaian);
                        } else {
                            console.error('Invalid or incomplete response:', response);
                        }
                    },
                    error: function(err) {
                        console.error('An error occurred:', err);
                    }
                });
            });


            $('#sample_form').on('submit', function(event) {
                event.preventDefault();
                if ($('#action').val() == "Add") {
                    var formData = {
                        'waktu_datang': $('#waktu_datang').val(),
                        'selisih_datang': $('#selisih_datang').val(),
                        'awal_layanan': $('#awal_layanan').val(),
                        'selisih_layanan': $('#selisih_layanan').val(),
                        'waktu_selesai': $('#waktu_selesai').val(),
                        'selisih_akhir': $('#selisih_akhir').val()
                    }

                    $.ajax({
                        url: "http://localhost/ini_mcd/api/antrimcd/create.php",
                        method: "POST",
                        data: JSON.stringify(formData),
                        success: function(data) {
                            $('#action_button').attr('disabled', false);
                            $('#message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#action_modal').modal('hide');
                            $('#sample_data').DataTable().destroy();
                            showAll();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                } else if ($('#action').val() == "Update") {
                    var formData = {
                        'id': $('#id').val(),
                        'waktu_datang': $('#waktu_datang').val(),
                        'selisih_datang': $('#selisih_datang').val(),
                        'awal_layanan': $('#awal_layanan').val(),
                        'selisih_layanan': $('#selisih_layanan').val(),
                        'waktu_selesai': $('#waktu_selesai').val(),
                        'selisih_akhir': $('#selisih_akhir').val()
                    }

                    $.ajax({
                        url: "http://localhost/ini_mcd/api/antrimcd/create.php",
                        method: "PUT",
                        data: JSON.stringify(formData),
                        success: function(data) {
                            $('#action_button').attr('disabled', false);
                            $('#message').html('<div class="alert alert-success">' + data + '</div>');
                            $('#action_modal').modal('hide');
                            $('#sample_data').DataTable().destroy();
                            showAll();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        function showAll() {
            $.ajax({
                type: "GET",
                contentType: "application/json",
                url: "http://localhost/ini_mcd/api/antrimcd/read.php",
                success: function(response) {
                    // console.log(response);
                    var json = response.body;
                    var dataSet = [];
                    for (var i = 0; i < json.length; i++) {
                        var sub_array = {
                            'no': i + 1,
                            'waktu_datang': json[i].waktu_datang,
                            'selisih_datang': json[i].selisih_datang,
                            'awal_layanan': json[i].awal_layanan,
                            'selisih_layanan': json[i].selisih_layanan,
                            'waktu_selesai': json[i].waktu_selesai,
                            'selisih_akhir': json[i].selisih_akhir,
                            'action': '<button onclick="deleteOne(' + json[i].id + ')" class="btn btn-sm btn-danger">Delete</button>'
                        };
                        dataSet.push(sub_array);
                    }
                    $('#sample_data').DataTable({
                        data: dataSet,
                        columns: [{
                                data: "no"
                            },
                            {
                                data: "waktu_datang"
                            },
                            {
                                data: "selisih_datang"
                            },
                            {
                                data: "awal_layanan"
                            },
                            {
                                data: "selisih_layanan"
                            },
                            {
                                data: "waktu_selesai"
                            },
                            {
                                data: "selisih_akhir"
                            },
                            {
                                data: "action"
                            }
                        ]
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function showOne(id) {
            $('#dynamic_modal_title').text('Edit Data');
            $('#sample_form')[0].reset();
            $('#action').val('Update');
            $('#action_button').text('Update');
            $('.text-danger').text('');
            $('#action_modal').modal('show');

            $.ajax({
                type: "GET",
                contentType: "application/json",
                url: "http://localhost/ini_mcd/api/antrimcd/read.php?id=" + id,
                success: function(response) {
                    $('#id').val(response.id);
                    $('#waktu_datang').val(response.waktu_datang);
                    $('#selisih_datang').val(response.selisih_datang);
                    $('#awal_layanan').val(response.awal_layanan);
                    $('#selisih_layanan').val(response.selisih_layanan);
                    $('#waktu_selesai').val(response.waktu_selesai);
                    $('#selisih_akhir').val(response.selisih_akhir).change();
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        function deleteOne(id) {
            alert('Yakin untuk hapus data ?');
            $.ajax({
                url: "http://localhost/ini_mcd/api/antrimcd/delete.php",
                method: "DELETE",
                data: JSON.stringify({
                    "id": id
                }),
                success: function(data) {
                    $('#action_button').attr('disabled', false);
                    $('#message').html('<div class="alert alert-success">' + data + '</div>');
                    $('#action_modal').modal('hide');
                    $('#sample_data').DataTable().destroy();
                    showAll();
                },
                error: function(err) {
                    console.log(err);
                    $('#message').html('<div class="alert alert-danger">' + err.responseJSON + '</div>');
                }
            });
        }
    </script>
</body>

</html>