<h1> Blockchain em PHP </h1> 

<p align="center">
  <img src="https://img.shields.io/static/v1?label=php&message=Linguagem&color=blue&style=for-the-badge&logo=PHP"/>
  <img src="http://img.shields.io/static/v1?label=STATUS&message=Concluido&color=RED&style=for-the-badge"/>
</p>

### Tópicos 

:small_blue_diamond: [Descrição do projeto](#descrição-do-projeto)

:small_blue_diamond: [Funcionalidades](#funcionalidades)

:small_blue_diamond: [Conceitos Importantes](#conceitos-importantes)

:small_blue_diamond: [Pré-requisitos e Execução](#pré--requisitos-e-execução)

... 

## Descrição do projeto 

<p align="justify">
   Esta aplicação é uma implementação básica de uma rede blockchain utilizando PHP. Ela simula uma cadeia de blocos (blockchain) em que transações podem ser registradas e agrupadas em blocos. 
  
  Cada bloco contém uma referência ao bloco anterior, formando uma lista encadeada. A aplicação permite a criação de transações, a inclusão dessas transações em blocos, a inserção dos blocos na rede e a validação da autenticidade da blockchain.
</p>

## Funcionalidades

:heavy_check_mark: Mostra o Hash atual

:heavy_check_mark: Mostra o Hash anterior

:heavy_check_mark: Informações com o nome do usuário e o valor da transação
  
## Conceitos Importantes 

:arrow_right: Lista Encadeada: Cada bloco tem uma referência ao próximo bloco (nextBlock), formando uma lista encadeada de blocos. 
<br>
:arrow_right: Hash: O hash do bloco é uma representação única dos dados dentro do bloco. Se os dados (como as transações ou o hash anterior) mudarem, o hash também muda.
<br>
:arrow_right: Validação: A blockchain é validada verificando se o hash de cada bloco está correto e se corresponde ao hash armazenado no bloco seguinte.

<hr>

## Pré-requisitos e Execução

:warning: [PHP]((https://www.php.net/downloads.php)) <br>
:warning: Já tendo o PHP instalado em sua máquina, e com uma IDE de sua preferência(Que possua PHP). Execute o comando "PHP index.php", para ver o funcionamento da sua blockchain. Além disso, você pode adicionar quantos blocos desejar, contendo suas transações!! <br>

Compass UOL - 2024
