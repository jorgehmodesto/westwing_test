SELECT
  ce.nome, ca.cor, b.nome, cr.modelo
FROM
  cliente ce
  LEFT JOIN carro cr ON ce.id_cliente = cr.fk_cliente
  LEFT JOIN casa ca ON ce.id_cliente = ca.fk_cliente
  LEFT JOIN bairro b ON b.id_bairro = ca.fk_bairro;