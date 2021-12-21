
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trade Screening</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <!-- <script src="<?php echo base_url();?>/assets/js/keycloack.json"></script> -->
    <script src="http://localhost:8080/auth/js/keycloak.js" type="text/javascript"></script>
    <script>
        function initKeycloak() {
            var keycloak = new Keycloak({
                url: 'http://localhost:8080/auth/',
                realm: 'demo',
                clientId: 'test-swiftembargo'
            });
            keycloak.init({onLoad: 'login-required'}).then(function(authenticated) {
               // alert(authenticated ? 'authenticated' : 'not authenticated');
                
                $('#username').val(keycloak.idTokenParsed.preferred_username);
            }).catch(function() {
                alert('failed to initialize');
            });
            $('#logout').click( function(e) {e.preventDefault();  $('#logout').attr('href', keycloak.logout({"redirectUri":"http://localhost/swiftembargo"})); return false; } );
        }
    </script>
</head>
<div class="page-wrap d-flex flex-row align-items-center mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 d-flex justify-content-center">
              <img width="250px" src="<?php echo base_url();?>/assets/images/error.png">
            </div>
            <div class="col-md-12 text-center">
                <span style="font-size: 4rem !important;font-weight:400;" class="display-1 d-block">Oops!</span>
                
                <?php if ($textError !='') { ?>
                    <div class="mb-2 lead"><?php echo $textError ?></div>
                <?php   } else { ?>
                    <div class="mb-2 lead">Something went wrong</div>
                <?php    }
                ?>


                <a href="<?php echo base_url();?>" class="btn btn-link">Please Try Again</a>
            </div>
        </div>
    </div>
</div>