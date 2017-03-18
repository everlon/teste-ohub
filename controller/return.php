<?php
    require_once __DIR__.'/../configs/config.php';
    require_once __DIR__.'/../lib/functions.php';

    $idAtual = gerar_id();

    setcookie('idatual', $idAtual, (time() + (2 * 3600))); // Ex. Para durar somente 2 horas.
    $_COOKIE['idatual'] = $idAtual; // Se definir como o modo anterior, ao exibir ele sempre pega o anterior.
    $_SESSION['idatual'] = $idAtual;

    $mailboxlayer = mailboxlayer($_POST['email']);

    include "../view/template/_top.php";

    $corpo_email = '<!DOCTYPE html>
                    <html>
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                    </head>

                    <body>
                        <h3>Teste desenvolvedor Full-Stack</h3>
                        <p>Dados da pesquisa:</p>
                        <p>E-mail: '.$_POST['email'].'</p>
                        <p>Endereço: '.$_POST['address'].'</p>
                        <p>Token gerado: '.$idAtual.'</p>

                    </body>
                    </html>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: oHub <programador@everlon.com.br>' . "\r\n";
    $headers .= 'Bcc: programador@everlon.com.br' . "\r\n";

    mail($_POST['email'], 'Teste oHub', $corpo_email, $headers)
?>

    <div class="panel panel-primary">
        <div class="panel-heading"><b>RESULTADO DA PESQUISA</b> <a class="btn btn-default btn-xs" href="<?php echo DOMAIN ?>">Nova pesquisa</a></div>
        <div class="panel-body">
        <p><b>E-Mail:</b> <?php echo $_POST['email'].' ('.$mailboxlayer['format_valid'].')'; ?></p>
            <p><b>E-Mail Score:</b> <?php echo $mailboxlayer['score'] ?></p>
            <hr>
            <p><b>Endereço:</b> <?php echo $_POST['address']; ?></p>
            <p><b>Número do imóvel:</b> <?php echo pegar_numero_endereco($_POST['address']); ?></p>
            <hr>
            <p><b>IP:</b> <?php echo pegar_ip_real(); ?></p>
            <p><b>Token:</b> <?php echo $idAtual ?></p>
            <hr>
            <p><b>SESSION:</b> <?php echo $_SESSION['idatual'] ?></p>
            <p><b>COOKIE:</b> <?php echo $_COOKIE['idatual'] ?></p>
        </div>
    </div>
    <br>

<?php include "../view/template/_footer.php"; ?>