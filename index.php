<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
  <h2>Convert File To Hex</h2>
      <form action="/action_page.php">
          <div class="form-group">
            <label for="email">Select File</label>
            <input type="file" onChange="chkFile(this)"  id="file" >
          </div>

          <div class="form-group">
            <label for="email">Hex Contetns</label>
            <textarea id="hexContents"></textarea>
          </div>
     </form>
  </div>

<script type="text/javascript">
  function chkFile(file1) {
      var file_data = file1.files[0];
      var form_data = new FormData();
      form_data.append('file_upload', file_data);
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
              if(data.code == 200){
                $("#hexContents").val(data.hex);
                $(file1).val(null);
              }else{
                console.log("File Not Uploaded");
              }
            }
        });
   
}
</script>

</body>
