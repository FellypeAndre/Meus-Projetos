-- Questão 1
SELECT 
    COALESCE(a.nome, 'Agência sem nome') AS nome_agencia,
    COALESCE(c.nome, 'Cliente sem nome') AS nome_cliente
FROM 
    agencia_viagem a
FULL JOIN 
    cliente c ON a.codigo = c.codigo_agencia_viagem;

-- Questão 2
SELECT 
    p.nome AS nome_pacote,
    TO_CHAR(p.data_cadastro, 'DD/MM/YYYY') AS data_cadastro_pacote
FROM 
    pacote_viagem p
JOIN 
    agencia_viagem a ON p.codigo_agencia_viagem = a.codigo
WHERE 
    a.nome = 'VAVA TUR' AND
    p.valor_total > (SELECT AVG(c.renda) FROM cliente c WHERE c.codigo_agencia_viagem = a.codigo);

-- Questão 3
SELECT 
    a.nome AS nome_agencia,
    c.nome AS nome_cliente,
    EXTRACT(YEAR FROM AGE(CURRENT_DATE, c.data_nascimento)) AS idade_cliente,
    p.nome AS nome_pacote,
    TO_CHAR(p.data_inicio, 'DD/MM/YYYY') AS data_inicio_pacote,
    TO_CHAR(p.data_fim, 'DD/MM/YYYY') AS data_fim_pacote,
    origem.nome AS cidade_origem,
    destino.nome AS cidade_destino,
    passeio.nome AS passeio_nome
FROM 
    agencia_viagem a
JOIN 
    cliente c ON a.codigo = c.codigo_agencia_viagem
JOIN 
    pacote_viagem p ON c.codigo = p.codigo_cliente
JOIN 
    cidade origem ON p.codigo_cidade_origem = origem.codigo
JOIN 
    cidade destino ON p.codigo_cidade_destino = destino.codigo
LEFT JOIN 
    passeio ON destino.codigo = passeio.codigo_cidade
WHERE 
    c.renda NOT BETWEEN 1000 AND 7000 AND
    EXTRACT(YEAR FROM p.data_cadastro) = EXTRACT(YEAR FROM CURRENT_DATE)
ORDER BY 
    a.nome, c.nome
LIMIT 3 OFFSET 1;

-- Questão 4
SELECT 
    TO_CHAR(data_inicio, 'MM/YYYY') AS mes_ano_inicio,
    TRUNC(AVG(valor_total), 2) AS media_valor_pacote
FROM 
    pacote_viagem
GROUP BY 
    TO_CHAR(data_inicio, 'MM/YYYY')
HAVING 
    AVG(valor_total) > 3000;

-- Questão 5
CREATE VIEW pacotes_vendidos_por_ano AS
SELECT 
    a.nome AS nome_agencia,
    EXTRACT(YEAR FROM p.data_cadastro) AS ano_cadastro,
    COUNT(*) AS quantidade_pacotes
FROM 
    agencia_viagem a
JOIN 
    pacote_viagem p ON a.codigo = p.codigo_agencia_viagem
GROUP BY 
    a.nome, EXTRACT(YEAR FROM p.data_cadastro)
ORDER BY 
    quantidade_pacotes DESC;

SELECT * FROM pacotes_vendidos_por_ano;

-- Questão 6
CREATE VIEW clientes_cidades_com_a AS
SELECT 
    c.nome AS nome_cliente,
    c.renda,
    EXTRACT(YEAR FROM AGE(CURRENT_DATE, c.data_nascimento)) AS idade_cliente,
    TO_CHAR(c.data_cadastro, 'DD/MM/YYYY HH24:MI:SS') AS data_hora_cadastro,
    dest.nome AS cidade_destino
FROM 
    cliente c
JOIN 
    pacote_viagem p ON c.codigo = p.codigo_cliente
JOIN 
    cidade dest ON p.codigo_cidade_destino = dest.codigo
WHERE 
    dest.nome ILIKE '%a%' AND
    c.renda < (SELECT AVG(valor_total) FROM pacote_viagem WHERE EXTRACT(YEAR FROM data_cadastro) BETWEEN 1970 AND 2023);

SELECT * FROM clientes_cidades_com_a;
