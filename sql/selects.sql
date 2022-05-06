SELECT *
FROM loja;

SELECT *
FROM produto;

SELECT
	loja.nome as loja,
    produto.nome as produto,
    produto.preco as preco,
    produto.quantidade as quantidade
FROM produto
INNER JOIN loja ON produto.loja_id = loja.id
WHERE
	produto.nome = 'teclado'
ORDER BY produto.nome
;
