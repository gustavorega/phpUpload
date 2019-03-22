<?php

	include "configs.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php print $site_name?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="swiper/css/swiper.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda+One|Pacifico" rel="stylesheet">
  
  <script src="Inputmask-4.x/dist/jquery.inputmask.bundle.js"></script>
  <script src="Inputmask-4.x/dist/inputmask/phone-codes/phone.js"></script>
	
  <style>

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color:#000;
      margin: 0;
      padding: 0;

    }
	.add_photo {
		position: absolute;
		bottom: 0;
	}
    .swiper-container {
      width: 100%;
      height: auto;
    }
	.img-pv {
		display: -webkit-box;
	}
    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #000;
    }
	.myLogo {
		font-family: 'Merienda One', cursive;
		font-size: 34px;
	}

	.btn-file {
    position: relative;
    overflow: hidden;
	margin-top: 75%;
}
.img_icon{
	
}
.btn-file input[type=file] {
    position: absolute;
    bottom: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

#img-upload{
    width: 100%;
}
.th_preview{
	background-position: center;
	background-image: url('icon-image.png');
	background-size: 30px 30px;
	background-repeat: no-repeat;
}

  </style>

</head>
<body>



<nav class="navbar navbar-expand-lg navbar-dark my-bg-exdark sticky-top">
      <div class="container">
        <a class="navbar-brand myLogo" href="index.php"><?php print $site_logo?></a>

          <div >


          <a id="modo_discreto" href="#" class="btn btn-dark ml-auto"  data-toggle="tooltip" data-placement="bottom" title="Ativar modo discreto">
              <i class="glyphicon glyphicon-sunglasses"></i> </a>
            </div>
          </div>
    </nav>



<!-- Swiper -->



<div class="container-fluid my-bg-orange">
<div class="row">
<div class="col text-center	 mt-2">
	<div class="d-md-none p-2">

	</div>

	<div class="d-none d-lg-block p-2">
		<div class="btn-group">


		</div>
	</div>

</div>
</div>
</div>


		<div class="container col-lg-4">
		<div class="card card-login mx-auto mt-5">
		<div class="card-header" align="center"><h3>Novo Post</h3></div>
		<div class="card-body">
		<form enctype="multipart/form-data" method="post" action="dump.php">
			<div class="form-group">
			<div class="d-flex">
				
				<div id="d_preview1" class="th_preview border rounded col p-0" >
					<div style="width:100%" class="add_photo justify-content-center btn btn-sm btn-success btn-file input-group">
						<i class="glyphicon glyphicon-plus"></i><input type="file" style="display:block" id="imgInp1" name="photoUpload[]" multiple accept="image/*">					
						<input type="text" style="display:none" class="form-control" readonly>
					</div>					
				</div>
				&nbsp;
				<div id="d_preview2" class="th_preview border rounded col p-0" >
					<div style="width:100%" class="add_photo justify-content-center btn btn-sm btn-success btn-file input-group">
						<i class="glyphicon glyphicon-plus"></i><input type="file" style="display:block" id="imgInp2" name="photoUpload[]" multiple accept="image/*">					
						<input type="text" style="display:none" class="form-control" readonly>
					</div>					
				</div>
				&nbsp;
				<div id="d_preview3" class="th_preview border rounded col p-0" >
					<div style="width:100%" class="add_photo justify-content-center btn btn-sm btn-success btn-file input-group">
						<i class="glyphicon glyphicon-plus"></i><input type="file" style="display:block" id="imgInp3" name="photoUpload[]" multiple accept="image/*">					
						<input type="text" style="display:none" class="form-control" readonly>
					</div>					
				</div>
				
			</div>	
		  </div>

		  <div class="form-group">
			<label for="exampleTextarea">Descrição</label>
			<textarea class="form-control" id="descricao" name="descricao" rows="6" placeholder="Escreva uma descrição... #tag"  required></textarea>
		  </div>
		  
		  <div class="form-group">
		  <label>TAGs (m&aacute;ximo 5) <a href="javascript:;" class="h6 text-secondary" data-placement="bottom" data-html="true" data-toggle="popover" title="" data-content="Adicione marcadores para que seu an&uacute;ncio seja facilmente encontrado!"><i class="glyphicon glyphicon-question-sign"></i></a></label>
		  <div class="input-group mb-3">
			  <input type="text" class="form-control" placeholder="ex.: natural" id="marcadores" name="marcadores">
			  <div class="input-group-append">
				<button onclick="javascript:addMarcadores();" class="btn btn-outline-secondary" type="button">Adicionar</button>
			  </div>
			</div>
			<small>Clique no marcador para remove-lo</small>
		  <div class="card-footer mx-auto" style="line-height:2rem;" id="listaMarcadores">
                    
                </div>
				
				</div> 
		  

		  
		  <button type="submit" class="btn btn-primary btn-block">Publicar</button>
		  
		</form>
			
		</div>	
		</div>
	</div>

	

  <!-- Swiper JS -->
  <script src="swiper/js/swiper.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
	function setTipoS(tipo){
		$('#displayTipoS').html(tipo);
	}
	function removeMarcadores(tag){
		
		document.getElementById("listaMarcadores").removeChild(tag.parentNode);
		
	}
	function addMarcadores(){
	  $count = document.getElementById("listaMarcadores").childElementCount;
	  if ($('#marcadores').val().length > 0){
		if ($count < 5){
			$('#listaMarcadores').append('<span><input type="hidden" name="marcadores[]" value="'+$('#marcadores').val()+'"><a href="javascript:;" onclick="removeMarcadores(this)" class="btn btn-secondary btn-sm"><i class="glyphicon glyphicon-remove-sign"></i> '+$('#marcadores').val()+'</a>&nbsp;</span>');
			
			$('#marcadores').val('');
		}
	  }
	}
	$("#telefone").inputmask({
		mask: ['(99) 9999-9999', '(99) 99999-9999'],
		keepStatic: true
	});
	$(document).ready( function() {
		
		$('#marcadores').keydown(function(event) {
			
		  // Cancel the default action, if needed
		 
		  // Number 13 is the "Enter" key on the keyboard
		  if (event.keyCode == 13) {
			addMarcadores();
			event.preventDefault();
			return false;
		  }
		});
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input,num) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
					$('#img-upload'+num).show();
		            $('#img-upload'+num).attr('src', e.target.result);
					$('#d_preview'+num).css({
					'backgroundImage':'url('+e.target.result+')',
					'background-size':'100% ',
					'background-repeat':'no-repeat'
					
					});
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp1").change(function(){
		    readURL(this,1);
		}); 	
		$("#imgInp2").change(function(){
		    readURL(this,2);
		}); 
		$("#imgInp3").change(function(){
		    readURL(this,3);
		}); 
		$("#imgInp4").change(function(){
		    readURL(this,4);
		});
	});

      $(function () {
          //$('#modo_discreto').tooltip('show')
          $('[data-toggle="tooltip"]').tooltip()
          $('[data-toggle="popover"]').popover()
          $('.popover-dismiss').popover({
              trigger: 'focus'
            })
        })
      window.setTimeout(function() {
        $('#modo_discreto').tooltip('hide');
      }, 5000);
		

  </script>
 
</body>
</html>
