<?php
const server = "localhost";
const user   = "root";
const pass   = "wolOHAjI";
const bd     = "distraja_ditribuidora_ja";

const SGBD = "mysql:host=" . server . ";dbname=" . bd;

const  METHOD = "AES-256-CBC";
const SECRET_KEY = '$RP*@2021';
const SECRET_IV = '10172';   // esto hace que cada quien tenga modo de incriptacion

date_default_timezone_set("America/Bogota");