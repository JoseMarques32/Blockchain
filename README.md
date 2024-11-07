<h1> Blockchain </h1> 

<p align="center">
  <img src="https://img.shields.io/static/v1?label=php&message=Linguagem&color=blue&style=for-the-badge&logo=PHP"/>
  <img src="http://img.shields.io/static/v1?label=STATUS&message=Concluido&color=RED&style=for-the-badge"/>
</p>

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Conceitos Importantes](#conceitos-importantes)

:small_blue_diamond: [Pré-requisitos e Execução](#pré-requisitos-e-execução)

... 

## Descrição do projeto 

<p align="justify">
   Este é um projeto de uma blockchain simples desenvolvida em PHP, com funcionalidades de transação, validação de blocos, e um sistema de Proof of Work. O objetivo do projeto é implementar os conceitos fundamentais de uma blockchain, incluindo uma estrutura de cadeia de blocos, transações entre endereços válidos, e mineração de blocos com dificuldade ajustável. A blockchain permite o registro e rastreamento de transações, além de validação de integridade da cadeia.
</p>

## Funcionalidades

:heavy_check_mark: Criação de Blocos

:heavy_check_mark: Mineração com Proof of Work (PoW)

:heavy_check_mark: Validação de Blocos

:heavy_check_mark: Validação de Endereços

:heavy_check_mark: Histórico de Transações por Endereço
  
## Conceitos Importantes 

:arrow_right: Blocos e Cadeia de Blocos: A blockchain é composta por uma sequência de blocos conectados, onde cada bloco guarda o hash do anterior, formando uma estrutura encadeada.
<br>
:arrow_right: Transações: As transações representam transferências de valores entre endereços. Cada transação contém um remetente, um destinatário e um valor.
<br>
:arrow_right: Proof of Work (PoW): O PoW é um mecanismo de consenso que exige um esforço computacional para validar novos blocos. Neste projeto, o PoW é realizado tentando diferentes valores de nonce até que o hash do bloco tenha um número de zeros especificado pela dificuldade.
<br>
:arrow_right: Validação de Endereços: Os endereços são validados como strings hexadecimais de 40 caracteres. Apenas transações entre endereços válidos são permitidas, aumentando a integridade da rede.
<br>
:arrow_right: Histórico de Transações: A blockchain mantém um histórico de transações, mas uma função adicional permite buscar transações associadas a um endereço específico, retornando todas as ocorrências desse endereço como remetente ou destinatário.
<hr>

## Pré-requisitos e Execução

:warning: [PHP]((https://www.php.net/downloads.php)) <br>
:warning: Já tendo o PHP instalado em sua máquina, e com uma IDE de sua preferência(Que possua PHP). Execute o comando "PHP index.php", para ver o funcionamento da sua blockchain. Além disso, você pode adicionar quantos blocos desejar, contendo suas transações!! <br>

Compass UOL - 2024
