use db_loja_virtual;
/**
* Selecione todos os clientes com idade igual ou superior a 29 anos,
* Os registros deve ser ordenados de forma ascendente pela idade.
*/
select * from tb_clientes where idade >= 29 order by idade asc;

/**
* Adicione a coluna sexo do tipo string de 1 caracter não pode ser vazia
*/
alter table tb_clientes add sexo char(1) not null;

/**
* Adicione a coluna de endereço do tipo string de 150 caracteres pode ser vazia
*/
alter table tb_clientes add endereco varchar(150) null;

/**
* Efetue um update em tb_clientes dos registros de id_cliente igual a 1, 2, 3, 6 e 7, atualizando o sexo
* para “M”. Utilize a instrução IN para este fim.
*/
update tb_clientes set sexo = 'M' where id_clientes in (15,13,9,8);
update tb_clientes set sexo = 'F' where id_clientes in (2,4,5,6,10,11,12,14,16,17);
select * from tb_clientes;
select * from tb_clientes where sexo = 'F';
select * from tb_clientes where sexo = 'M';

/**
* Selecione todos os registros de tb_clientes que possuam relação com tb_pedidos e com tb_pedidos
* produtos (apenas registros com relacionamentos entre si). Recupe também os detalhes dos produtos da
* tabela tb_produtos. A consulta deve retornar de tb_clientes as colunas “id_cliente”, “nome”, “idade” e
* de tb_produtos deve ser retornado as colunas “produto” e “valor”
*/
select 
	cli.id_clientes,
    cli.nome,
    cli.idade,
    pp.id_pedido,
    pt.produto,
    pt.valor
from 
	tb_clientes as cli inner join tb_pedidos_produtos as pp on (cli.id_clientes = pp.id_pedido)
    left join tb_produtos as pt on (pp.id_produto = pt.id_produtos);