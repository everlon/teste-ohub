<?php
    function pegar_ip_real() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    function gerar_id() {
        return $uuid = md5(uniqid(rand(), true));
    }

    function pegar_numero_endereco($end) {
        // fazer divição por vírgula para precisar a busca
        if (!preg_replace("/[^0-9]/", "", $end)) {
            return 'Não informado o número no endereço.';
        }
        return preg_replace("/[^0-9]/", "", $end);
    }

    # API MAILBOXLAYER
    function mailboxlayer($email_address) {
        // set API Access Key
        $access_key = '5ccad6381207ebb917a7359b355340e1';

        // Initialize CURL:
        $ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $validationResult = json_decode($json, true);
            if ($validationResult['format_valid'] == true) {
                $validationResult['format_valid'] = "E-mail válido";
            } else {
                $validationResult['format_valid'] = "E-mail inválido";
            }
        return $validationResult;
    }
?>