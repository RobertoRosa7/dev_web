# Filtros de consultas
# Podemos usar operadores de comparação para melhorar ainda mais as consultas

# WHERE
SELECT * FROM `tb_cursos` WHERE `investimento` < 500.00;
SELECT * FROM `tb_cursos` WHERE `investimento` > 200.00;
SELECT * FROM `tb_cursos` WHERE `investimento` <= 100.00 AND `carga_horaria` > 30;
SELECT * FROM `tb_cursos` WHERE `investimento` <= 100.00 OR `carga_horaria` > 20;

# BETWEEN
SELECT * FROM `tb_cursos` WHERE `idade` BETWEEN 18 AND 30;