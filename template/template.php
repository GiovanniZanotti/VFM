<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> [meta]

    <title>[pagina]</title>

    <link href='favicon.png' rel='shortcut icon' type='image/x-icon' />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <link rel="stylesheet" type="text/css" href="[template]/pw-css/style.css" />
    <!-- <style><?php echo file_get_contents('template/pw-css/style.css');?></style> -->
    [css]
    <link rel="stylesheet" href="pw-font-awesome/css/all.css">
    <link rel="stylesheet" href="pw-galeria-fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="pw-css/swiper.min.css">
    
</head>

<body>

    <div class="topo-total">

        <div class="topo">

            <div class="logo"><a href="[url]/" title=""><img src="[template]/pw-images/logo.png" alt="" title="" /></a></div>
            <!-- Logo -->

            <div class="menu-total">

                <div class="menu-resp"></div>
                <!-- Menu Resp -->

                <div class="menu">

                    <ul>
                        <li><a href="[url]/" title="">HOME</a></li>
                        <li><a href="[url]/empresa" title="">EMPRESA</a></li>
                        <li><a href="[url]/segmentos" title="">SEGMENTOS</a></li>
                        <li><a href="[url]/contato" title="">CONTATO</a></li>
                    </ul>
                </div>
                <!-- Menu -->
            </div>
            <!-- menu Total -->
        </div>
        <!-- Topo -->
    </div>
    <!-- Topo Total -->


    <div class="global">

        [conteudo]

    </div>
    <!-- global -->

    <div class="rodape-total">

        <div class="rodape">

            <div class="texto-rodape">
                contato@vfmconsulting.com.br
            </div>
            <!-- Texto Rodape -->

            <div class="texto-rodape">
                (11) 3619-3122
            </div>
            
            <div class="texto-rodape">
                Av. Marquês de São Vicente, 1619 <br>
                Conj. 301 - CEP:01139-003
            </div>
            <!-- Texto Rodape -->

            <div class="social">
                <a href="https://www.facebook.com/projetowebsite/" title="" target="_blank"><img src="[template]/pw-images/logo-facebook.png" alt="" title=""></a>
                <a href="" title="" target="_blank"><img src="[template]/pw-images/logo-instagram.png" alt="" title=""></a>
            </div>
            <!-- Texto Rodape -->
        </div>
        <!-- Rodape -->

        <div class="logo-pw">
            <a href="https://www.projetowebsite.com.br" title="" target="_blank"><img src="[template]/pw-images/logo-pw.png" alt="Criação de Site, Construção de Site, Desenvolvimento Web" title="Criação de Site, Construção de Site, Desenvolvimento Web" /></a>
            <div>
                <p><a href="https://www.projetowebsite.com.br/criacao-de-sites-profissionais" target="_blank">Criação de Sites</a></p>
                <p>
                    <a href="https://www.projetowebsite.com.br/criacao-de-sites-profissionais " target="_blank"><span>Criação de Sites /</span></a>
                    <a href="https://www.projetowebsite.com.br/  " target="_blank"><span>Criação de Sites/</span></a>
                    <a href="https://www.projetoweb.com.br/marketing-e-conteudo-sobre-site/site" target="_blank"><span>Site/</span></a>
                    <a href="https://www.projetoweb.com.br/criar-site " target="_blank"><span>Criar Site/</span></a>
                    <a href="https://www.projetowebsite.com.br/ " target="_blank"><span>Sites/</span></a>
                    <a href="https://www.projetowebsite.com.br/criacao-de-site-para-empresa" target="_blank"><span>Site para empresas/</span></a>
                    <a href="https://www.projetowebsite.com.br/desenvolvimento-web " target="_blank"><span>Desenvolvimento Web</span></a>
                </p>
            </div>
        </div>

        <div class="faixa-rodape" style="display: none;">
            <?php echo file_get_contents('https://www.projetoweb.com.br/faixa/faixa-rodape-clientes.php ');?>
        </div>


    </div>
    <!-- Rodape Total -->

    <script><?php echo file_get_contents('pw-js/jquery.js');?></script>
    <script><?php echo file_get_contents('pw-galeria-fancybox/jquery.fancybox.min.js');?></script>
    <script><?php echo file_get_contents('pw-js/swiper.min.js');?></script>
    <script><?php echo file_get_contents('pw-js/javascript.js');?></script>
    <script><?php echo file_get_contents('pw-js/scrollReveal.js');?></script>
    <script src="[template]/pw-slider-engine/wowslider.js"></script>
    <script src="[template]/pw-slider-engine/script.js"></script>
    <script>
        (function($) {
            'use strict';
            window.sr = ScrollReveal();
            sr.reveal('.box-01 .item', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '0px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-02 *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-03 > *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-04 *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-contato *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.frase-empresa', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '0px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.texto-empresa *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-valores *', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-servicos .box .item', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '100px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.box-contato .titulo', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '0px',
                viewFactor: 0.6
            }, 100);
            sr.reveal('.contato-form', {
                duration: 2000,
                origin: 'bottom',
                mobile:false,
                distance: '0px',
                viewFactor: 0.6
            }, 100);
        })();

        $(document).ready(function() {
            var hash = window.location.hash;
            if (hash == '#pw_site') {
                $('.faixa-rodape').css('display', 'block');
            }
        });

        
        
    </script>
</body>

</html>