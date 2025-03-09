<?php

return [
    'rules' => [
        'title'       => 'required|min_length[3]|max_length[255]',
        'description' => 'required|min_length[5]|max_length[1000]',
        'status'      => 'required|in_list[pendente,em andamento,concluída]',
    ],

    'messages' => [
        'title' => [
            'required'   => 'O título é obrigatório.',
            'min_length' => 'O título deve ter pelo menos 3 caracteres.',
            'max_length' => 'O título não pode ter mais de 255 caracteres.'
        ],
        'description' => [
            'required'   => 'A descrição é obrigatória.',
            'min_length' => 'A descrição deve ter pelo menos 5 caracteres.',
            'max_length' => 'A descrição não pode ter mais de 1000 caracteres.'
        ],
        'status' => [
            'required' => 'O status é obrigatório.',
            'in_list'  => 'O status deve ser "pendente", "em andamento" ou "concluída".'
        ]
    ]
];
