<?php

$config['auth'] = [
  [
    'field'   => 'username',
    'label'   => 'Username',
    'rules'   => 'required|trim',
  ],
  [
    'field'   => 'password',
    'label'   => 'Password',
    'rules'   => 'required|trim'
  ]
];

$config['item/create'] = [
  [
    'field'   => 'nama',
    'label'   => 'Nama',
    'rules'   => 'required'
  ],
];

$config['customer/create'] = [
  [
    'field'   => 'salutation',
    'label'   => 'salutation',
    'rules'   => 'required'
  ],
];

$config['quotation/create'] = [
  [
    'field'   => 'subtotal',
    'label'   => 'subtotal',
    'rules'   => 'required'
  ],
];

