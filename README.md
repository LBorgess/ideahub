# IDEAHUB

## Estrutura das pastas

- app: Contém as classes desenvolvidas para o projeto, o autoload vê essa pasta;
- includes: Contém arquivos que serão utilizados por padrão em diversas partes do sistema
	- `header.php`: cabeçalho da página;
	- `footer.php`: rodapé da página
	- `listagem.php`: exibirá as perguntas
	- `formulario.php`:  realizar a pergunta
- vendor: Arquivos criados pelo composer para o autoload;  

## Arquivos

- `composer.json` e `composer.lock`: Configura o autoload das classes do projeto, não há necessidade de executar, pois a pasta vendor já existe;
- `cadastrar.php`: Resposável pelo cadastramento de uma nova pergunta;
- `index.php` : Página inicial do nosso projeto;
- `script.sql`: schema de contrução do nosso banco de dados  

## Referências

- [Bootstrap v4.6](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
