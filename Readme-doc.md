# Routes


### Rota de endereços

```http
GET /address
```

```http
GET /address?sortBy=${bairro/estado/logradouro}&orderBy=${1=ASC/0=DESC}
```

#### traz os enderecos e formato JSON no seguinte formato

```json
{
    "id":"1",
    "cep": "01001-000",
    "logradouro": "Praça da Sé",
    "complemento": "lado ímpar",
    "unidade": "",
    "bairro": "Sé",
    "localidade": "São Paulo",
    "uf": "SP",
    "estado": "São Paulo",
    "regiao": "Sudeste",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107",
    "regitered_in":"2025-01-01"
}
```

#### Metodos da API:

- Controller (searchAddress)
