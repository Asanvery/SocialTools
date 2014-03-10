<?php
$xpdo_meta_map['socDialogSend']= array (
  'package' => 'socialtools',
  'version' => '1.1',
  'table' => 'soc_dialogSend',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'subject' => '',
    'message' => '',
    'sender' => 0,
    'recipient' => 0,
    'private' => 0,
    'date_sent' => '0000-00-00 00:00:00',
    'read' => 0,
  ),
  'fieldMeta' => 
  array (
    'subject' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'message' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'sender' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'recipient' => 
    array (
      'dbtype' => 'int',
      'precision' => '10',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'private' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '4',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
    'date_sent' => 
    array (
      'dbtype' => 'datetime',
      'phptype' => 'datetime',
      'null' => false,
      'default' => '0000-00-00 00:00:00',
    ),
    'read' => 
    array (
      'dbtype' => 'tinyint',
      'precision' => '1',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
  ),
);
