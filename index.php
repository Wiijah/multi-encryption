<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Multi-Encryption</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/ZeroClipboard.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <img src="images/bg.jpg" class="bg" />
    <div class = "cont_bg">
    <div class="cont"><h1>Multiple Encryption</h1>
      Enter your sentence, choose an algorithm, get your result!
        <fieldset class="form-group">
          <input class="form-control" name="sentence" id="input_s" placeholder="Your sentence" onkeypress="send();"></input> 
        </fieldset>
      <form id="form" onSubmit="return false;">
        <div class="radio">
          <label class="radio-inline">
            <input type="radio" name="algos" id="algos1" value="sha1" checked>SHA-1</input>
          </label>

          <label class="radio-inline">
            <input type="radio" name="algos" id="algos2" value="sha256">SHA-256</input>
          </label>
        </div>

        <div class="form-group row">
          <label class="col-sm-2 form-control-label">Output</label>
          <div class="col-xs-10" style="width:70%;">
            <input type="text" class="form-control" id="output" readonly></input>
          </div>
            <span class="input-group-btn">
              <button id="btnCopy" style="left: -20px; background-color:rgb(238,238,238); border-color:rgb(204,204,204); border-left:none;" class="btn btn-primary"><img src="./images/copy.png" style="width:10px"/></button>
            </span>
        </div>
      </form>
    </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/components/core-min.js"></script>
    <script src="js/rollups/sha1.js"></script>
    <script src="js/rollups/sha256.js"></script>
    <script src="js/rollups/aes.js"></script>
    <script src="js/components/enc-base64-min.js"></script>
    <script src="js/components/enc-utf16-min.js"></script>
    <script>
      $(document).ready(function(){

      ZeroClipboard.config( { swfPath: "./swf/ZeroClipboard.swf" } );
      var client = new ZeroClipboard($("#btnCopy"));

      client.on("copy", function (event) {
        var copiedValue = $('#output').val();
        var clipboard = event.clipboardData;
        clipboard.setData("text/plain", copiedValue);
      });
    })
    </script>
    <script type="text/javascript"> 
      function send() {
        var key = window.event.keyCode;
        if (key == 13) {
          var sentence = document.getElementById("input_s").value;
          var algo = $('input[name="algos"]:checked').val();
          if (algo == "sha1") {
            document.getElementById("output").value = CryptoJS.SHA1(sentence);
          } else if(algo == "sha256") {
            document.getElementById("output").value = CryptoJS.SHA256(sentence);  
          }
          return false;
        } else {
          return true;
        }
      }
      </script>
  </body>
</html>