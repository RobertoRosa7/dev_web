# CRIAÇÃO DO BANCO DE DADOS LOJA VIRTUAL
CREATE DATABASE db_loja_virtual DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

# USANDO O BANCO DE DADOS
USE db_loja_virtual;

# CRIANDO A PRIMEIRA TABELA DE PRODUTOS
CREATE TABLE tb_produtos(
	id_produtos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    produto VARCHAR(200) NOT NULL,
    valor FLOAT(8,2) NOT NULL
);

# CRIANDO A SEGUNDA TABELA DESCRIÇÕES TÉCNICAS - RELACIONAMENTOS UM PARA UM
CREATE TABLE tb_descricoes_tecnicas(
	id_descricoes_tecnicas INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    descricao_tecnica TEXT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produtos)
);

# CRIANDO A TABELA DE IMAGENS - RELACIONAMENTO UM PARA MUITOS
CREATE TABLE tb_imagens(
	id_imagens INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_produto INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produtos),
    url_imagens VARCHAR(200) NOT NULL
);

# CRIANDO A TABELA DE CLIENTES - RELACIONAMENTO UM PARA MUITOS
CREATE TABLE tb_clientes(
	id_clientes INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    idade INT(3) NOT NULL
);

# CRIANDO A TABELA DE PEDIDOS - RELACIONAMENTO MUITOS PARA MUITOS
CREATE TABLE tb_pedidos(
	id_pedidos INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT NOT NULL,
    FOREIGN KEY(id_cliente) REFERENCES tb_clientes(id_clientes),
    data_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

# CRIANDO A TABELA DE PEDIDOS DE PRODUTOS - RELACIONAMENTO UM PARA MUITOS
CREATE TABLE tb_pedidos_produtos(
	id_produto INT NOT NULL,
    id_pedido INT NOT NULL,
    FOREIGN KEY(id_produto) REFERENCES tb_produtos(id_produtos),
    FOREIGN KEY(id_pedido) REFERENCES tb_pedidos(id_pedidos)
);
# DETALHES DA TABELA
DESCRIBE tb_produtos;
DESCRIBE tb_descricoes_tecnicas;
DESCRIBE tb_imagens;
DESCRIBE tb_clientes;
DESCRIBE tb_pedidos;
DESCRIBE tb_pedidos_produtos;

# INSERÇÃO DE DADOS
INSERT INTO tb_produtos(produto, valor) VALUES ('Notebook Dell Inspiron Ultrafino Intel Core i7, 16GB RAM e 240GB SSD', 3500.00);
INSERT INTO tb_produtos(produto, valor) VALUES ('Smart TV LED 40" Samsung Full HD 2 HDMI 1 USB Wi-Fi Integrado', 1475.54);
INSERT INTO tb_produtos(produto, valor) VALUES ('Smartphone LG K10 Dual Chip Android 7.0 4G Wi-Fi Câmera de 13MP', 629.99);
INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (1, 'O novo Inspiron Dell oferece um design elegante e tela infinita que amplia seus sentidos, mantendo a sofisticação e medidas compactas...');
INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (2, 'A smart TV da Samsung possui tela de 40" e oferece resolução Full HD, imagens duas vezes melhores que TVs HDs padrão...');
INSERT INTO tb_descricoes_tecnicas(id_produto, descricao_tecnica) VALUES (3, 'Saia da mesmice. O smartphone LG está mais divertido, rápido, fácil, cheio de selfies e com tela HD de incríveis 5,3"...');
INSERT INTO tb_imagens(id_produto, url_imagens) VALUES (1,'notebook1.jpg'),(1,'notebook2.jpg'), (1,'notebook3.jpg');
INSERT INTO tb_imagens(id_produto, url_imagens) VALUES (2,'smarttv1.jpg'),(2,'smarttv2.jpg');
INSERT INTO tb_imagens(id_produto, url_imagens) VALUES (3,'smartphone1.jpg');
INSERT INTO tb_clientes(nome,idade) VALUES ('Roberto Rosa',32);
INSERT INTO tb_clientes(nome,idade) VALUES ('Camila Gonçalves',29);
INSERT INTO tb_pedidos(id_cliente) VALUES (1);
INSERT INTO tb_pedidos(id_cliente) VALUES (2);
INSERT INTO tb_pedidos_produtos(id_produto, id_pedido)VALUES(2,1);
INSERT INTO tb_pedidos_produtos(id_produto, id_pedido)VALUES(3,1);
INSERT INTO tb_pedidos_produtos(id_produto, id_pedido)VALUES(1,2);
INSERT INTO tb_pedidos_produtos(id_produto, id_pedido)VALUES(1,3);

# CONSULTAS
SELECT * FROM tb_produtos;
SELECT * FROM tb_descricoes_tecnicas;
SELECT * FROM tb_imagens;
SELECT * FROM tb_clientes;
SELECT * FROM tb_pedidos;
SELECT * FROM tb_pedidos_produtos;

ALTER TABLE tb_descricoes_tecnicas CHANGE COLUMN fk_id_produto id_produto INT NOT NULL;
ALTER TABLE tb_imagens CHANGE COLUMN fk_id_produto id_produto INT NOT NULL;
ALTER TABLE tb_pedidos CHANGE COLUMN fk_id_cliente id_cliente INT NOT NULL;
ALTER TABLE tb_pedidos_produtos CHANGE COLUMN fk_id_produto id_produto INT NOT NULL;
ALTER TABLE tb_pedidos_produtos CHANGE COLUMN fk_id_pedido id_pedido INT NOT NULL;








