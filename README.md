<h2>Créditos</h2>

Criador: Celso Rodrigo de M F

Released under the <a href='https://mit-license.org/'>MIT License</a>.

<hr>

Modelo de blog simples com área administrativa para gerenciamento das postagens
feito em Php + Mysql, com PDO.

<pre>
Informações gerais: 

    Area adminstrativa:
        - Cadastro de categorias
        - Cadastro de autores 
        - Envio de postagens com imagem escolhendo o autor para a postagem
        - Usuários do sistema administrativo
        - Configurações de informações do blog
            - Titulo
            - Sescrição
            - Palavras chaves
            - Autor

        - Integrações
            - Header e Body

        - Redes sociais para compartilhamento
            - Facebook
            - Instagram
            - Twitter
            - Whatzapp
            - Google+
            - Pinterest

        - Configurações de imagens do blog
            - Topo
            - Logo
            - Painel administrativo
            - Banner de divulgação (para compartilhamento do blog)
            - Gif de preload

        - Institucional
            - Sobre o blog
            - Termos de uso
            - politica de privacidade
            - Mensagens de erros (recebidas pelo blog)
            - Mensagens do site
            - Contador de visitas

    Blog:
        - Layout simples com imagem no topo
        - Menu de categorias
        - Coluna direita com as postagens mostrando imagens e resumo
        - Coluna esquerda contendo área de pesquisa
        - Últimas postagens, melhores da semana.
</pre>


ATUALIZAÇÕES:

1.1.8
Atualização em área administrativa
- Correção na edição de termos de uso, sobre o site e politicas de privacidade, adições automatizadas sem necessidade de adicionar direto no banco.
- Correção na edição de configurações gerais, configurado para primeira adição sem necessidade de adicionar direto no banco.
- Adicionado edição de link do site em configurações gerais, e editado todos os links no site.
- Adicionado edição de ano de criação em configurações gerais, para mostrar em footer de página.
- correção em links de menu.
- link url em postagem não é alterado ao editar postagem.
- corridigo link em imagem de menu

Area do autor

Atualização em blog


1.1.7
Atualização em área administrativa
- Correção na atualização de imagens das postagens em editar Postagem.
- Adicionado botão 'Ver Postagem' em listagem de postagem
- possível Adicionar/Editar/remover 4 Adsenses posicionados estrategicamente na página
- Adicionado agendamendo de postagens de acordo com a data selecionada.
- Adicionado arquivos para pixel code do Facebook

Area do autor
- Corrigido listagem de postagem contador de visitas
- Corrigido visualizar postagens de autor
- Adicionado botao de ver post no blog do autor
- Correção de visualização de comentarios em listagem de postagem

Atualização em blog
- Adicionado página de erro ao não encontrar postagem
- Ajustes de layout no site
- Adicionado Ads estratégicos em todas as paginas...
- FIX paginação de postagens em categorias selecionada
- Removido contador de visitas

1.1.6
Atualização em área administrativa
- Adicionado Facebook_id em configurações gerais para gerenciamento de todos comentários postagens.
- Adicionado Facebook_id ao cadastrar autor para gerenciamento de comentários em postagens.
- Possível salvar postagem e previsualizar postagem na edição.
- Corrigido editar imagem em post

Atualização em blog
- Area colaborativa para authores.
- Corrigido listagem de posts mais vistos durante a semana
- Criar conta de author, com facebook e via formulário.
- Alterada ordem de vizualização de visita em Dashboard.
- Corrigido salvar postagem botão inferior.
- Corrigido problemas com caracteres especiais.
- Varias correções de performance



1.1.5
Atualização em blog
- Adicionado meta tags especificas de compartilhamento para redes sociais facebook, google, twitter

1.1.4
Atualização para inicialiação de projeto.
- Feito vários ajustes para quando o projeto se inicia do zero.

Atualização em área administrativa
- Ajustado sql de contador de visita
- Ajustado lista de categorias para blog, quando não há nenhuma categorias.

Atualização em blog
- Removido msg erro interno que estava visível site. 
- Ajustado links estáticos do blog.
- Ajustado váriod links internos.

Banco de dados
- Criado arquivo de backup inicial para blog.
- Adicionado arquivo de banco de dados.

1.1.3
Atualização em área administrativa
- Contador de visitas no blog
- Adicionado preview de matérias ao editar materia

Atualização em blog
- Contador de visitas

1.1.2
Atualização em blog
- Adicionado links de redes sociais ao blog
- Adicionado pagina de contatos ao blog (envia por email e gera uma msg na area administrativa)
- Adicionado pagina de erro encontrado no site via modal (envia por email e gera uma msg na area administrativa)
- Ajustes de layouts no blog

1.1.1
Atualização em blog
- Melhorado sistema de paginação do blog
- Melhorado URL amigáveis
- Adicionado pesquisa no blog

1.1
Atualização em blog
- Adicionado paginação em home do blog
- Adicionado listagem de postagens de categorias


1.0.2
Atualização em área administrativa
- Envio de imagens para blog
    - imagem topo 
    - image logo
    - imagem banner para facebook de compartilhamento de blog
    - gif de preload na pagina


1.0.1
Atualização em área administrativa 
- Cadastros de novos autores
- Adicionado configurações
    - configurações gerais
    - integração (header e body)
    - links de redes sociais
    - configurações gerais para comentarios com facebook
        - mostrar quantos comentarios por post
        - appid do facebook


1.0
Blog simples feito em PHP + Mysql + PDO, com área administrativa.
- Primeiro envio
- Banco de dados não esta no projeto.