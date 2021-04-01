<?php
header('Content-Type: application/json');

//api cnpj cnpjs.rocks

require 'Util.php';

if(isset($_GET['doc'])){
    $cnpj = $_GET['doc'];
}else{
    $cnpj = '23161766000153';
}

$url = 'https://cnpjs.rocks/cnpj/'.$cnpj;

$dados = Util::curl($url, null, null, true);

$cnpj = Util::corta($dados, 'CNPJ:  <strong>', '</');
$razao_social  = Util::corta($dados, 'o Social:  <strong>', '</');
$nome_fantasia = Util::corta($dados, 'Nome Fantasia:  <strong>', '</');
$data_abertura = Util::corta($dados, 'Data de Abertura:  <strong>', '</');
$tipo          = Util::corta($dados, 'Tipo:  <strong>', '</');
$situacao      = Util::corta($dados, 'Situação:  <strong>', '</');
$natureza_juridica    = Util::corta($dados, 'Natureza Jurídica:  <strong>', '</');
$capital_inicial      = Util::corta($dados, 'apital Social:  <strong>', '</');
$atividade_principal  = Util::corta($dados, 'Atividade Principal:  <strong>', '</');
$atividade_secundaria = Util::corta($dados, 'Atividade Secundária:  <strong>', '</');

$cep         = Util::corta($dados, 'CEP:  <strong>', '</');
$logradouro  = Util::corta($dados, 'Logradouro:  <strong>', '</');
$numero      = Util::corta($dados, 'Número:  <strong>', '</');
$complemento = Util::corta($dados, 'Complemento:  <strong>', '</');
$bairro      = Util::corta($dados, 'Bairro:  <strong>', '</');
$municipio   = Util::corta($dados, 'Município:  <strong>', '</');
$uf          = Util::corta($dados, '<li>UF:  <strong>', '</');
$telefone    = Util::corta($dados, 'Telefone:  <strong>', '</');
$email       = Util::corta($dados, 'E-mail:  <strong>', '</');
$socio       = Util::corta($dados, 'Sócio:  <strong>', '</');
$socio       = str_replace('65-Titular Pessoa Física Residente ou Domiciliado no Brasil', '', $socio);
$res = array();
$res['cnpj'] = $cnpj;
$res['razao_social']  = $razao_social;
$res['nome_fantasia'] = $nome_fantasia;
$res['data_abertura'] = $data_abertura;
$res['tipo']     = $tipo;
$res['situacao'] = $situacao;
$res['natureza_juridica']    = $natureza_juridica;
$res['capital_inicial']      = $capital_inicial;
$res['atividade_principal']  = $atividade_principal;
$res['atividade_secundaria'] = $atividade_secundaria;
$res['endereco'] = array(
    'cep' => $cep,
    'logradouro' => $logradouro,
    'numero' => $numero,
    'complemento' => $complemento,
    'bairro' => $bairro,
    'municipio' => $municipio,
    'uf' => $uf
);
$res['telefone'] = $telefone;
$res['email'] = $email;
$res['socio'] = $socio;
echo json_encode($res);