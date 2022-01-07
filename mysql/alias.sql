USE db_loja_virtual;

SELECT * FROM tb_produtos LEFT JOIN tb_descricoes_tecnicas ON (tb_produtos.id_produtos = tb_descricoes_tecnicas.id_produto);

# APLICANDO APELIDOS NAS TABELAS
SELECT * FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON (p.id_produtos = dt.id_produto);

# CONSULTA DE COLUNAS ESPECIFICAS
SELECT 	p.id_produtos, p.produto, p.valor, dt.descricao_tecnica FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON (p.id_produtos = dt.id_produto);

# CONSULTAR TODOS OS PRODUTOS E FICHA TÉCNICA ONDE O PREÇO SEJA MAIOR QUE 600
SELECT p.id_produtos, p.produto, p.valor, dt.descricao_tecnica FROM tb_produtos AS p LEFT JOIN tb_descricoes_tecnicas AS dt ON (p.id_produtos = dt.id_produto) WHERE p.valor >= 600;

# consultar todos os produto que tenha valor entre 100 e 1000 
select p.id_produtos, p.produto, p.valor, dt.descricao_tecnica from tb_produtos as p left join tb_descricoes_tecnicas as dt on (p.id_produtos = dt.id_produto) where p.valor between 100 and 1000 order by p.valor desc;