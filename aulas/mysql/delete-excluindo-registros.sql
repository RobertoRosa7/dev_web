USE db_curso_web;

/**
* DELETE - USADO PARA EXCLUIR REGISTROS DA TABELA
* [ATENÇÃO] SE NÃO TIVER DECLARA WHERE NA INSTRUÇÃO TODOS OS REGISTROS SERÃO EXCLUÍDOS
*/

# CONSULTA
SELECT * FROM minhaTabela;

# EXCLUINDO REGISTRO COM BASE NO ANO
DELETE FROM minhaTabela WHERE ano = '2018';

# EXCLUINDO REGISTRO COM BASE ENTRE VALORES
DELETE FROM minhaTabela WHERE meusInvestimentos BETWEEN 480.00 AND 800.00;

# EXCLUINDO TODOS OS REGISTROS
DELETE FROM minhaTabela;