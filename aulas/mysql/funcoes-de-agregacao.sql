USE db_curso_web;
# FUNÇÕES DE AGREGAÇÃO
# MAX(COLUNA) RETORNA O MAIOR VALOR DE TODOS REGISTROS COM BASE EM UMA COLUNA
# MIN(COLUNA) RETORNA O MENOR VALOR DE TODOS REGISTROS COM BASE EM UMA COLUNA
# AVG(COLUNA) RETORNA A MÉDIA DE TODOS REGISTROS COM BASE EM UMA COLUNA
# SUM(COLUNA) RETORNA A SOMA DE TODOS OS REGISTROS COM BASE EM UMA COLUNA
# COUNT(*) RETORNA A QUANTIDADE DE REGISTRO DE UMA TABELA
# COUNT(COLUNA) PARA UMA COLUNA ESPECÍFICA

# TRUNCATE - LIMPAR TODOS OS REGISTRO DE UMA TABELA
TRUNCATE tb_cursos;

# ADICIONAR VALORES NA TABELA DE CURSOS
INSERT INTO tb_cursos(id_curso, imagem_curso, nome_curso, resumo, data_cadastro, ativo, investimento, carga_horaria) 
VALUES (1, 'curso_node.jpg', 'Curso Completo do Desenvolvedor NodeJS e MongoDB', 'Resumo do curso de NodeJS', '2018-01-01', 1, 159.99, 15), (2, 'curso_react_native.jpg', 'Multiplataforma Android/IOS com React e Redux', 'Resumo do curso de React Native', '2018-02-01', 1, 204.99, 37), (3, 'angular.jpg', 'Desenvolvimento WEB com ES6, TypeScript e Angular', 'Resumo do curso de ES6, TypeScript e Angular', '2018-03-01', 1, 579.99, 31), (4, 'web_completo_2.jpg', 'Web Completo 2.0', 'Resumo do curso de Web Completo 2.0', '2018-04-01', 1, 579.99, 59), (5, 'linux.jpg', 'Introdução ao GNU/Linux', 'Resumo do curso de GNU/Linux', '2018-05-01', 0, 0, 1);

# CONSULTANDO OS VALORES
SELECT * FROM tb_cursos;

# DETALHES DA TABELA
DESCRIBE tb_cursos;

# USANDO A FUNÇÃO MIN()
SELECT MIN(investimento) FROM tb_cursos;

# QUERY PARA TRAZER O MENOR VALOR DE INVESTIMENTO E ATIVO
SELECT MIN(investimento) FROM tb_cursos WHERE ativo = TRUE;

# MAIOR INVESTIMENTO DOS CURSOS ATIVOS
SELECT MAX(investimento) FROM tb_cursos WHERE ativo = TRUE;

# A MÉDIA DE INVESTIMENTO DE TODOS OS CURSO ATIVO
SELECT AVG(investimento) FROM tb_cursos WHERE ativo = TRUE;

# INVESTIMENTO TOTAL - SOMANDO OS VALORES DE UMA COLUNA
SELECT SUM(investimento) FROM tb_cursos;

# SOMANDO SOMENTE OS CURSOS ATIVOS
SELECT SUM(investimento) FROM tb_cursos WHERE ativo = TRUE;

# QUANTOS REGISTROS ESTÃO ATIVOS
SELECT COUNT(*) FROM tb_cursos WHERE ativo = TRUE;

# QUANTOS REGISTROS ESTÃO DESTIVADOS
SELECT COUNT(*) FROM tb_cursos WHERE ativo = FALSE;

# QUANTOS REGISTROS NO TOTAL
SELECT COUNT(*) FROM tb_cursos;
SELECT COUNT(*) FROM tb_alunos;
