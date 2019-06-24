<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Tutorial Membuat Ajax Request Page On Modal Dengan Codeigniter</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
   </head>
<body>
    <div class="container">
        <h3>Daftar User</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user=$this->ajaxmodal_model->userGetAll();
                foreach ($user as $key => $value) {
                    echo ' <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value['nama'].'</td>
                        <td><a class="btn btn-primary" data-toggle="modal" onclick="showuserdetail('.$value['id'].')" href="#modal_userDetail">Detail</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>       
        <div class="modal fade" id="modal_userDetail">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Detail User</h4>
                    </div>
                    <div class="modal-body" id="bodymodal_userDetail">
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <script>
            function showuserdetail(id)
            {
                $.ajax({
                    type: "post",
                    url: "<?=site_url('ajaxmodal/srvLoad_usergetbyid');?>",
                    data: "id="+id,
                    dataType: "html",
                    success: function (response) {
                        $('#bodymodal_userDetail').empty();
                        $('#bodymodal_userDetail').append(response);
                    }
                });
            }
        </script>
   </div>
</body>
</html>