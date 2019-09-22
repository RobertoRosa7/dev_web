USE db_curso_web;

/**
* HAVING - FILTRO USANDO APÓS O USO DO GROUP BY, ENTÃO LOGO APÓS O GROUP BY DEVEMOS USAR HAVING PARA TER UM NOVO FILTRO
* SOBRE O RESULTADO VINDO DO GROUP BY.
* HAVING - DEVE VIR APÓS GROUP BY E ANTES DE ORDER BY E POR FIM LIMITE FICANDO SEMPRE NO FINAL DA INSTRUÇÃO
*/

# QUANTOS REGISTRO DE ALUNOS FILTRADO POR ESTADO - ISTO É, QUANTOS ALUNOS TEMOS EM CADA ESTADO
SELECT estado, COUNT(*) AS total_estado FROM tb_alunos GROUP BY estado ORDER BY COUNT(*) ASC;

# QUANTOS REGISTRO TEM O ESTADO ALAGOAS
SELECT * FROM tb_alunos WHERE estado = 'PA';

# QUANTOS REGISTROS DE ALUNOS EXISTE POR ESTADO MAIOR OU IGUAL A 5
SELECT estado, COUNT(*) AS total_estado FROM tb_alunos GROUP BY estado HAVING total_estado >= 5;

# QUANTOS REGISTROS HÁ POR ESTADO SENDO MENOR OU IGUAL A CINCO
SELECT estado, COUNT(*) AS total_estado FROM tb_alunos GROUP BY estado HAVING total_estado <= 5;

# REALIZANDO FILTRO APENAS MG E SP, COM O TOTAL DE REGISTRO NESSES ESTADOS
SELECT estado, COUNT(*) AS total_estado FROM tb_alunos GROUP BY estado HAVING estado IN ('MG','SP');

# QUANTOS REGISTRO HÁ NO ESTADO DE SP
SELECT * FROM tb_alunos WHERE estado = 'SP';

# TOTAL DE ESTADOS REGISTRADOS
SELECT COUNT(estado) FROM tb_alunos;

# TOTAL DE ALUNOS REGISTRADOS EM RJ
SELECT estado, COUNT(*) AS total_registro FROM tb_alunos GROUP BY estado HAVING estado = 'RJ';

# TOTAL DE ALUNOS COM O MESMO NOME SENDO MAIOR OU IGUAL A DOIS REGISTROS ORDENADO DE FORMA DECRESCENTE
SELECT nome, COUNT(*) AS total_registro_mesmo_nome FROM tb_alunos GROUP BY nome HAVING total_registro_mesmo_nome >= 2 ORDER BY COUNT(*) DESC;

# TOTAL DE REGISTRO POR ESTADO SENDO MAIOR QUE 4
SELECT estado, COUNT(*) AS total_registro_por_estado FROM tb_alunos GROUP BY estado HAVING total_registro_por_estado <= 4 ORDER BY COUNT(*) DESC;
SELECT estado, COUNT(*) AS total_registro_por_estado FROM tb_alunos GROUP BY estado HAVING total_registro_por_estado >= 4 ORDER BY COUNT(*) DESC;

# TOTAL DE REGISTRO POR ESTADO MAIOR QUE 7
SELECT estado, COUNT(*) AS total_registro_por_estado FROM tb_alunos GROUP BY estado HAVING total_registro_por_estado > 3;

# TODOS REGISTRO POR ESTADO MAIOR QUE 7 E QUE NÃO TENHA INTERESSE POR ESPORTE (!= OU <>)
# NESTE CASO HÁ TRÊS CAMDAS DE FILTROS:
# PRIMEIRO - ATÉ WHERE ONDE DIZEMOS QUE QUEREMOS TODOS OS REGISTRO DIFERENTE DE INTERESSE
# SEGUNDO - USANDO AGRUPAMENTO, DIZEMOS QUE AGRUPE POR ESTADO, E POR FIM O TOTAL DEVE SER MAIOR QUE 7  
SELECT estado, COUNT(*) AS total_registro_por_estado FROM tb_alunos WHERE interesse != 'Esporte' GROUP BY estado HAVING total_registro_por_estado > 3;