
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

  <body  onload="initKeycloak()" >
    <nav class="navbar navbar-dark fixed-top bg-darker flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Questionnaire Trade Screening</a>
      <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a id="logout" class="nav-link" href="#">Sign out</a> 
        </li> 
      </ul>
    </nav>
      
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link <?php echo $this->uri->segment(1) == '' ? 'active': '' ?>" href="<?= base_url(''); ?> ">
                  <span data-feather="file"></span>
                  Trade Screening<span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $this->uri->segment(1) == 'History' ? 'active': '' ?>" href="<?= base_url('History'); ?> ">
                  <span data-feather="file-text"></span>
                  History
                </a>
              </li>
             
            </ul>
          </div>
        </nav>
        