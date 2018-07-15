<head>
  <title>Tela de Login </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
  <link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/links_style.css" type="text/css">
  <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<div class="ls-login-parent" style="background:#1DD1A4">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <div class="headerlogo">
        <center><img src="<?=base_url()?>assets/images/logo.png" width="90px" height="50px"></center>
      </div>
      <div class="ls-login-box ls-md-margin-top"  style="background-color:white;color:white;">
          <style>.headerlogo{margin-bottom:20px;}.input-style{border-bottom:3px solid white;}</style>
          <form role="form" class="ls-form ls-login-form" action="LoginController/auth" method="POST">
            <fieldset>
              <?php if(isset($success)):?>
              <?=$success?>
              <?php elseif(isset($erro)):?>
              <?=$erro?>
              <?php elseif($this->session->userdata('erro_sessao')):?>
              <?=$this->session->userdata('erro_sessao');?>
              <?php endif;?>
              <label class="ls-label">
                <b class="ls-label-text ls-hidden-accessible">Usuário</b>
                <input class="ls-login-bg-user ls-field-lg input-style"  name="username" type="text" placeholder="Usuário" required autofocus >
              </label>

              <label class="ls-label">
                <b class="ls-label-text ls-hidden-accessible">Senha</b>
                <div class="ls-prefix-group ls-field-lg">
                  <input id="password_field" class="ls-login-bg-password input-style" name="senha" type="password" placeholder="Senha" required >
                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#" ></a>
                </div>
              </label>
              <style>.foco_input:hover{}</style>
              <input type="submit" value="Entrar" class="ls-btn ls-btn-block ls-btn-lg foco_input" style="background:#1DD1A4;color:white;">
              <a href="<?=base_url()?>cadastre" class="link_direct">Cadastre-se agora</a>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
</div>
