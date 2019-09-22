USE db_curso_web;

/**
* UPDATE - PARA ATUALIZAR DADOS DE REGISTRO DENTRO DA TABELA
* SET - USADO EM CONJUNTO COM UPDATE APÓS O NOME DA TABELA, AQUI O OPERADOR DE IGUAL TEM SIGNIFICADO DE ATRIBUIÇÃO E NÃO
* DE COMPARAÇÃO COMO NORMALMENTE É USADO. TAMBÉM QUANDO FOR PASSAR O VALOR DEVE RESPEITAR O TIPO DE DADO QUE A COLUNA
* ESTÁ USANDO, SE FOR TEXTO, NUMEROS OU BOOLEAN
* 
*/

/* # ATUALIZAÇÃO SIMPLES
 */UPDATE tb_alunos SET nome = 'João Silva' WHERE id_aluno = 13;

/* # CONSULTA DE IDADE MAIOR OU IGUAL 80
 */SELECT * FROM tb_alunos WHERE idade >= 80;
SELECT * FROM tb_alunos WHERE idade BETWEEN 25 AND 35;

/* # MODIFICANDO O INTERESSE PARA TODOS QUE TENHA IDADE MAIOR OU IGUAL A 80
 */UPDATE tb_alunos SET interesse = 'Tecnologia' WHERE idade BETWEEN 25 AND 35;
UPDATE tb_alunos SET interesse = 'Medicina' WHERE nome LIKE '%a' AND interesse = 'Informática';

/* # MODIFICANDO O INTERESSE SOMENTE PARA MULHERES
 */SELECT nome, interesse FROM tb_alunos WHERE nome LIKE '%a' OR nome LIKE '%e';
SELECT nome, interesse FROM tb_alunos WHERE nome LIKE '%a' AND interesse = 'Informática';
SELECT interesse FROM tb_alunos WHERE nome LIKE '%a' OR nome LIKE '%e' GROUP BY interesse;

/* # ATUALIZANDO MAIS DE UMA COLUNA
 */UPDATE tb_alunos SET nome = 'Roberto', idade = 31, email = 'roberto.rosa7@gmail.com' WHERE id_aluno = 1;
UPDATE tb_alunos SET interesse = 'Tecnologia', estado = 'SP' WHERE id_aluno = 1;

/* # CONSULTA SIMPLES
 */SELECT * FROM tb_alunos WHERE id_aluno = 1;
SELECT * FROM tb_alunos WHERE interesse = 'Medicina';