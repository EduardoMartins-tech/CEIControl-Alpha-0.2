-- 1. Insere o usuário Administrador de demonstração
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Admin Demo', 'admin@cei.com', '12345', 'admin'),
('Cliente Teste', 'cliente@cei.com', '12345', 'cliente');

-- 2. Insere Fornecedores de Exemplo
INSERT INTO fornecedores (nome, cnpj, email, telefone, data_cadastro) VALUES
('Papelaria do Zeca', '00.111.222/0001-33', 'zeca@papelaria.com', '11988776655', '2025-01-10'),
('Merenda Saudável S.A.', '00.444.555/0001-66', 'contato@merenda.com', '11911223344', '2025-02-15');

-- 3. Insere Produtos e Serviços de Exemplo
INSERT INTO produtos_servicos (tipo, nome, descricao, preco, quantidade, data_cadastro) VALUES
('produto', 'Caderno 100 Folhas', 'Para atividades com alunos', 8.50, 50, '2025-03-01'),
('serviço', 'Manutenção Hidráulica', 'Conserto de vazamento no banheiro', 120.00, 0, '2025-03-10');

-- 4. Insere Eventos de Exemplo
INSERT INTO agenda (titulo, descricao, data_evento, publico_alvo, data_cadastro) VALUES
('Reunião de Pais e Mestres', 'Apresentação das atividades do trimestre', '2025-12-10', 'Pais', '2025-06-01'),
('Festa Junina', 'Festa tradicional com comidas típicas', '2025-06-20', 'Geral', '2025-06-05');