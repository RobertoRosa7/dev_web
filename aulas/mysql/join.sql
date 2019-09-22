USE db_loja_virtual;
SHOW DATABASES;

/**
* LEFT JOIN - JUNÇÃO A ESQUERDA - INDICA QUE A TABELA DA ESQUERDA TERÁ PRIORIDADE SOBRE A DIREITA
* LEFT JOIN - TODOS OS REGISTROS DA TABELA SÃO RETORNADO DEVIDO A SUA PRIORIDADE, CASO EXISTE REGISTRO A DIREITA SERÁ EXIBIDO
* RIGHT JOIN - JUNÇÃO A DIREITA - INDICA QUE A TABELA DA DIREITA TERÁ PRIORIDADE SOBRE A ESQUERDA
* INNER JOIN - JUNÇÃO INTERNO - INDICA QUE TRARÁ UM RETORNO SOMENTE ONDE AS TABELAS SE RELACIONAREM ENTRE SI
* INNER JOIN - TRARÁ METADA DE AMBAS AS TABELAS PRIORIZANDO O QUE ESTIVER RELACIONADOS ENTRE SI
* 
* QUANDO MAIS DE UMA TABELA E A NECESSIDADE DE JUNTAR SUAS CONSULTAS EM UMA INSTRUÇÃO DEVEMOS FAZER USO DO JOIN
*/
SELECT * FROM tb_clientes LEFT JOIN tb_pedidos ON (tb_clientes.id_clientes = tb_pedidos.id_cliente);

# QUANTOS PRODUTOS POSSUI A TABELA DE IMAGENS
SELECT * FROM tb_produtos LEFT JOIN tb_imagens ON (tb_produtos.id_produtos = tb_imagens.id_produto);

# CONSULTAR SE QUAIS CLIENTES E SEUS PEDIDOS
SELECT * FROM tb_clientes LEFT JOIN tb_pedidos ON (tb_clientes.id_clientes = tb_pedidos.id_cliente);
SELECT * FROM tb_clientes RIGHT JOIN tb_pedidos ON (tb_clientes.id_clientes = tb_pedidos.id_cliente);
SELECT * FROM tb_pedidos LEFT JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido);

# CONSULTA PARA TRAZER TRÊS TABELAS, PEDIDOS, PEDIDOS PRODUTOS E PRODUTOS
SELECT * FROM tb_pedidos LEFT JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido) LEFT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produtos); 

# NESTA CONSULTA A TABELA DE PEDIDOS PRODUTOS TEM PRIORIDADE SOBRE PEDIDOS E TAMBÉM SOBRE PRODUTOS POR ESTAR A SUA ESQUERDA
SELECT * FROM tb_pedidos RIGHT JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido) LEFT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produtos); 

# NESTA CONSULTA A TABELA PRODUTO TEM PRIORIDADE SOBRE PEDIDOS PRODUTOS QUE POR SUA VEZ TEM PRIORIDADE SOBRE PEDIDOS
SELECT * FROM tb_pedidos RIGHT JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido) RIGHT JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produtos); 

# NESTA CONSULTA TODOS OS REGISTROS QUE SE RELACIONAREM SERAM TRAZIDOS OS DEMAIS SERÃO DESCARTADOS
SELECT * FROM tb_pedidos INNER JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido);
SELECT * FROM tb_pedidos INNER JOIN tb_pedidos_produtos ON (tb_pedidos.id_pedidos = tb_pedidos_produtos.id_pedido) INNER JOIN tb_produtos ON (tb_pedidos_produtos.id_produto = tb_produtos.id_produtos);

# INSERÇÃO DE NOVOS CLIENTES
INSERT INTO tb_clientes(nome, idade)VALUES
('Josy',22),
('Maria Salete',59),
('Rosilene',43),
('Benedito Rosa',65),
('Fernanda Rosa',35),
('Thiago Ananias',31),
('Darcia',29),
('Zarana',25);

# NOVOS PEDIDOS
INSERT INTO tb_pedidos(id_cliente)VALUES(2);

# NOVOS PRODUTOS
INSERT INTO tb_produtos(produto, valor)VALUES('HD Externo Portátil Seagate Expansion 1TB USB 3.0', 274.90);

# CONSULTA
SELECT * FROM tb_clientes;
SELECT * FROM tb_pedidos;
SELECT * FROM tb_produtos;

# DETALHES
DESCRIBE tb_produtos;