<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'O campo acima deve ser aceito.',
    'active_url'           => 'O campo acima não é uma URL válida.',
    'after'                => 'O campo acima deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo acima deve ser uma data superior ou igual a :date.',
    'alpha'                => 'O campo acima deve ser apenas letras.',
    'alpha_dash'           => 'O campo acima só pode conter letras, números e traços.',
    'alpha_num'            => 'O campo acima só pode conter letras e números.',
    'array'                => 'O campo acima deve conter um array.',
    'before'               => 'O campo acima deve conter uma data anterior a :date.',
    'before_or_equal'      => 'O campo acima deve conter uma data inferior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo acima deve conter um número entre :min e :max.',
        'file'    => 'O campo acima deve conter um arquivo de :min a :max kilobytes.',
        'string'  => 'O campo acima deve conter entre :min a :max caracteres.',
        'array'   => 'O campo acima deve conter de :min a :max itens.',
    ],
    'boolean'              => 'O campo acima deve conter o valor verdadeiro ou falso.',
    'confirmed'            => 'A confirmação para o campo acima não coincide.',
    'date'                 => 'O campo acima não contém uma data válida.',
    'date_format'          => 'A data informada para o campo acima não respeita o formato :format.',
    'different'            => 'Os campos acima e :other devem conter valores diferentes.',
    'digits'               => 'O campo acima deve conter :digits dígitos.',
    'digits_between'       => 'O campo acima deve conter entre :min a :max dígitos.',
    'dimensions'           => 'O valor informado para o campo acima não é uma dimensão de imagem válida.',
    'distinct'             => 'O campo acima contém um valor duplicado.',
    'email'                => 'O campo acima não contém um endereço de email válido.',
    'exists'               => 'O valor selecionado para o campo acima é inválido.',
    'file'                 => 'O campo acima deve conter um arquivo.',
    'filled'               => 'O campo acima é obrigatório.',
    'gt' => [
        'numeric' => 'O campo acima deve ser maior que :value.',
        'file' => 'O campo acima deve ser maior que :value kilobytes.',
        'string' => 'O campo acima deve ser maior que :value caracteres.',
        'array' => 'O campo acima deve ter mais que :value items.',
    ],
    'gte' => [
        'numeric' => 'O campo acima deve ser maior ou igual a :value.',
        'file' => 'O campo acima deve ser maior ou igual a :value kilobytes.',
        'string' => 'O campo acima deve ser maior ou igual a :value caracteres.',
        'array' => 'O campo acima deve ter :value items ou mais.',
    ],
    'image'                => 'O campo acima deve conter uma imagem.',
    'in'                   => 'O campo acima não contém um valor válido.',
    'in_array'             => 'O campo acima não existe em :other.',
    'integer'              => 'O campo acima deve conter um número inteiro.',
    'ip'                   => 'O campo acima deve conter um IP válido.',
    'ipv4'                 => 'O campo acima deve conter um IPv4 válido.',
    'ipv6'                 => 'O campo acima deve conter um IPv6 válido.',
    'json'                 => 'O campo acima deve conter uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo acima deve ser menor que :value.',
        'file' => 'O campo acima deve ser menor que :value kilobytes.',
        'string' => 'O campo acima deve ser menor que :value caracteres.',
        'array' => 'O campo acima deve ter menos do que :value items.',
    ],
    'lte' => [
        'numeric' => 'O campo acima deve ser menor ou igual a :value.',
        'file' => 'O campo acima deve ser menor ou igual a :value kilobytes.',
        'string' => 'O campo acima deve ser menor ou igual a :value caracteres.',
        'array' => 'O campo acima não deve ter mais do que :value items.',
    ],
    'max'                  => [
        'numeric' => 'O campo acima não pode conter um valor superior a :max.',
        'file'    => 'O campo acima não pode conter um arquivo com mais de :max kilobytes.',
        'string'  => 'O campo acima não pode conter mais de :max caracteres.',
        'array'   => 'O campo acima deve conter no máximo :max itens.',
    ],
    'mimes'                => 'O campo acima deve conter um arquivo do tipo: :values.',
    'mimetypes'            => 'O campo acima deve conter um arquivo do tipo: :values.',
    'min'                  => [
        'numeric' => 'O campo acima deve conter um número superior ou igual a :min.',
        'file'    => 'O campo acima deve conter um arquivo com no mínimo :min kilobytes.',
        'string'  => 'O campo acima deve conter no mínimo :min caracteres.',
        'array'   => 'O campo acima deve conter no mínimo :min itens.',
    ],
    'not_in'               => 'O campo acima contém um valor inválido.',
    'not_regex'            => 'The acima format is invalid.',
    'numeric'              => 'O campo acima deve conter um valor numérico.',
    'present'              => 'O campo acima deve estar presente.',
    'regex'                => 'O formato do valor informado no campo acima é inválido.',
    'required'             => 'O campo acima é obrigatório.',
    'required_if'          => 'O campo acima é obrigatório quando o valor do campo :other é igual a :value.',
    'required_unless'      => 'O campo acima é obrigatório a menos que :other esteja presente em :values.',
    'required_with'        => 'O campo acima é obrigatório quando :values está presente.',
    'required_with_all'    => 'O campo acima é obrigatório quando um dos :values está presente.',
    'required_without'     => 'O campo acima é obrigatório quando :values não está presente.',
    'required_without_all' => 'O campo acima é obrigatório quando nenhum dos :values está presente.',
    'same'                 => 'Os campos acima e :other devem conter valores iguais.',
    'size'                 => [
        'numeric' => 'O campo acima deve conter o número :size.',
        'file'    => 'O campo acima deve conter um arquivo com o tamanho de :size kilobytes.',
        'string'  => 'O campo acima deve conter :size caracteres.',
        'array'   => 'O campo acima deve conter :size itens.',
    ],
    'string'               => 'O campo acima deve ser uma string.',
    'timezone'             => 'O campo acima deve conter um fuso horário válido.',
    'unique'               => 'O valor informado para o campo acima já está em uso.',
    'uploaded'             => 'Falha no Upload do arquivo acima.',
    'url'                  => 'O formato da URL informada para o campo acima é inválido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'address' => 'endereço',
        'age' => 'idade',
        'body' => 'conteúdo',
        'city' => 'cidade',
        'country' => 'país',
        'date' => 'data',
        'day' => 'dia',
        'description' => 'descrição',
        'excerpt' => 'resumo',
        'first_name' => 'primeiro nome',
        'gender' => 'gênero',
        'hour' => 'hora',
        'last_name' => 'sobrenome',
        'message' => 'mensagem',
        'minute' => 'minuto',
        'mobile' => 'celular',
        'month' => 'mês',
        'name' => 'nome',
        'password_confirmation' => 'confirmação da senha',
        'password' => 'senha',
        'phone' => 'telefone',
        'second' => 'segundo',
        'sex' => 'sexo',
        'state' => 'estado',
        'subject' => 'assunto',
        'text' => 'texto',
        'time' => 'hora',
        'title' => 'título',
        'username' => 'usuário',
        'year' => 'ano',
    ],

];
