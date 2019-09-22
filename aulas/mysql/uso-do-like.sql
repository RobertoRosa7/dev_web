# USO DO BANCO DE DADOS
USE db_curso_web;

# FAZENDO UM FILTRO SIMPLES DE NOMES
SELECT * FROM tb_alunos WHERE nome = 'Evelyn';

# O OPERADOR LIKE BUSCA POR OCORRÊNCIA ENQUANTO O OPERADOR DE IGUAL BUSCA POR UMA IGUALDADE
SELECT * FROM tb_alunos WHERE nome LIKE 'Evelyn';

# USO DE CORINGA (%) INDICA QUE PODE HAVER QUALQUER COJUNTO DE CARACTER DE TEXTO E FINALIZE COM e
SELECT * FROM tb_alunos WHERE nome LIKE '%a';
SELECT * FROM tb_alunos WHERE nome LIKE '%a' AND idade >= 18 AND idade < 30;
SELECT * FROM tb_alunos WHERE nome LIKE '%a' AND idade BETWEEN 18 AND 50;
SELECT * FROM tb_alunos WHERE idade BETWEEN 16 AND 30;

# USO DE CORINGA (_) UNDERSCORE BUSCA POR POSIÇÕES ESPECÍFICAS DE CONJUNTO DE CARACTERES
SELECT * FROM tb_alunos WHERE nome LIKE '_riel';
SELECT * FROM tb_alunos WHERE nome LIKE '%tt_';