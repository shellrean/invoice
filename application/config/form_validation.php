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
    'field'   => 'invoice_subtotal',
    'label'   => 'subtotal',
    'rules'   => 'required'
  ],
];

$config['quotation/invoice_convert'] = [
 [
  'field'     => 'invdate',
  'label'     => 'invdate',
  'rules'     => 'required'
 ]
];

$config['record_payment'] = [
 [
  'field'     => 'kdinv',
  'label'     => 'kdinv',
  'rules'     => 'required'
 ]
];
