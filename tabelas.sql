/* ============================================================
   CEICONTROL - BANCO DE DADOS DEFINITIVO (ALFA 0.2)
   ============================================================ */

CREATE DATABASE IF NOT EXISTS ceicontrol;
USE ceicontrol;

-- 1. Tabela de Usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin', 'cliente', 'usuario') NOT NULL
) ENGINE=InnoDB;

-- 2. Tabela de Fornecedores
CREATE TABLE IF NOT EXISTS fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cnpj VARCHAR(18) NOT NULL UNIQUE,
    email VARCHAR(100),
    telefone VARCHAR(20),
    data_cadastro DATE
) ENGINE=InnoDB;

-- 3. Tabela de Produtos
CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2),
    quantidade INT DEFAULT 0,
    data_cadastro DATE
) ENGINE=InnoDB;

-- 4. Tabela de Serviços
CREATE TABLE IF NOT EXISTS servicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2),
    data_cadastro DATE
) ENGINE=InnoDB;

-- 5. Tabela de Agenda (COM TODAS AS COLUNAS QUE O PHP PEDE)
CREATE TABLE IF NOT EXISTS agenda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    descricao TEXT,
    data_evento DATE NOT NULL,
    hora_evento TIME,
    local VARCHAR(255),
    criado_por INT,
    publico_alvo ENUM('Pais', 'Funcionários', 'Geral') DEFAULT 'Geral',
    data_cadastro DATE,
    FOREIGN KEY (criado_por) REFERENCES usuarios(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 6. Tabela de Mensagens (Chat)
CREATE TABLE IF NOT EXISTS mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remetente_id INT NOT NULL,
    destinatario_id INT NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (remetente_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (destinatario_id) REFERENCES usuarios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- ============================================================
-- DADOS DE EXEMPLO (PARA APRESENTAÇÃO E TESTES)
-- ============================================================

-- Usuários (Senha: 12345)
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Eduardo Admin', 'admin@cei.com', '12345', 'admin'),
('Fernanda Responsável', 'cliente@cei.com', '12345', 'cliente');

-- Fornecedores
INSERT INTO fornecedores (nome, cnpj, email, telefone, data_cadastro) VALUES
('Distribuidora Escolar S.A.', '12.345.678/0001-99', 'contato@distribuidora.com', '(11) 4002-8922', CURDATE()),
('Manutenção Express', '98.765.432/0001-00', 'suporte@mantenex.com', '(11) 99999-8888', CURDATE());

-- Produtos
INSERT INTO produtos (nome, descricao, preco, quantidade, data_cadastro) VALUES
('Resma Papel A4', 'Papel sulfite branco 75g', 25.90, 40, CURDATE()),
('Kit Estojo Colorido', 'Material para artes infantis', 15.00, 100, CURDATE());

-- Serviços
INSERT INTO servicos (nome, descricao, preco, data_cadastro) VALUES
('Pintura Sala 02', 'Pintura completa das paredes e teto', 450.00, CURDATE()),
('Reparo Ar Condicionado', 'Limpeza de filtros e carga de gás', 180.00, CURDATE());

-- Agenda
INSERT INTO agenda (titulo, descricao, data_evento, hora_evento, local, criado_por, publico_alvo, data_cadastro) VALUES
('Reunião de Planejamento', 'Definição do calendário de eventos', '2026-05-20', '14:00:00', 'Sala dos Professores', 1, 'Funcionários', CURDATE()),
('Festa Junina CEI', 'Arraiá com as famílias', '2026-06-15', '10:00:00', 'Pátio Principal', 1, 'Geral', CURDATE());