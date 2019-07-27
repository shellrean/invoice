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