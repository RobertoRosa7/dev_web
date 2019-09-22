# USO DE UMA BANCO DE DADOS ESPECÍFICO
USE db_curso_web;

# USO DO BETWEEN PARA FILTROS ENTRE UM VALOR INICIAL E OUTRO FINAL
SELECT * FROM tb_alunos WHERE idade BETWEEN 18 AND 22;

# FILTROS SEM OPERADOR DE FILTRO DE POSSIBILIDADES IN
SELECT * FROM tb_alunos WHERE interesse = 'Jogos' OR interesse = 'Música' OR interesse = 'Esporte';

# FILTROS IN - ONDE EXISTE ALGUMAS POSSIBILIDADES
SELECT * FROM tb_alunos WHERE interesse IN ('Jogos','Música','Esporte');
SELECT id_aluno, nome, interesse FROM tb_alunos WHERE interesse IN ('Jogos', 'Música','Esporte');

# REALIZANDO O FILTRO INVERSO - ONDE QUEREMOS TODOS OS REGISTRO QUE NÃO TEM OS INTERESSES ACIMA
SELECT * FROM tb_alunos WHERE interesse NOT IN ('Jogos','Música','Esporte','Saúde');