	/* # Criando tabelas e tipos de dados
# Cada coluna na tabela é responsável por um tipo de dados específico

# Tipos de Dados - Campo texto
# * text (tamanho variável que armazena grande quantidade de texto)
# * varchar (tamanho variável, 0 até 255 caracteres)
# * char (tamanho fixo, de 0 até 255 caracteres)

# Tipos de Dados - Campo Numéricos
# * int (valores numéricos inteiro)
# * float (valores numéricos reais)

# Tipo de Dados - Campo data
# * date (data no formato YYYY/mm/dd)
# * time (hora)
# * datetime (combinação de data e hora no mesmo campo)

# Criando tabela
	CREATE TABLE `nome_tabela`(
	id_curso int NOT NULL auto-increment,
	nome varchar(30),
	idade int,
	sexo char(1),
	peso float(5,2) DEFAULT 0,
	altura float(5,2) DEFAULT 0,
	nacionalidade varchar(20),
	PRIMARY KEY(id_curso)
		);

# Detalhes:
# NULL = indica que a coluna pode ficar vazia
# NOT NULL = indica que a coluna não pode ficar vazia, obrigatoriamente deve ser preenchida
# DEFAULT = indica que será configurado um valor se nenhum outro for configurado
# FLOAT(5,2) cindo indica a quantidade de digitos depois do ponto, dois indica a quantidade antes do ponto
# neste caso, seria algo parecido como 000,00 */