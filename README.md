# Alelo Order

[![Latest Stable Version](https://poser.pugx.org/edbizarro/alelo-order/v/stable)](https://packagist.org/packages/edbizarro/alelo-order) [![Build Status](https://travis-ci.org/edbizarro/alelo-order.svg?branch=master)](https://travis-ci.org/edbizarro/alelo-order) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/43a70be70ece404490174211010856b6)](https://www.codacy.com/app/edbizarro/alelo-order?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=edbizarro/alelo-order&amp;utm_campaign=Badge_Grade) [![StyleCI](https://styleci.io/repos/60547523/shield)](https://styleci.io/repos/60547523) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/3d88c1a4-ae25-4a4c-b417-5cafd5bef6f8/mini.png)](https://insight.sensiolabs.com/projects/3d88c1a4-ae25-4a4c-b417-5cafd5bef6f8) [![License](https://poser.pugx.org/edbizarro/alelo-order/license)](https://packagist.org/packages/edbizarro/alelo-order)

## Todo

- [x] Formatação
- [x] Geração de arquivos
- [x] Validação de dados
- [ ] Geração de arquivo para todos os produtos da ALELO (Alimentação, Refeição, Cesta, Natal, Combustivel)

        1 – Alimentacao (AVV)
        2 – Refeição (RVV)
        3 – Cesta (CVV)
        4 – Natal (NVV)
        5 – Combustivel (FVV)

- [ ] Melhorar feedback da validação
- [ ] Criação de tipo de validação "requiredIf" que será usada em CPF/CNPJ
- [ ] Existe validação entre registros, atualmente a validação é somente no escopo do registro, pensar em como deixar o escopo da validação global
- [ ] Refatorar firstContactName do branchRegistry (atualmente igual ao name do header)

#### Códigos

Cód. Escolaridade

    1 Primeiro Grau
    2 Segundo Grau
    3 Superior
    4 Pos

Cód. Sexo

    F Feminino
    M Masculino

Tipo do Doc.ID

    1 RG
    2 RNE
    3 Passaporte

Cód. Estado Civil

    1 Solteiro
    2 Casado
    3 Viúvo
    4 Separado
    5 Outros
