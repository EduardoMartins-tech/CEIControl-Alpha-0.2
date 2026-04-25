# 🚀 CEIControl

<p align="center">
  <img src="assests/ceicontrol.png" height="120"/>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <img src="assests/jemtech.png" height="120"/>
</p>

<p align="center">
  <b>Sistema de Gestão para Centros de Educação Infantil Públicos</b>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/status-em%20desenvolvimento-yellow" />
  <img src="https://img.shields.io/badge/version-0.3-blue" />
  <img src="https://img.shields.io/badge/license-MIT-green" />
  <img src="https://img.shields.io/badge/PHP-Backend-blueviolet" />
  <img src="https://img.shields.io/badge/MySQL-Database-orange" />
</p>

---

## 📌 Sobre o Projeto

O **CEIControl** é uma plataforma web desenvolvida para **modernizar e simplificar a gestão de Centros de Educação Infantil (CEIs) públicos**.

A proposta é centralizar em um único sistema:

- 👥 Gestão de usuários  
- 📦 Controle de recursos  
- 📅 Agenda digital  
- 💬 Comunicação entre escola e responsáveis  

> 💡 Projeto desenvolvido pela **JEMTech**, focada em soluções digitais para o setor público.

---

## 📎 Links do Projeto

Para garantir a transparência e facilitar a avaliação, abaixo estão os links oficiais da documentação e versionamento:

* **🌐 Deploy Online:** [https://ceicontrol.up.railway.app](https://ceicontrol.up.railway.app)
* **Repositório Oficial (Alpha 0.2):** [GitHub - CEIControl Alpha 0.2](https://github.com/EduardoMartins-tech/CEIControl-Alpha-0.2)
* **Wireframe e Protótipo:** [Visualizar Protótipo no Figma](https://www.figma.com/design/Ik8DcPkOuDatNVvMvnUDYq/CCsite?node-id=0-1&p=f)

---

## 👨‍💻 Desenvolvedores

<table align="center">
  <tr>
    <td align="center">
      <a href="https://github.com/EduardoMartins-tech">
        <img src="https://github.com/EduardoMartins-tech.png" width="100px;" /><br>
        <sub><b>Eduardo Ferreira Martins</b></sub>
      </a>
    </td>
    <td align="center">
      <a href="https://github.com/JVCod1ng">
        <img src="https://github.com/JVCod1ng.png" width="100px;" /><br>
        <sub><b>João Vitor</b></sub>
      </a>
    </td>
  </tr>
</table>

---

## 🎯 Objetivos

### 🔹 Objetivo Geral
Criar uma plataforma gratuita, eficiente e acessível para a gestão de CEIs, promovendo **organização, comunicação e transparência**.

### 🔹 Objetivos Específicos

- 📊 Centralizar dados administrativos  
- 💬 Melhorar comunicação com responsáveis  
- 🔐 Garantir segurança com controle de acesso  
- ⚙️ Utilizar tecnologias modernas  
- 🌍 Promover inclusão digital  

---

## 🌟 Funcionalidades

- ✅ CRUD completo (Usuários, Produtos, Serviços)
- 💬 Chat interno entre usuários do sistema
- 📅 Agenda digital integrada
- 📊 Relatórios e ocorrências
- 🔐 Sistema de autenticação por perfil
- 🌙 Modo escuro (Dark Mode)

---

## 🧰 Tecnologias

<p align="center">

| Tecnologia | Uso |
|-----------|-----|
| PHP | Back-end |
| MySQL | Banco de dados |
| HTML5 | Estrutura |
| CSS3 | Estilo |
| JavaScript | Interatividade e Validações |
| Railway | Hospedagem e Deploy |

</p>

---

## 🔐 Perfis de Acesso

| Perfil | E-mail | Senha |
|--------|--------|-------|
| **Admin (Gestor Escolar)** | admin@cei.com | 123456 |
| **Cliente (Responsável)** | cliente@cei.com | 123456 |
| **Usuário (Educador)** | usuario@cei.com | U123456 |


---

## 🚀 Implementações da Versão Alfa 0.3

Nesta etapa, consolidamos a infraestrutura do sistema **CEIControl**, garantindo que todas as entidades principais possuam operações completas de banco de dados (CRUD) e uma interface padronizada.

### ✅ O que foi entregue:
* **Gestão de Agenda Escolar**: Sistema completo para criar e editar eventos, com suporte a campos como `hora_evento`, `local` e `publico_alvo` (Pais, Funcionários ou Geral).
* **Controle de Estoque e Materiais**: Separação lógica entre **Produtos** (materiais físicos com controle de quantidade) e **Serviços** (registros de manutenção e reparos).
* **Módulo de Fornecedores**: Cadastro e listagem de parceiros comerciais com CNPJ, e-mail e telefone.
* **Padronização de UI/UX**: Todas as telas de cadastro e edição foram unificadas para o modelo "Card Centralizado" (Alfa 0.2).
* **Integração de Banco de Dados**: Refatoração do script SQL para suportar todas as novas colunas e chaves estrangeiras.
* **Validações no Front-End**: Validações com JavaScript nos formulários de login e cadastro (e-mail, senha, campos obrigatórios).
* **Deploy em produção**: Sistema hospedado e acessível publicamente via Railway.

---

## 📊 Dados de Teste (Pronto para Apresentação)

O banco de dados já vem populado com exemplos reais para facilitar a demonstração das funcionalidades:

* **Usuários (Credenciais)**:
  - **Administrador**: `admin@cei.com` | Senha: `123456`
  - **Responsável**: `cliente@cei.com` | Senha: `123456`
  - **Usuário**: `usuario@cei.com` | Senha: `U123456`
* **Agenda**: Eventos pré-cadastrados como "Reunião de Pais" e "Festa Junina".
* **Estoque**: Itens de exemplo como "Resma Papel A4" e "Kit de Artes".
* **Serviços**: Registros de manutenção como "Pintura de Sala" e "Reparo de Ar Condicionado".
* **Fornecedores**: Empresas cadastradas como "Distribuidora Escolar S.A." e "Manutenção Express".

---

## 🛠️ Como usar o `tabelas.sql`

O arquivo `tabelas.sql` na raiz do projeto contém toda a estrutura necessária (DDL) e os dados iniciais (DML) para o funcionamento imediato do sistema.

1. Abra o seu gerenciador de banco de dados (ex: **phpMyAdmin**).
2. Crie um novo banco de dados chamado `ceicontrol`.
3. Clique na aba **Importar**.
4. Selecione o arquivo `tabelas.sql` e clique em **Executar**.
   * *O script irá criar automaticamente as 6 tabelas (usuarios, fornecedores, produtos, servicos, agenda, mensagens) e inserir os dados de teste.*

---

## 💻 Como clonar e rodar o repositório

Siga os passos abaixo para configurar o ambiente local (XAMPP/WAMP):

1. **Clonagem via Terminal**:
   Abra o terminal na sua pasta de servidores (ex: `C:/xampp/htdocs/`) e execute:
   ```bash
   git clone https://github.com/EduardoMartins-tech/CEIControl-Alpha-0.3.git
   ```

2. **Acesso ao Sistema**:
   Certifique-se de que o Apache e o MySQL estão ativos e acesse no seu navegador:
   ```
   http://localhost/CEIControl-Alpha-0.3/form_login.php
   ```

3. **Configuração de Banco**:
   Edite o arquivo `database.php` com as suas credenciais locais:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "SUA_SENHA";
   $db   = "ceicontrol";
   ```

---

<p align="center">Desenvolvido pela <b>JEMTech</b> para a FATEC Ferraz de Vasconcelos</p>
