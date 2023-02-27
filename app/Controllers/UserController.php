<?php

namespace App\Controllers;


class UserController extends BaseController
{
 public function index()
 {
  $db = \Config\Database::connect();
  $query   = $db->query('SELECT id,name, phone, address FROM users');
  $users = $query->getResult();
  return view('user', ['users' => $users]);
 }

 public function show($id)
 {
  $db = \Config\Database::connect();
  $query   = $db->query('SELECT id,name, phone, address FROM users WHERE id = ' . $id);
  $user = $query->getResult();
  return view('users/show', ['user' => $user[0]]);
 }
 public function create()
 {
  return view('users/create');
 }

 public function edit($id)
 {
  $db = \Config\Database::connect();
  $query   = $db->query('SELECT id,name, phone, address FROM users WHERE id = ' . $id);
  $user = $query->getResult();
  return view('users/edit', ['user' => $user[0]]);
 }

 public function update($id)
 {
  $db = \Config\Database::connect();
  $query   = $db->query('UPDATE users SET name = "' . $this->request->getPost('name') . '", phone = "' . $this->request->getPost('phone') . '", address = "' . $this->request->getPost('address') . '" WHERE id = ' . $id);
  return redirect()->to('/users');
 }
}
